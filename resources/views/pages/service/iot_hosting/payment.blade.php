@extends('layouts.app')

@section('content')
<div class="px-lg-20">
  <div class="card mb-5 mb-xl-10 p-10">
    <div class="card-header border-0">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0 pt-md-0 pt-5">Invoce {{ $droplet->domain }}.ilta-services.tech</h3>
      </div>
    </div>
    <div class="card-body pt-0">
      <span>To: {{ Auth::user()->name }}</span><br>
      <span>Email : {{ Auth::user()->email }}</span><br>
      <span>Phone : {{ Auth::user()->phone }}</span><br>
      <div class="table-responsive mt-5">
        <table class="table table-row-dashed fw-normal">
          <tbody>
            <tr>
              <td class="min-w-200px">
                I0T Hosting 
                <select class="border-gray-200 p-1" aria-label="Default select example">
                  <option selected>3 Month</option>
                </select>
              </td>
              <td>:</td>
              <td class="min-w-100px">Rp. 25.000</td>
            </tr>
            <tr>
              <td class="py-4">PPN (11%)</td>
              <td class="py-4">:</td>
              <td class="py-4">
                Rp. 2.750
              </td>
            </tr>
            <tr class="border-top-1 border-gray-500">
              <td class="fw-bold py-4">Total</td>
              <td class="py-4">:</td>
              <td class="fw-bold py-4">
                Rp. 27.750
              </td>
            </tr>
          </tbody>
        </table>
      </div>  
      <form action="{{ route('service.iot-hosting.payment.submit', $droplet->id) }}" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        <div class="my-10">
          <span for="exampleFormControlInput1" class="form-label">Pembayaran Melalui</span>
          <p class="text-gray-600">Bank Syariah Indonesia: <br> 7149587564 a.n Brucel Duta Samudera</p>
        </div>    
        <div class="mb-10">
          <div>
            <label for="exampleFormControlInput1" class="required form-label">Upload Bukti Pembayaran</label>
            <input type="file" class="form-control form-control-solid  @error('file') is-invalid @enderror" name="file"/>
          </div>
          @error('file')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" id="submit" class="btn btn-info btn-lg">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress" style="display: none;">Loading... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
        </div>      
      </form>    
    </div>
  </div>
</div>
@endsection

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
@endsection