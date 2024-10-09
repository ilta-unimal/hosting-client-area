@extends('layouts.app')

@section('content')

@if (session()->has('payment'))
<div class="alert alert-info d-flex flex-column flex-sm-row p-5 mb-10">
  <i class="ki-duotone ki-shield-tick fs-2hx text-info me-4"><span class="path1"></span><span class="path2"></span></i>
  <div class="d-flex flex-column text-info pe-0 pe-sm-10">
      <h4 class="mb-2 text-info">Payment Successful</h4>
      <p>The droplet <span class="fw-bold">{{ session('payment') }}.ilta-services.tech</span> has been successfully paid.<br>Your droplet will be activated shortly. The admin is currently verifying your payment.</p>
  </div>
  <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
      <i class="ki-duotone ki-cross fs-1 text-dark"><span class="path1"></span><span class="path2"></span></i>
  </button>
</div>
@endif

<div class="card mb-5 mb-xl-10">
  <div class="card-header border-0 cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bold m-0 pt-md-0 pt-5">Iot Hosting Droplets</h3>
    </div>
    <div>
      <a href="{{ route('service.iot-hosting.create') }}" class="btn btn-info mt-5">Create Droplets</a>
    </div>
  </div>
  <div>
    <div class="table-responsive">
      <table class="table table-striped gy-7 gs-7">
          <thead>
              <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                  <th class="min-w-200px">Domain</th>
                  <th class="min-w-400px">Expired Date</th>
                  <th class="min-w-100px">Status</th>
                  <th class="min-w-200px text-end">Action</th>
              </tr>
        </thead>
          <tbody>
            @if ($droplets->isEmpty())
            <tr>
                <td colspan="4" class="text-center">No data available</td>
            </tr>
            @else
                @foreach ($droplets as $item)
                    <tr>
                        <td>
                            <a class="text-info" href="https://{{ $item->domain }}.ilta-services.tech" target="_blank">{{ $item->domain }}.ilta-services.tech
                                <i class="ki-outline ki-paper-clip text-info"></i>
                            </a>
                        </td>
                        <td>{{ $item->iotAccount->expired_date ?? '-' }}</td>
                        <td>
                            @if($item->iotPayment)
                                @if($item->iotAccount)
                                    @if ($item->is_active)
                                        @if (now() > $item->iotAccount->expired_date)
                                            <span class="badge badge-light-danger">Expired</span>
                                        @else
                                            <span class="badge badge-light-info">Active</span>
                                        @endif
                                    @else
                                        <span class="badge badge-light-danger">Inactive</span>
                                    @endif
                                @else
                                    <span class="badge badge-light-success">Account Pending</span>
                                @endif 
                            @else
                                <span class="badge badge-light-warning">Payment Pending</span>
                            @endif
                        </td>
                        <td class="text-end">
                            @if($item->iotPayment)
                                @if($item->iotAccount)
                                    @if ($item->is_active)
                                        @if (now() > $item->iotAccount->expired_date)
                                            -
                                        @else
                                            <button data-bs-toggle="modal" data-bs-target="#manage{{$item->id}}" class="btn btn-info">Manage</button>
                                        @endif
                                    @else
                                        -
                                    @endif
                                @else
                                    -
                                @endif
                            @else
                                <a href="{{ route('service.iot-hosting.payment', $item->id) }}" class="btn btn-sm btn-success">Payment</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
          </tbody>
      </table>
    </div>
  </div>
</div>

@foreach ($droplets as $item)
  @if ($item->iotAccount)
    <div class="modal fade" tabindex="-1" id="manage{{$item->id}}">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <form action="{{ route('service.iot-hosting.payment', $item->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                  <div>
                    <h3 class="modal-title">Account Information</h3>
                    <span>{{ $item->domain }}.ilta-services.tech</span>
                  </div>
                    <div class="btn btn-icon btn-sm btn-active-light-info ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                  <div class="table-responsive">
                    <table class="table table-row-dashed fw-normal">
                      <tbody>
                        <tr>
                          <td>Panel URL</td>
                          <td>:</td>
                          <td><a href="{{$item->iotAccount->panel_url}}" target="_blank">{{$item->iotAccount->panel_url}}</a></td>
                        </tr>
                        <tr>
                          <td>Username</td>
                          <td>:</td>
                          <td>
                            {{$item->iotAccount->panel_username}}
                          </td>
                        </tr>
                        <tr>
                          <td>Password</td>
                          <td>:</td>
                          <td>
                            {{$item->iotAccount->panel_password}}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>         
                </div>
                <div class="modal-footer">
                    <a href="{{$item->iotAccount->panel_url}}" target="_blank" type="submit" class="btn btn-info w-100">Open Panel Hosting</a>
                </div>
              </form>
          </div>
      </div>
    </div>
  @endif
@endforeach
@endsection
