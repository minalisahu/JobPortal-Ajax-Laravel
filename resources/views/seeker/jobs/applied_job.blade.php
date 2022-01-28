@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <x-alert></x-alert>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary float-left">{{__('Applied Jobs')}}::{{$appliedJobs->count()}}</h4>
            </div>
            <div class="card-body p-1">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Skills')}}</th>
                                <th>{{__('Required Experience')}}</th>
                                <th>{{__('Applied on')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appliedJobs as $appliedJob)
                            <tr>
                                <td>{{$appliedJob->job->job_title??''}}</td>
                                <td>{{$appliedJob->job->jobdescription??''}}</td>
                                <td>
                                    @foreach($appliedJob->job->skills as $skill)
                                    {{ $loop->first ? '' : ', ' }}
                                    {{$skill->name??''}}
                                    @endforeach
                                </td>
                                <td>{{$job->exp_in_month??0}} Month , {{$job->exp_in_year??0}} Year  </td>
                                <td>{{$appliedJob->modified??''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right p-2">
                {!! $appliedJobs->render() !!}
            </div>
        </div>
    </div>
</div>


@endsection