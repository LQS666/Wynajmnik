<?php

Route::group(['prefix' => 'my-account', 'namespace' => 'MyAccount'], function() {

    // My Account
    Route::get('/profile', 'MyAccountController@show')->name('my-account.profile');

    // Offers
    //Route::get('/offers', 'OffersController@show')->name('my-account.offers');

    // Addresses
    Route::get('/addresses', 'UserAddressController@index')->name('my-account.addresses');
    Route::post('/addresses', 'UserAddresscController@store');
    Route::get('/addresses/{id}', 'UserAddressController@edit')->where('id', '[0-9]');
    Route::delete('/addresses/{id}', 'UserAddressController@destroy')->where('id', '[0-9]');
    Route::patch('/addresses/{id}', 'UserAddresscController@update')->where('id', '[0-9]');

    // Password change
    Route::get('/password-change', 'ChangePasswordController@showChangeForm')->name('my-account.password-change');
    Route::post('/password-change', 'ChangePasswordController@change');

});
