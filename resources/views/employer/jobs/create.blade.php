@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <x-alert></x-alert>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary float-left">{{__('Create Job')}}</h4>
                <div class="action-button float-right">
                    <a href="{{route('employer.job.list')}}" class="btn btn-sm btn-dark"><i class="fa fa-list"></i></a>
                </div>
            </div>
            <form method="POST" class="prevent-multi-submissions" action="{{route('employer.job.store')}}" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @include ('employer.jobs.form', ['job' => null,'skillList'=>null])
                </div>
                <div class="card-footer text-right p-2">
                    <button class="btn btn-primary button-prevent-multi-submissions">{{__('Create')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
