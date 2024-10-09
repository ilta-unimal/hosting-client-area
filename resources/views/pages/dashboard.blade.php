@extends('layouts.app')

@section('content')
<div class="card bgi-no-repeat bgi-position-x-end bgi-size-cover"  style="background-size: auto 100%; background-image: url({{ asset('assets/images/abstract.svg') }})">
  <div class="card-body pt-9 pb-0">
    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
      <div class="flex-grow-1">
        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
          <div class="d-flex flex-column">
            <div class="d-flex align-items-center mb-2">
              <a href="#" class="text-gray-900 text-hover-primary fs-1 fw-bolder me-1">Hi!, {{ Auth::user()->name}}
              </a>
            </div>
            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
              <span class="d-flex align-items-center text-gray-400 me-5 mb-2">
                Have an a nice day
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
