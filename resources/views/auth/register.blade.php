@extends('layouts.auth')
@section('content')
<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
  <div class="d-flex flex-center flex-column flex-lg-row-fluid">
    <div class="w-lg-500px w-100 p-10">
      <form class="form w-100" action="{{ route('register') }}" method="POST" id="loginForm">
        @csrf
        <div class="mb-11">
          <h1 class="text-gray-900 fw-bolder mb-3 fs-1">Welcome!</h1>
          <div class="text-gray-500 fw-semibold fs-6">Sign-up to join our member</div>
        </div>
        <div class="fv-row mb-8">
          <input type="text" placeholder="Full Name" name="name" autocomplete="off" class="form-control bg-transparent @error('name') is-invalid @enderror" value="{{ old('name') }}" />
          @error('name')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="fv-row mb-8">
          <input type="text" placeholder="Username" name="username" autocomplete="off" class="form-control bg-transparent @error('username') is-invalid @enderror" value="{{ old('username') }}" />
          @error('username')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="fv-row mb-8">
          <div class="input-group mb-5">
              <span class="input-group-text" id="basic-addon1">+62</span>
              <input type="text" placeholder="Phone Number" name="phone" autocomplete="off" class="form-control bg-transparent @error('phone') is-invalid @enderror" value="{{ old('phone') }}" />
          </div>
          @error('phone')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <!--end::Input group-->
        <div class="fv-row mb-8">
          <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" value="{{ old('email') }}" />
          @error('email')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="fv-row mb-8">
          <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent"  />
          @error('password')
          <div class="text-sm text-danger">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="d-grid mb-10">
          <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            <span class="indicator-label">Sign-up</span>
            <span class="indicator-progress" style="display: none;">Loading... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
        </div>
        <div class="text-gray-500 text-center fw-semibold fs-6">Already registered with us? 
        <a href="{{ route('login') }}" class="link-primary" >Sign-in</a></div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  document.getElementById('loginForm').addEventListener('submit', function() {
    var submitButton = document.getElementById('kt_sign_in_submit');
    submitButton.querySelector('.indicator-label').style.display = 'none';
    submitButton.querySelector('.indicator-progress').style.display = 'inline-block';
    submitButton.setAttribute('disabled', 'disabled');
  });
</script>
@endsection
