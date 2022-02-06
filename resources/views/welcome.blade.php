@extends('layouts.app')

@section('title')
{{ __('Home') }}
@endsection

@section("content")

@guest
<div class="container">
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold"> You are not logged in</h1>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">Log in or register an account so you can leave a request</p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">
                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">
                <a class="nav-link text-black" href="{{ route('register') }}">{{ __('Register') }}</a>
            </button>
          </div>
        </div>
      </div>
</div>
@else

@endguest

@endsection