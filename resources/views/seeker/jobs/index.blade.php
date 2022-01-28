@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <x-alert></x-alert>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary float-left">{{__('Jobs')}}::{{$jobs->count()}}</h4>
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
                                <td>{{$job->created??''}}</td>
                                <td>
                                    <a href="javascript:void(0);"
                                        onclick="show('{{csrf_token()}}','{{route('seeker.job.show',$job->id)}}')"
                                        class="btn btn-sm btn-warning"><i class="fa fa-eye text-white"></i></a>
                                    <a href="javascript:void(0);"
                                        onclick="openJobModel('{{csrf_token()}}','{{route('seeker.apply.model')}}','{{$job->id}}')"
                                        class="btn btn-sm btn-danger">Apply</a></h4>
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

<!-- open apply job model -->
<div class="modal fade" id="jobModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-overlay"></div>
    <div class="modal-dialog  " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply Here !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="jobModelLoader" class="text-center d-none">
                <strong>Loading...</strong>
                <div class="spinner-grow ml-auto" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="modal-body" id="jobModelForm">
            </div>
        </div>
    </div>
</div>


@endsection