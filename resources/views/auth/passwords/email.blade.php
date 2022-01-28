@extends('layouts.front')

@section('content')
<div class="login-form">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="form-header">
        <h3>{{__('Reset Password')}}</h3>
    </div>
    <div class="form-body">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{__('Enter your email address')}}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Go To Login') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
