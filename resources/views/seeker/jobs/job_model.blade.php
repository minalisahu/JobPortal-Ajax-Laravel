<form method="POST" action="javascript:void(0);" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="alert alert-danger d-none"></div>
    <div class="appendTop30">
        <div class="row">
            <div class="col-12">
                <div class="row mb-2">
                    <div class="col-10">
                        <label for="headline"
                            class="required-label {{ $errors->has('headline') ? 'has-error' : '' }}">{{__('Headline')}}</label>
                        <div class="input-group input-group-sm ">
                            <input class="form-control form-control-sm" name="headline" required id="headline" type="text"
                                value="">
                        </div>
                        {!! $errors->first('headline', '<p class="help-block">:message
                        </p>') !!}
                    </div>

                    <div class="col-10">
                        <label for="cover_letter"
                            class="required-label {{ $errors->has('cover_letter') ? 'has-error' : '' }}">{{__('Cover Letter')}}</label>
                        <div class="input-group input-group-sm ">
                            <textarea class="form-control form-control-sm" name="cover_letter" required id="cover_letter"
                                type="text" value=""></textarea>
                        </div>
                        {!! $errors->first('cover_letter', '<p class="help-block">:message
                        </p>') !!}
                    </div>
                    <input class="form-control form-control-sm" name="user_id" id="user_id" type="hidden"
                                value="{{auth()->user()->id??""}}">

                </div>

            </div>
        </div>
    </div>
    <div class="card-footer text-right p-2">
        <button class="btn btn-danger" data-dismiss='modal'>{{__('Cancel')}}</button>
        <button class="btn btn-primary"
            onclick="storeProject('{{csrf_token()}}','{{$job->id}}','{{route('seeker.applied')}}')">{{__('Submit')}}</button>

    </div>
</form>