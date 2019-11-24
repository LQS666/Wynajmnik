<?php

// TODO Route::name('my-account')->group
Route::group(['prefix' => 'my-account', 'namespace' => 'MyAccount'], function() {

    // My Account
    Route::get('/', 'MyAccountController')->name('my-account.profile');
    Route::post('/account-change', 'ChangeAccountController@change')->name('my-account.account-change');
    Route::post('/password-change', 'ChangePasswordController@change')->name('my-account.password-change');

    // Offers
    //Route::get('/offers', 'OffersController@show')->name('my-account.offers');

    // Addresses
    Route::get('/addresses', 'UserAddressController@index')->name('my-account.addresses');
    Route::post('/addresses', 'UserAddresscController@store');
    Route::get('/addresses/{id}', 'UserAddressController@edit');
    Route::delete('/addresses/{id}', 'UserAddressController@destroy');
    Route::patch('/addresses/{id}', 'UserAddresscController@update');

});
