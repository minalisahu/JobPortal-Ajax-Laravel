<?php

namespace App\Http\Controllers\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EmployerController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }
}