@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <x-alert></x-alert>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary float-left">{{__('My Settings')}}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{route('employer.profile.change-password')}}" method="POST" >
                                @csrf
                                <div class="card-body p-2">
                                    @csrf
                                    <fieldset class="form-group bg-light py-4 px-2">
                                        <div class="row">
                                        
                                            <div class="col-10">
                                                <div class="form-group row">
                                                <label for="rate" class=" col-4 control-label required-label {{ $errors->has('current_password') ? 'has-error' : '' }}">{{__('Current Password')}}</label>
                                                <div class="col-8">
                                                    <input class="form-control form-control-user " name="current_password" type="password" required placeholder="{{__('Enter here...')}}">
                                                    {!! $errors->first('current_password', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                    <label for="rate" class=" col-4 control-label required-label {{ $errors->has('new_password') ? 'has-error' : '' }}">{{__('New Password')}}</label>
                                                    <div class="col-8">
                                                        <input class="form-control form-control-user" name="new_password" type="password" required placeholder="{{__('Enter here...')}}">
                                                        {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="rate" class=" col-4 control-label required-label {{ $errors->has('confirm_password') ? 'has-error' : '' }}">{{__('Confirm Password')}}</label>
                                                    <div class="col-8">
                                                        <input class="form-control form-control-user" name="confirm_password" type="password" required placeholder="{{__('Enter here...')}}">
                                                        {!! $errors->first('confirm_password', '<p class="help-block">:message</p>') !!}
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
            </div>
        </div>
    </div>
</div>
@endsection