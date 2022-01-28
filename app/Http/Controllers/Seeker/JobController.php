<?php

namespace App\Http\Controllers\Seeker;


use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    
      //profile edit page

      public function edit_profile()
      {
          $user = User::find(auth()->user()->id);
          $skills = Skill::get();
          return view('seeker.profile.edit_profile',compact('user','skills'));
      }

       //update profile

    public function update_profile(Request $request)
    {
        $user_input = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'exp_in_year' =>'nullable|string|max:255',
            'exp_in_month' =>'nullable|max:255|min:1',
            'resume'=>'nullable|mimes:pdf,doc,docx,csv,xlsx,xls|max:2048',
            'skills'=>'required',
        ]);

        $user = User::find(auth()->user()->id);

        if($request->resume){
            if ($files = $request->file('resume')) {
                $destinationPath = 'upload/userResume'; // upload path
                $resume = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath,$resume);
                }    
                    $user->update([
                    'firstname'=>$request->firstname,
                    'lastname'=>$request->lastname,
                    'title'=>$request->title,
                    'exp_in_month'=>$request->exp_in_month,    
                    'exp_in_year'=>$request->exp_in_year,    
                    'resume' => $resume,
                    'path'=> $destinationPath ,
                ]);  
                $user->skills()->sync($user_input['skills']);
                return redirect()->back()->with('success_message', __('Profile was successfully updated.'));
             }
        else{
            $user->update([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'title'=>$request->title,
                'exp_in_month'=>$request->exp_in_month,    
                'exp_in_year'=>$request->exp_in_year,                ]);  
            $user->skills()->sync($user_input['skills']);
            return redirect()->back()->with('success_message', __('Profile was successfully updated.'));
        }            
        return back()->withInput()->with('error_message', __('Unexpected error occurred while trying to process your request.'));

    }

    public function jobIndex()
    {
        $jobs = Job::paginate(10);
        return view('seeker.jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('seeker.jobs.show', compact('job'));
    }

    public function applyJobModel(Request $request){
        $job = Job::findOrFail($request->id);
        return view('seeker.jobs.job_model',compact('job'));
    }


    public function applied(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'headline'=>'required|string|max:255',
            'cover_letter'=>'required',
            'job_id'=>'required',
            'user_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $data = $request->all();
        $data['is_applied']= 1;
        
        $jobs = Application::where('job_id',$request->job_id)
        ->where('user_id',$request->user_id)
         ->exists(); 
         
         if(!$jobs){
            if ($job = Application::create($data)) {
                return response()->json(['success_message' => 'successfully Applied !!']);
            }
        }else if($jobs){

            $applied = Application::where('job_id',$request->job_id)
            ->where('user_id',$request->user_id)
             ->first(); 

             $applied->update([
                'headline' => $request->headline,
                'cover_letter' => $request->cover_letter,
                'job_id'=> $request->job_id ,
                'user_id'=> $request->user_id
            ]);
                return response()->json(['success_message' => 'successfully Applied !!']);
        }
    }

    public function appliedjobIndex(){
        $user = User::find(auth()->user()->id);
        $appliedJobs = Application::where('user_id',$user->id)->paginate(10);
        return view('seeker.jobs.applied_job', compact('appliedJobs'));
    }

}