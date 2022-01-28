@extends('layouts.auth')

@section('content')


<!-- Nested Row within Card Body -->
<div class="row">
    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{__('Job Portal!')}}</h1>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Employer</h5>
                            <p class="card-text">
                            </p>
                            <a href="{{route('register')}}" class="btn btn-primary">{{ __('Sign-up') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Job Seekers </h5>
                            <p class="card-text">
                            </p>
                            <a href="{{route('seeker.register')}}" class="btn btn-primary">{{ __('Sign-up') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div></a></li>
        </ul>
    </div>
    <hr>
</div>
</div>
</div>
@endsection