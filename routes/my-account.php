<?php

// TODO Route::name('my-account')->group
Route::group(['prefix' => 'my-account', 'namespace' => 'MyAccount'], function() {

    // My Account
    Route::get('/', 'MyAccountController')->name('my-account.profile');
    Route::post('/account-change', 'ChangeAccountController@change')->name('my-account.account-change');
    Route::post('/password-change', 'ChangePasswordController@change')->name('my-account.password-change');

    // Offers
    Route::get('/offers', 'OfferController@index')->name('my-account.offers');
    Route::post('/offers', 'OfferController@update');

    // Addresses
    Route::get('/addresses', 'UserAddressController@index')->name('my-account.addresses');
    Route::post('/addresses', 'UserAddressController@store');
    Route::get('/addresses/{address}', 'UserAddressController@edit')->name('my-account.address');
    Route::delete('/addresses/{address}', 'UserAddressController@destroy');
    Route::patch('/addresses/{address}', 'UserAddressController@update');

    // Products
    Route::get('/products', 'ProductController@index')->name('my-account.products');
    Route::post('/products', 'ProductController@store');
    Route::get('/products/{product}', 'ProductController@edit')->name('my-account.product');
    Route::delete('/products/{product}', 'ProductController@destroy');
    Route::patch('/products/{product}', 'ProductController@update');

});
