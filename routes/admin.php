<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {

    // Admin
    Route::get('/', 'AdminController')->name('profile');

    // Categories
    Route::get('/categories/{category?}', 'CategoryController@show')->name('categories');
    Route::post('/categories/{category?}', 'CategoryController@store');
    Route::get('/category/{category}', 'CategoryController@edit')->name('category');
    Route::delete('/category/{category}', 'CategoryController@destroy');
    Route::patch('/category/{category}', 'CategoryController@update');

    // Filters
    Route::get('/filters/{filter?}', 'FilterController@show')->name('filters');
    Route::post('/filters/', 'FilterController@store');
    Route::delete('/filters/{filter}', 'FilterController@destroy')->name('filter');
    Route::patch('/filters/{filter}', 'FilterController@update');

    // Filter's values
    Route::get('/filter-values/{filter}/{filter_value?}', 'FilterValueController@show')->name('filter-values');
    Route::post('/filter-values/{filter}', 'FilterValueController@store');
    Route::delete('/filter-values/{filter}/{filter_value}', 'FilterValueController@destroy')->name('filter-value');
    Route::patch('/filter-values/{filter}/{filter_value}', 'FilterValueController@update');

    // Products
    Route::get('/products', 'ProductController@index')->name('products');
    Route::get('/products/{product}', 'ProductController@edit')->name('product');
    Route::delete('/products/{product}', 'ProductController@destroy');
    Route::patch('/products/{product}', 'ProductController@update');

    // Product Pictures
    Route::get('/product-pictures/{picture}', 'ProductController@destroyPicture')->name('product-picture');

    // Sites
    Route::get('/sites', 'SiteController@show')->name('sites');
    Route::post('/sites', 'SiteController@store');
    Route::get('/sites/{site}', 'SiteController@edit')->name('site');
    Route::delete('/sites/{site}', 'SiteController@destroy');
    Route::patch('/sites/{site}', 'SiteController@update');

});
