<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/home', 'Employer\HomeController@index')->name('home')->middleware('verified');

Route::group(['prefix' => 'profile'], function () {
  Route::get('/', 'Employer\HomeController@edit_profile')->name('employer.profile.edit');
  Route::post('/profile', 'Employer\HomeController@update_profile')->name('employer.profile.update');
});

Route::group(['prefix' => 'job'], function () {
  Route::get('/', 'Employer\JobController@index')->name('employer.job.list');
  Route::get('/create', 'Employer\JobController@create')->name('employer.job.create');
  Route::post('/', 'Employer\JobController@store')->name('employer.job.store');
  Route::get('/{job}/edit', 'Employer\JobController@edit')->name('employer.job.edit')->where('id', '[0-9]+');
  Route::put('/update/{job}', 'Employer\JobController@update')->name('employer.job.update')->where('id', '[0-9]+');
  Route::get('/show/{job}', 'Employer\JobController@show')->name('employer.job.show')->where('id', '[0-9]+');
});
