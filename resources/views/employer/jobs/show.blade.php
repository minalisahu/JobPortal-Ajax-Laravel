<div class="row">
    <div class="col-6 font-weight-bold">{{__('Job Title')}}</div>
    <div class="col-6 font-italic text-primary">{{$job->job_title??''}}</div>
    <div class="col-6 font-weight-bold">{{__('Description')}}</div>
    <div class="col-6 font-italic text-primary">{{$job->description ??''}}</div>
    <div class="col-6 font-weight-bold">{{__('Experience Required')}}</div>
    <div class="col-6 font-italic text-primary">{{$job->experience}}</div>
    <div class="col-6 font-weight-bold">{{__('Skills')}}</div>
    @foreach($job->skills as $skill)
   
    <div class="col-9 font-italic text-primary"> {{ $loop->first ? '' : ', ' }}{{$skill->name??''}}</div>
    @endforeach 
    <div class="col-6 font-weight-bold">{{__('Status')}}</div>
    <div class="col-6 font-italic text-primary">{{$job->status}}</div>
    <div class="col-6 font-weight-bold">{{__('Created')}}</div>
    <div class="col-6 font-italic text-primary">{{$job->created}}</div>
    <div class="col-6 font-weight-bold">{{__('Modified')}}</div>
    <div class="col-6 font-italic text-primary">{{$job->modified}}</div>
</div>