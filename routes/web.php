<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/account/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/account/register', 'Auth\RegisterController@register');

Route::get('/account/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/account/login', 'Auth\LoginController@login');

Route::post('/account/logout', 'Auth\LoginController@logout')->name('logout');
