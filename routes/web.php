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

Route::get('/account/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/account/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/account/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/account/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/account/email/resend', 'Auth\VerificationController@resend')->name('email.resend');
Route::get('/account/email/verify', 'Auth\VerificationController@show')->name('email.notice');
Route::get('/account/email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('email.verify');

