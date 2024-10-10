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
  <div class="mb-0 hover-scroll-x border-0">
    <div class="d-grid border-0">
        <ul class="nav nav-tabs flex-nowrap text-nowrap p-5 border-0 mb-0 pb-0">
            <li class="nav-item">
                <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0" href="{{ route('client.iot-hosting.pending') }}">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 active" data-bs-toggle="tab" href="{{ route('client.iot-hosting.active') }}">Active</a>
            </li>
        </ul>
    </div>
  </div>
  <div>
    <div class="table-responsive">
      <table class="table table-striped gy-7 gs-7">
          <thead>
              <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                  <th class="min-w-200px">User</th>
                  <th class="min-w-200px">Domain</th>
                  <th class="min-w-200px">Payment At</th>
                  <th class="min-w-100px">Proof</th>
                  <th class="min-w-200px">Approved At</th>
                  <th class="min-w-200px text-end">Action</th>
              </tr>
        </thead>
          <tbody>
            @if ($droplets->isEmpty())
            <tr>
                <td colspan="6" class="text-center">No data available</td>
            </tr>
            @else
                @foreach ($droplets as $item)
                    <tr>
                        <td class="align-middle">
                          <div class="d-flex align-items-center">
                              <div class="symbol symbol-45px symbol-circle me-3" data-bs-toggle="tooltip" title="{{ $item->user->name }}">
                                  <img src="https://ui-avatars.com/api/?bold=true&name={{ $item->user->name }}" alt="">
                              </div>
                              <div class="d-flex flex-column">
                                  <span class="text-gray-800 fw-bold mb-1">{{ $item->user->name }}</span>
                                  <span class="text-muted fs-7">{{ $item->user->email }}</span>
                                  <span class="text-muted fs-7">{{ $item->user->phone }}</span>
                              </div>
                          </div>
                        </td>
                        <td>
                            <a class="text-info" href="https://{{ $item->domain }}.ilta-services.tech" target="_blank">{{ $item->domain }}.ilta-services.tech
                                <i class="ki-outline ki-paper-clip text-info"></i>
                            </a>
                        </td>
                        <td>{{ $item->iotPayment->created_at }}</td>
                        <td>
                            <a href="{{ Storage::url($item->iotPayment->payment_file) }}" target="_blank" class="btn btn-light-info btn-sm">
                              <i class="ki-outline ki-eye"></i>
                              View
                            </a>
                        </td>
                        <td>{{ $item->iotAccount->created_at }}</td>
                        <td class="text-end">
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#approve{{ $item->id }}">
                              <i class="ki-outline ki-information-5"></i>
                            Info
                            </button>
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
<div class="modal fade" tabindex="-1" id="approve{{$item->id}}">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <form action="{{ route('client.iot-hosting.update', $item->id) }}" method="POST" id="update{{ $item->id }}">
            @csrf
            <div class="modal-header">
              <div>
                <h3 class="modal-title">Client Account</h3>
                <span>{{ $item->domain }}.ilta-services.tech</span>
              </div>
                <div class="btn btn-icon btn-sm btn-active-light-info ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="required form-label">Expired Date</label>
                  <input type="date" class="form-control form-control-solid" name="expired" 
                        value="{{ old('expired') ?? \Illuminate\Support\Carbon::parse($item->iotAccount->expired_date)->format('Y-m-d') }}" required/>
                  @error('expired')
                      <div class="text-sm text-danger">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="required form-label">Panel URL</label>
                <input type="link" class="form-control form-control-solid" name="url" value="{{ old('url') ?? $item->iotAccount->panel_url }}" placeholder="Panel URL" required/>
                @error('url')
                <div class="text-sm text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div> 
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="required form-label">Username</label>
                <input type="text" class="form-control form-control-solid" name="username" value="{{ old('username') ?? $item->iotAccount->panel_username }}" placeholder="Username" required/>
                @error('username')
                <div class="text-sm text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="required form-label">Password</label>
                <input type="text" class="form-control form-control-solid" name="password" value="{{ old('password') ?? $item->iotAccount->panel_password }}" placeholder="Password" required/>
                @error('password')
                <div class="text-sm text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>       
            </div>
            <div class="modal-footer">
                <div class="d-flex flex-stack">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                  <button id="update_submit_{{ $item->id }}" class="btn btn-info me-2 flex-shrink-0">
                    <span class="indicator-label">Update</span>
                    <span class="indicator-progress">
                      Please wait...
                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                  </button>
                </div>
            </div>
          </form>
      </div>
  </div>
</div>
@endforeach
@endsection

@section('script')
<script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
@foreach ($droplets as $item)
  <script>
  document.getElementById('update{{ $item->id }}').addEventListener('submit', function() {
    var submitButton = document.getElementById('update_submit_{{ $item->id }}');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });

  </script>
@endforeach
@endsection
