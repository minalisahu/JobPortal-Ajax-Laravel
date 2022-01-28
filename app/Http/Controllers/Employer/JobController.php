<?php

namespace App\Http\Controllers\Employer;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\JobRequest;
use App\Models\Application;

class JobController extends Controller
{
    
    function __construct(){
        $this->middleware(['auth']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate(10);
        return view('employer.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::get();
        return view('employer.jobs.create',compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $data = $request->validated();
        if ($job = Job::create($data)) {
            $job->skills()->sync($data['skills']);
            return redirect()->route('employer.job.list')->with('success_message', __('Job  was successfully added.'));
        }
        return back()->withInput()->with('error_message', __('Unexpected error occurred while trying to process your request.'));
    }
    
    
    /**
     * Change status of the specified resource.
     *
     * @param id, token
     *
     * @return Illuminate\View\View
     */
    public function status(Request $request) {
        $job = Job::findOrFail($request->id);
        $job->update(['status' => ($job->status == 'Active' ? 0 : 1)]);
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('employer.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $skills = Skill::get();
        return view('employer.jobs.edit',compact('skills','job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
        $data = $request->validated();

        if ($job->update($data)) { 
            $job->skills()->sync($data['skills']);
            return redirect()->route('employer.job.list')->with('success_message', __('Job was successfully updated.'));
        }
        return back()->withInput()->with('error_message', __('Unexpected error occurred while trying to process your request.'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request, $id = null) {
        $rules = [
            
        ];
        if (!empty($id)) {
            
        }
        return $request->validate($rules);
    }
}