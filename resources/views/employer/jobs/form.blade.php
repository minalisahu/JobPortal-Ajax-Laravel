<div class="form-group row">
    <label for="job_title"
        class="col-4 control-label required-label {{ $errors->has('job_title') ? 'has-error' : '' }}">{{__('Job Title')}}</label>
    <div class="col-8">
        <input class="form-control title-input" name="job_title" type="text" id="job_title"
            value="{{ old('job_title', optional($job)->job_title) }}" minlength="1" maxlength="255"
            placeholder="{{__('Enter job title here...')}}" required>
        {!! $errors->first('job_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row">
    <label for="description"
        class="col-4 control-label required-label {{ $errors->has('description') ? 'has-error' : '' }}">{{__('Job Description')}}</label>
    <div class="col-8">
        <textarea class="form-control" name="description" rows="6" type="text" id="description"
            placeholder="{{__('Enter description here...')}}"
            required>{{ old('description', optional($job)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row">
    <label for="selectskills"
        class="col-4 control-label required-label {{ $errors->has('skills') ? 'has-error' : '' }}">{{__('Skills')}}</label>
    <div class="col-8">
        <select class="form-control multiple-select" name="skills[]" multiple='multiple' required>
            @foreach($skills as $skill)
            <option value="{{$skill->id}}"
                {{ old('skills', optional($skillList)->contains($skill->id))?'selected':'' }}>
                {{$skill->name}}</option>
            @endforeach
        </select>
        {!! $errors->first('skills', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- <div class="form-group row">
    <label for="experience"
        class="col-4 control-label required-label {{ $errors->has('experience') ? 'has-error' : '' }}">{{__('Experience Required')}}</label>
    <div class="col-8">
        <input class="form-control" name="experience" type="text" required id="experience_required"
            value="{{ old('experience', optional($job)->experience) }}" minlength="1" maxlength="255"
            placeholder="{{__('Enter experience here...')}}">
        {!! $errors->first('experience', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

<div class="form-group row">
    <label for="exp_in_year"
        class="col-4 control-label required-label {{ $errors->has('exp_in_year') ? 'has-error' : '' }}">{{__('Experience Required')}}</label>
    <div class="col-8 input-group input-group-sm">
        <select class="form-control form-control-sm simple-select" id="simple-select" name="exp_in_month">
            <option value="">{{__('Select')}}</option>
            @for($i = 0; $i <= 12; $i++) <option value="{{$i}}"
                {{ old('exp_in_month', optional($job)->exp_in_month) == $i ?'selected':'' }}>{{$i}}</option>
                @endfor
        </select>
        <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">Month</span>
        </div>
         <select class="form-control form-control-sm simple-select" id="simple-select" name="exp_in_year">
            <option value="">{{__('Select')}}</option>
            @for($i = 0; $i <= 25; $i++) <option value="{{$i}}"
                {{ old('exp_in_year', optional($job)->exp_in_year) == $i ?'selected':'' }}>{{$i}}</option>
                @endfor
                </select>
                <div class="input-group-prepend">
                    <span class="input-group-text bg-primary text-white">Year</span>
                </div>
    </div>
</div>