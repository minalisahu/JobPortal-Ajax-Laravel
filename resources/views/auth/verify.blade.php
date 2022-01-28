@extends('layouts.auth')

@section('content')

<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{ __('Job Portal') }}</h1>
                <h1 class="h5 text-gray-900 mb-4">{{ __('Verify Your Email Address') }}</h1>
            </div>
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <hr>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                    class="btn btn-primary btn-user btn-block">{{ __('click here to request another') }}</button>.
            </form>
            <hr>
            <a href="/" class="btn btn-google btn-user btn-block">
                <i class="fa fa-step-backward"></i> Back
            </a>

        </div>
    </div>
</div>

@endsection