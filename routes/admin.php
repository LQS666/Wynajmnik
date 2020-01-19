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

    // Filters
    Route::get('/filters', 'FilterController@show')->name('admin.filters');
    Route::post('/filters', 'FilterController@store');
    Route::get('/filters/{filter}', 'FilterController@edit')->name('admin.filter');
    Route::delete('/filters/{filter}', 'FilterController@destory');
    Route::patch('/filters/{filter}', 'FilterController@update');

    // Filter's values
    Route::post('/filter-values/{filter}', 'FilterValueController@store')->name('admin.filter-value');
    Route::delete('/filter-values/{filter_value}', 'FilterValueController@destroy');
    Route::patch('/filter-values/{filter_value}', 'FilterValueController@update');

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
