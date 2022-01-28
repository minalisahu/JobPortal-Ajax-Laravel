@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-inner">
                            <div class="row cols-2 gap-10">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="firstname"
                                            class="col-form-label text-md-right required-label">{{__('First Name')}}</label>
                                        <div>
                                            <input id="firstname" type="text"
                                                class="form-control @error('firstname') is-invalid @enderror"
                                                name="firstname" value="{{ old('firstname') }}"
                                                placeholder="Enter first name here" required autocomplete="firstname"
                                                autofocus>
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lastname"
                                            class="col-form-label text-md-right required-label">{{__('Last Name')}}</label>

                                        <div>
                                            <input id="lastname" type="text"
                                                class="form-control @error('lastname') is-invalid @enderror"
                                                name="lastname" value="{{ old('lastname') }}"
                                                placeholder="Enter last name here" required autocomplete="lastname"
                                                autofocus>
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row cols-2 gap-10">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email"
                                            class="col-form-label text-md-right required-label">{{ __('Email') }}</label>

                                        <div>
                                            <input id="email" type="text"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required placeholder="Enter email here"
                                                autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="username"
                                            class="col-form-label text-md-right required-label">{{ __('Username') }}</label>

                                        <div>
                                            <input id="username" type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                name="username" value="{{ old('username') }}"
                                                placeholder="Enter username here" required autocomplete="username"
                                                autofocus>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="companyname"
                                    class="col-form-label text-md-right required-label">{{ __('Company Name') }}</label>

                                <div>
                                    <input id="companyname" type="text"
                                        class="form-control @error('companyname') is-invalid @enderror"
                                        name="companyname" value="{{ old('companyname') }}" required
                                        placeholder="Enter companyname here" autocomplete="companyname" autofocus>
                                    @error('companyname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row cols-2 gap-10 sign-pass">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password"
                                            class="col-form-label text-md-right required-label">{{ __('Password') }}</label>
                                        <div>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required placeholder="Enter password here"
                                                autocomplete="new-password">
                                            <!-- <p style="font-size: 80%">The password must be at least 8 characters with special character.</p> -->

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password-confirm"
                                            class="col-form-label text-md-right required-label">{{ __('Confirm Password') }}</label>

                                        <div>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required
                                                placeholder="Enter confirm password here" autocomplete="new-password">
                                            <input id="access" type="hidden" class="form-control" name="access"
                                                value="3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value='1' name="access">
                        <input type="hidden" value='1' name="role_id">

                        <div class="d-flex flex-column flex-md-row mt-30 mt-lg-10">
                            <div class="flex-shrink-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sign-up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer">
                    <p>{{__('Already a member ?')}} <a href="{{route('register-page')}}"
                            class="btn btn-danger fa fa-step-backward">{{__('Sign-in')}}</a></p>

                </div>
            </div>
        </div>
        @endsection