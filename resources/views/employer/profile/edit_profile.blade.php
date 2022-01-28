@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <x-alert></x-alert>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary float-left">{{$user->name}}</h4>
            </div>
            <form method="POST" action="{{route('seeker.profile.update')}}" enctype="multipart/form-data">
                <div class="card-body p-2">
                    @csrf

                    <fieldset class="form-group bg-light py-4 px-2">
                       
                        <div class="row">
                            <div class="col-10">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <label for="firstname"
                                            class="required-label {{ $errors->has('firstname') ? 'has-error' : '' }}">{{__('Firstname')}}</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white"><i
                                                        class="fas fa-signature"></i></span>
                                            </div>
                                            <input class="form-control form-control-sm" name="firstname" type="text"
                                                value="{{ old('firstname', optional($user)->firstname) }}" required minlength="1"
                                                maxlength="255" placeholder="{{__('Enter firstname here...')}}">
                                        </div>
                                        {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-6">
                                        <label for="lastname"
                                            class="required-label {{ $errors->has('lastname') ? 'has-error' : '' }}">{{__('Lastname')}}</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white"><i
                                                        class="fas fa-signature"></i></span>
                                            </div>
                                            <input class="form-control form-control-sm" name="lastname" type="text"
                                                value="{{ old('lastname', optional($user)->lastname) }}"required minlength="1"
                                                maxlength="255" placeholder="{{__('Enter lastname here...')}}">
                                        </div>
                                        {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <label for="email"
                                            class="required-label {{ $errors->has('email') ? 'has-error' : '' }}">{{__('Email')}}</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white"><i
                                                        class="fas fa-envelope"></i></span>
                                            </div>
                                            <input class="form-control form-control-sm" readonly name="email"
                                                type="text" value="{{ old('email', optional($user)->email) }}"
                                                minlength="1" maxlength="255"
                                                placeholder="{{__('Enter email here...')}}">
                                        </div>
                                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-6">
                                        <label for="username"
                                            class=" required-label{{ $errors->has('username') ? 'has-error' : '' }}">{{__('Username')}}</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white"><i
                                                        class="fas fa-user"></i></span>
                                            </div>
                                            <input class="form-control form-control-sm" name="username" type="text"
                                                value="{{ old('username', optional($user)->username) }}" required minlength="1"
                                                maxlength="255" placeholder="{{__('Enter username here...')}}">
                                        </div>
                                        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <label for="companyname"
                                            class="required-label {{ $errors->has('companyname') ? 'has-error' : '' }}">{{__('Company Name')}}</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white"><i
                                                        class="fas fa-envelope"></i></span>
                                            </div>
                                            <input class="form-control form-control-sm" name="companyname"
                                                type="text" value="{{ old('companyname', optional($user)->companyname) }}"
                                                minlength="1" maxlength="255" required
                                                placeholder="{{__('Enter companyname here...')}}">
                                        </div>
                                        {!! $errors->first('companyname', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="card-footer text-right p-2">
                    <button class="btn btn-primary">{{__('Update')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection