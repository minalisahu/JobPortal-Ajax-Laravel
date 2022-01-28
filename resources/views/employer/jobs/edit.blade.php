@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <x-alert></x-alert>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary float-left">{{__('Edit Job')}} :: {{$job->job_title}}</h4>
                <div class="action-button float-right">
                    <a href="{{route('employer.job.list')}}" class="btn btn-sm btn-dark"><i class="fa fa-list"></i></a>
                    <a href="{{route('employer.job.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></a>
                    <a href="javascript:void(0);" onclick="show('{{csrf_token()}}','{{route('employer.job.show',$job->id)}}')" class="btn btn-sm btn-success"><i class="fa fa-eye text-white"></i></a>
                </div>
            </div>
            <form method="POST" action="{{route('employer.job.update',$job->id)}}" enctype="multipart/form-data">
                @method('PUT')
                <div class="card-body">
                    @csrf
                    @include ('employer.jobs.form', ['job' => $job,'skillList'=>$job->skills])
                </div>
                <div class="card-footer text-right p-2">
                    <button class="btn btn-primary">{{__('Update')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection