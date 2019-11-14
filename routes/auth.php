<?php

Route::group(['namespace' => 'Auth'], function() {

    // Register
    Route::get('/account/register', 'RegisterController@showRegistrationForm')->name('account.register');
    Route::post('/account/register', 'RegisterController@register');

    // Login
    Route::get('/account/login', 'LoginController@showLoginForm')->name('account.login');
    Route::post('/account/login', 'LoginController@login');

    // Logout
    Route::get('/account/logout', 'LoginController@logout')->name('account.logout');

    // Password reset
    Route::get('/account/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('/account/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/account/password/reset', 'ResetPasswordController@reset')->name('password.update');
    Route::post('/account/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    // Password change
    Route::get('/account/password/change', 'ChangePasswordController@showChangeForm')->name('password.change');
    Route::post('/account/password/change', 'ChangePasswordController@change');

    // E-mail verification
    Route::get('/account/email/resend', 'VerificationController@resend')->name('verification.resend');
    Route::get('/account/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/account/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');

});
