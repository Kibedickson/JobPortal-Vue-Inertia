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
Route::get('jobs', 'JobController@index');


