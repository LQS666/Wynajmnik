<?php

Route::group(['namespace' => 'Web', 'as' => 'web.'], function() {

    // Categories
    Route::get('/categories/{category?}', 'CategoryController@index')->name('categories');
    Route::get('/categories/{category}/{product}', 'ProductController@category')->name('category.product');

    // Home
    Route::get('/', 'HomeController@index')->name('home');

    // Products
    Route::get('/products', 'ProductController@index')->name('products');
    Route::get('/products/{product}', 'ProductController@show')->name('product');

    // Offer
    Route::post('/products/{product}', 'OfferController@store')->name('offer');

    // Search
    Route::get('/search', 'SearchController')->name('search');

    // Site
    Route::get('/sites/{site}', 'SiteController')->name('site');

});

// Reports
Route::post('/reports/report', 'MyAccount\PaymentController@report');
