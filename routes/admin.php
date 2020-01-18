<?php

// TODO Route::name('admin')->group
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

    // Admin
    Route::get('/', 'AdminController')->name('admin.profile');

    // Categories
    Route::get('/categories/{category?}', 'CategoryController@show')->name('admin.categories');
    Route::post('/categories/{category?}', 'CategoryController@store');
    Route::delete('/categories/{category}', 'CategoryController@destory');
    Route::patch('/categories/{category}', 'CategoryController@update');

    // Products
    Route::get('/products', 'ProductController@index')->name('admin.products');
    Route::get('/products/{product}', 'ProductController@edit')->name('admin.product');
    Route::delete('/products/{product}', 'ProductController@destroy');
    Route::patch('/products/{product}', 'ProductController@update');

    // Product Pictures
    Route::get('/product-pictures/{picture}', 'ProductController@destroyPicture')->name('admin.product-picture');

    // Sites
    Route::get('/sites', 'SiteController@show')->name('admin.sites');
    Route::post('/sites', 'SiteController@store');
    Route::get('/sites/{site}', 'SiteController@edit')->name('admin.site');
    Route::delete('/sites/{site}', 'SiteController@destroy');
    Route::patch('/sites/{site}', 'SiteController@update');

});
