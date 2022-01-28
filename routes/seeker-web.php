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

Route::group(['prefix' => 'seeker', 'middleware' => 'verified'], function () {
    Route::get('/', 'Seeker\HomeController@home')->name('seeker.dashboard');

    Route::group(['prefix' => 'profile'], function () {
      Route::get('/', 'Seeker\JobController@edit_profile')->name('seeker.profile.edit');
      Route::post('/profile', 'Seeker\JobController@update_profile')->name('seeker.profile.update');
    });
    Route::group(['prefix' => 'job'], function () {
      Route::get('/', 'Seeker\JobController@jobIndex')->name('seeker.job.list');
      Route::get('/show/{job}', 'Seeker\JobController@show')->name('seeker.job.show')->where('id', '[0-9]+');
      Route::get('/applied-jobs', 'Seeker\JobController@appliedjobIndex')->name('seeker.applied-job.list');
      Route::post('/apply-model', 'Seeker\JobController@applyJobModel')->name('seeker.apply.model');
      Route::post('/applied', 'Seeker\JobController@applied')->name('seeker.applied');


    });
    
  });
