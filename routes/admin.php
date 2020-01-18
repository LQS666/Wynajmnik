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

    // Sites
    Route::get('/sites', 'SiteController@show')->name('admin.sites');
    Route::post('/sites', 'SiteController@store');
    Route::get('/sites/{site}', 'SiteController@edit')->name('admin.site');
    Route::delete('/sites/{site}', 'SiteController@destroy');
    Route::patch('/sites/{site}', 'SiteController@update');

});
