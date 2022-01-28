@extends('layouts.auth')

@section('content')


<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">

                <h1 class="h4 text-gray-900 mb-4">{{__('Job Employer!')}}</h1>
            </div>
            <form class="user" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="username" class="form-control form-control-user @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" placeholder="Enter username here..." required>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password"
                        class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                        placeholder="Enter password here..." required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="remember"
                            {{ old('remember') ? 'checked' : '' }} >
                        <label class="custom-control-label" for="customCheck"> {{ __('Remember Me')}}</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-user btn-block">
                    {{ __('Login') }}
                </button>
                  <a href="{{route('register')}}" class="btn btn-primary btn-user btn-block ">{{__('Sign-up')}}</a>
                <hr>
                <a href="/" class="btn btn-google btn-user btn-block">
                    <i class="fa fa-step-backward"></i> Back
                </a>
            </form>
            <hr>
            <div class="text-center">
                @if (Route::has('password.request'))
                <a class="small" href="{{ route('seeker.forgot.password') }}">{{ __('Forgot Your Password?') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection