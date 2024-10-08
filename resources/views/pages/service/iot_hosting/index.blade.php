@extends('layouts.app')

@section('content')
<div class="card mb-5 mb-xl-10">
  <div class="card-header border-0 cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bold m-0 pt-md-0 pt-5">Iot Hosting Droplets</h3>
    </div>
    <div>
      <a href="" class="btn btn-primary mt-5">Create Droplets</a>
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
              @foreach ($droplets as $item)
                <tr>
                    <td>
                      <a class="text-primary" href="https://{{ $item->domain }}" target="_blank">{{ $item->domain }}
                        <i class="ki-outline ki-paper-clip text-primary"></i>
                      </a>
                    </td>
                    <td>{{ $item->iotAccount->expired_date ?? '-' }}</td>
                    <td>
                      @if($item->iotPayment)
                        @if($item->iotAccount)
                          @if ($item->status)
                              @if (date->now() > $item->expired_date)
                                <span class="badge badge-light-danger">Expired</span>
                              @else
                                <span class="badge badge-light-success">Active</span>
                              @endif
                          @else
                            <span class="badge badge-light-danger">Inactive</span>
                          @endif
                        @else
                          <span class="badge badge-light-warning">Account Pending</span>
                        @endif 
                      @else
                        <span class="badge badge-light-warning">Payment Pending</span>
                      @endif
                    </td>
                    <td class="text-end">
                      @if($item->iotPayment)
                        @if($item->iotAccount)
                        <a href="" class="btn btn-light-primary">Manage</a>
                        @else
                        -
                        @endif
                      @else
                        <a href="" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#payment">Payment</a>
                      @endif
                    </td>
                </tr>
              @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@foreach ($droplets as $item)
  @if ($item->iotPayment === null)
    <div class="modal fade" tabindex="-1" id="payment">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <form action="{{ route('service.iot-hosting.payment', $item->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Invoice</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                  <div class="table-responsive">
                    <table class="table table-row-dashed fw-normal">
                      <span class="fw-bold fs-5">{{ $item->domain }}</span>
                      <tbody>
                        <tr>
                          <td>I0T Hosting 3 Bulan</td>
                          <td>:</td>
                          <td>Rp. 25.000</td>
                        </tr>
                        <tr>
                          <td>PPN (11%)</td>
                          <td>:</td>
                          <td>
                            Rp. 2.750
                          </td>
                        </tr>
                        <tr class="border-top-2 border-gray">
                          <td class="fw-bold">Total</td>
                          <td>:</td>
                          <td class="fw-bold">
                            Rp. 27.750
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>  
                  <div class="my-10">
                    <span for="exampleFormControlInput1" class="form-label">Pembayaran Melalui</span>
                    <p class="text-gray-600">Bank Syariah Indonesia: <br> 7149587564 a.n Brucel Duta Samudera</p>
                  </div>    
                  <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Upload Bukti Pembayaran</label>
                    <input type="file" class="form-control form-control-solid" name="file"/>
                  </div>          
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
          </div>
      </div>
    </div>
  @endif
@endforeach


@section('script')
<script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
<script>
  document.getElementById('form').addEventListener('submit', function() {
    var submitButton = document.getElementById('submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
<script>
  document.getElementById('formSignin').addEventListener('submit', function() {
    var submitButton = document.getElementById('submitSignin');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
<script>
  document.getElementById('formPassword').addEventListener('submit', function() {
    var submitButton = document.getElementById('submitPassword');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection