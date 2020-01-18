<?php

// TODO Route::name('admin')->group
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

    Route::get('/', 'AdminController')->name('admin.profile');

    Route::get('/categories/{category?}', 'CategoryController@show')->name('admin.categories');
    Route::post('/categories/{category?}', 'CategoryController@store');
    Route::delete('/categories/{category}', 'CategoryController@destory');
    Route::patch('/categories/{category}', 'CategoryController@store');

});
