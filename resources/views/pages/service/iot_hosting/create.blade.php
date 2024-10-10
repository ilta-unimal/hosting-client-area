@extends('layouts.app')

@section('content')
<div class="px-lg-20">
  <div class="card mb-5 mb-xl-10 p-lg-10">
    <div class="card-header border-0 cursor-pointer">
      <div class="card-title m-0">
        <h3 class="fw-bold m-0 pt-md-0 pt-5">Create droplet Iot Hosting</h3>
      </div>
    </div>
    <div class="card-body pt-0">
      <form action="{{ route('service.iot-hosting.create.store') }}" method="POST" id="form">
        @csrf
        <div class="input-group mb-0">
          <input type="text" class="form-control form-control-lg w-lg-75 p-5 @error('domain') is-invalid @enderror" placeholder="Your Domain" name="domain" value="{{ old('domain') }}"/>
          <select class="form-select text-end bg-light" aria-label="Default select example">
            <option selected>ilta-service.tech</option>
          </select>      
        </div>
        @error('domain')
        <div class="text-sm text-danger">
          {{ $message }}
        </div>
        @enderror
        <div class="d-flex justify-content-end mt-5">
          <button type="submit" id="submit" class="btn btn-info btn-lg px-20">
            <span class="indicator-label">Next</span>
            <span class="indicator-progress" style="display: none;">Loading... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
        </div>
      </form>
      <!--end::Input group-->
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