<?php

// TODO Route::name('my-account')->group
Route::group(['prefix' => 'my-account', 'namespace' => 'MyAccount'], function() {

    // My Account
    Route::get('/', 'MyAccountController')->name('my-account.profile');
    Route::post('/account-change', 'ChangeAccountController@change')->name('my-account.account-change');
    Route::post('/password-change', 'ChangePasswordController@change')->name('my-account.password-change');

    // Offers
    Route::get('/offers', 'OfferController@index')->name('my-account.offer');
    Route::post('/offers/{offer}', 'OfferController@update');

    // Addresses
    Route::get('/addresses', 'UserAddressController@index')->name('my-account.addresses');
    Route::post('/addresses', 'UserAddressController@store');
    Route::get('/addresses/{address}', 'UserAddressController@edit')->name('my-account.address');
    Route::delete('/addresses/{address}', 'UserAddressController@destroy');
    Route::patch('/addresses/{address}', 'UserAddressController@update');

    // Products
    Route::get('/products', 'ProductController@index')->name('my-account.products');
    Route::get('/products/new', 'ProductController@new')->name('my-account.product-new');
    Route::post('/products/new', 'ProductController@store');
    Route::get('/products/{product}', 'ProductController@edit')->name('my-account.product');
    Route::delete('/products/{product}', 'ProductController@destroy');
    Route::patch('/products/{product}', 'ProductController@update');

    // Product Pictures
    Route::delete('/product-pictures/{picture}', 'ProductController@destroyPicture')->name('my-account.product-picture');

    // PayU
    Route::get('/payments', 'PaymentController@index')->name('my-account.payments');
    Route::post('/payments', 'PaymentController@store');
    Route::get('/payments/finish', 'PaymentController@finish');
    Route::post('/payments/report', 'PaymentController@report');
    Route::get('/payments/{payment}', 'PaymentController@send')->name('my-account.payment');
});
