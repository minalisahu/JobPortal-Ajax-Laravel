<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Events\PasswordChanged;
use App\Models\Job;
use App\Models\Application;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs= Job::count();
        $applications= Application::count();
        return view('employer.home',compact('jobs','applications'));
    }

      //profile edit page

      public function edit_profile()
      {
          $user = User::find(auth()->user()->id);
          return view('employer.profile.edit_profile',compact('user'));
      }

       //update profile

    public function update_profile(Request $request)
    {
        $user_input = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'username' => 'required|unique:users,username,' . auth()->user()->id,
            'companyname'=>'required|string|max:255',
        ]);

        $user = User::find(auth()->user()->id);

        if ($user->update($user_input)) {
                return redirect()->back()->with('success_message', __('Profile was successfully updated.'));
        }
        return back()->withInput()->with('error_message', __('Unexpected error occurred while trying to process your request.'));

    }

     //change-password page

     public function edit_password()
     {
         return view('employer.profile.change_password');
     }
 
     public function change_password(Request $request)
     {
         $data = $request->validate([
             'current_password' => 'required|password',
             'new_password' => 'required|string|min:6|same:confirm_password',
             'confirm_password' => 'required|string|min:6',
         ]);
 
         $user = User::find(auth()->user()->id);
 
         if ($user->fill(['password' => Hash::make($request['new_password'])])->save()) {
             event(new PasswordChanged(auth()->user()));
             return redirect()->route('employer.profile.edit-password')->with('success_message', __('Password was successfully changed.'));
         }
       
         return back()->with('error_message', __('Unexpected error occurred while trying to process your request.'));
     }

  
}