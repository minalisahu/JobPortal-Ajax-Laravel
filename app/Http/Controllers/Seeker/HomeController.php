<?php

namespace App\Http\Controllers\Seeker;


use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Skill;



class HomeController extends Controller
{
    


    public function home()
    {
        $jobs = Job::count();
        return view('seeker.dashboard',compact('jobs'));
    }
    public function index()
    {

        return view('seeker.home.index');
    }

    public function loginPage()
    {
        return view('seeker.auth.login');
    }

    public function registerPage()
    {
        return view('seeker.auth.register');
    }

    public function forgot_password()
    {
        return view('seeker.auth.forgotPassword');
    }

   

  
  
}