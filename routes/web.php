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

// Auth

Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('login');

Route::post('login', 'Auth\LoginController@login')
    ->name('login.attempt');

Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout');

Route::get('register', 'Auth\RegisterController@showRegisterForm')
    ->name('register');

Route::post('register', 'Auth\RegisterController@register');


Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('jobs', 'JobController@index')->name('jobs');
Route::get('jobs/create', 'JobController@create');
Route::post('jobs', 'JobController@store');
Route::get('jobs/{job}', 'JobController@show')->name('jobs.show');
Route::get('job/{job}', 'JobController@details')->name('jobs.details');
Route::delete('jobs/{job}', 'JobController@destroy');
Route::patch('jobs/{job}', 'JobController@update')->name('jobs.update');
Route::get('jobs/{job}/edit', 'JobController@edit')->name('jobs.edit');

Route::patch('proposals/{job}', 'ProposalController@update')->name('proposals.update');

Route::get('profiles', 'ResumeController@index')->name('profiles');
Route::get('profiles/create', 'ResumeController@create')->name('profiles/create');
Route::post('profiles', 'ResumeController@store');
Route::get('profiles/{resume}/edit', 'ResumeController@edit')->name('profiles.edit');
Route::patch('profiles/{resume}', 'ResumeController@update')->name('profiles.update');

