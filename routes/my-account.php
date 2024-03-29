<?php

Route::group(['prefix' => 'my-account', 'namespace' => 'MyAccount', 'as' => 'my-account.'], function() {

    // Addresses
    Route::get('/addresses', 'UserAddressController@index')->name('addresses');
    Route::post('/addresses', 'UserAddressController@store');
    Route::get('/addresses/{address}', 'UserAddressController@edit')->name('address');
    Route::delete('/addresses/{address}', 'UserAddressController@destroy');
    Route::patch('/addresses/{address}', 'UserAddressController@update');

    // My Account
    Route::get('/', 'MyAccountController')->name('profile');
    Route::post('/account-change', 'ChangeAccountController@change')->name('account-change');
    Route::post('/password-change', 'ChangePasswordController@change')->name('password-change');

    // Offers - My
    Route::get('/offers/my', 'OfferController@showMy')->name('my-offers');
    Route::delete('/offers/my/{offer}', 'OfferController@destroy')->name('my-offer');

    // Offers - Foreign
    Route::get('/offers/foreign', 'OfferController@showForeign')->name('foreign-offers');
    Route::delete('/offers/foreign/{offer}', 'OfferController@reject')->name('foreign-offer');
    Route::patch('/offers/foreign/{offer}', 'OfferController@accept');

    // PayU
    Route::get('/payments', 'PaymentController@index')->name('payments');
    Route::post('/payments', 'PaymentController@store');
    Route::get('/payments/finish', 'PaymentController@finish');
    Route::get('/payments/{payment}', 'PaymentController@send')->name('payment');

    // Products
    Route::get('/products', 'ProductController@index')->name('products');
    Route::get('/products/new', 'ProductController@new')->name('product-new');
    Route::post('/products/new', 'ProductController@store');
    Route::get('/products/{product}', 'ProductController@edit')->name('product');
    Route::delete('/products/{product}', 'ProductController@destroy');
    Route::patch('/products/{product}', 'ProductController@update');

    // Points
    Route::get('/points', 'PointController')->name('points');

    // Product Pictures
    Route::get('/product-pictures/{picture}', 'ProductController@destroyPicture')->name('product-picture');

});
