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
                                                value="{{ old('firstname', optional($user)->firstname) }}" minlength="1"
                                                maxlength="255" placeholder="{{__('Enter firstname here...')}}"
                                                required>
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
                                                value="{{ old('lastname', optional($user)->lastname) }}" minlength="1"
                                                maxlength="255" placeholder="{{__('Enter lastname here...')}}" required>
                                        </div>
                                        {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <label for="title"
                                            class="required-label {{ $errors->has('title') ? 'has-error' : '' }}">{{__('Title')}}</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white"><i
                                                        class="fas fa-envelope"></i></span>
                                            </div>
                                            <input class="form-control form-control-sm" name="title" type="text"
                                                value="{{ old('title', optional($user)->title) }}" minlength="1"
                                                maxlength="2" placeholder="{{__('Enter title here...')}}" required>
                                        </div>
                                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <!-- <div class="col-6">
                                        <label for="experience"
                                            class=" required-label{{ $errors->has('experience') ? 'has-error' : '' }}">{{__('Experience')}}</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white"><i
                                                        class="fas fa-user"></i></span>
                                            </div>
                                            <input class="form-control form-control-sm" name="experience" type="text"
                                                value="{{ old('experience', optional($user)->experience) }}"
                                                minlength="1" maxlength="255"
                                                placeholder="{{__('Enter experience here...')}}" required>
                                        </div>
                                        {!! $errors->first('experience', '<p class="help-block">:message</p>') !!}
                                    </div> -->

                                    <div class="col-6">
                                        <label for="experience"
                                            class=" required-label{{ $errors->has('experience') ? 'has-error' : '' }}">{{__('Experience')}}</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white"><i
                                                        class="fas fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm simple-select"
                                                id="simple-select" name="exp_in_month">
                                                <option value="">{{__('Select')}}</option>
                                                @for($i = 0; $i <= 12; $i++) <option value="{{$i}}"  {{ old('exp_in_month', optional($user)->exp_in_month) == $i ?'selected':'' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary text-white">Month</span>
                                            </div>
                                            <select class="form-control form-control-sm simple-select"
                                                id="simple-select" name="exp_in_year">
                                                <option value="">{{__('Select')}}</option>
                                                @for($i = 0; $i <= 25; $i++) <option value="{{$i}}" {{ old('exp_in_year', optional($user)->exp_in_year) == $i ?'selected':'' }}>{{$i}}</option>
                                                    @endfor
                                            </select>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary text-white">Year</span>
                                            </div>
                                        </div>
                                        {!! $errors->first('exp_in_year', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="nput-group input-group-sm col-6">
                                        <label for="selectskills"
                                            class="col-4 control-label required-label {{ $errors->has('skills') ? 'has-error' : '' }}">{{__('Skills')}}</label>
                                        <div class="">
                                            <select class="form-control form-control-sm multiple-select" name="skills[]"
                                                multiple='multiple' required>
                                                @foreach($skills as $skill)
                                                <option value="{{$skill->id}}"
                                                    {{ old('skills', optional($user->skills)->contains($skill->id))?'selected':'' }}>
                                                    {{$skill->name}}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('skills', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="file"
                                            class=" required-label{{ $errors->has('file') ? 'has-error' : '' }}">{{__('Resume')}}</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white"><i
                                                        class="fas fa-user"></i></span>
                                            </div>
                                            <input class="form-control form-control-sm" name="resume" type="file"
                                                value="" accept=".pdf,.xls,.xlsx,.doc,.docx" required>
                                        </div>
                                        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
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