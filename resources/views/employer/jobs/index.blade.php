@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <x-alert></x-alert>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary float-left">{{__('Jobs')}}::{{$jobs->count()}}</h4>
                <div class="action-button float-right">
                    <a href="{{route('employer.job.create')}}" class="btn btn-sm btn-dark"><i
                            class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body p-1">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Skills')}}</th>
                                <th>{{__('Experience')}}</th>
                                <th>{{__('Total Application')}}</th>
                                <th>{{__('Created')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->job_title??''}}</td>
                                <td>{{$job->jobdescription??''}}</td>
                                <td>
                                    @foreach($job->skills as $skill)
                                    {{ $loop->first ? '' : ', ' }}
                                    {{$skill->name??''}}
                                    @endforeach
                                </td>
                                <td>{{$job->exp_in_month??0}} Month , {{$job->exp_in_year??0}} Year  </td>
                                <td>
                                    @php($applicationCount = $job->applications->count())
                                    {{$applicationCount ??''}}
                                </td>
                                <td>{{$job->created??''}}</td>
                                <td>
                                    <a href="{{route('employer.job.edit',$job->id)}}" class="btn btn-sm btn-info"><i
                                            class="fa fa-edit text-white"></i></a>
                                    <a href="javascript:void(0);"
                                        onclick="show('{{csrf_token()}}','{{route('employer.job.show',$job->id)}}')"
                                        class="btn btn-sm btn-warning"><i class="fa fa-eye text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right p-2">
                {!! $jobs->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection