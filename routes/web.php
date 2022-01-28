<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::get('/employer-sign-in', 'Employer\EmployerController@login')->name('employer.login');

Route::get('/', 'Seeker\HomeController@loginPage')->name('seeker.login');
Route::group(['prefix' => '/'], function () {
  Route::get('/register-page', 'Seeker\HomeController@index')->name('register-page');
    // Route::get('/sign-in', 'Seeker\HomeController@loginPage')->name('seeker.login');
    Route::get('/sign-up', 'Seeker\HomeController@registerPage')->name('seeker.register');
    Route::get('/dashboard', 'Seeker\HomeController@dashboard')->name('seeker.dashboard');
    Route::get('forgot-password', 'Seeker\HomeController@forgot_password')->name('seeker.forgot.password');
});
Route::get('/change-password', 'Employer\HomeController@edit_password')->name('employer.profile.edit-password')->middleware('verified');
Route::post('/change-password', 'Employer\HomeController@change_password')->name('employer.profile.change-password')->middleware('verified');


Auth::routes(['register' => true, 'verify' => true, 'login' => false]);
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.show');
Route::post('login', 'Auth\LoginController@login')->name('login');
