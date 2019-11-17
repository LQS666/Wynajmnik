<?php

Route::group(['prefix' => 'my-account'], function() {

    // My Account
    Route::get('/profile', 'MyAccountController@show')->name('my-account.profile');

    // Offers
    //Route::get('/offers', 'OffersController@show')->name('my-account.offers');

    // Addresses
    //Route::get('/addresses', 'UserAddresscController@show')->name('my-account.addresses');
    //Route::post('/addresses', 'UserAddresscController@add');
    //Route::patch('/addresses/{id}', 'UserAddresscController@update');
    //Route::delete('/addresses/{id}', 'UserAddresscController@delete');

        // Password change
    Route::get('/password-change', 'Auth\ChangePasswordController@showChangeForm')->name('my-account.password-change');
    Route::post('/password-change', 'Auth\ChangePasswordController@change');

});
