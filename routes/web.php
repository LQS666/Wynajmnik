<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', 'HomeController@index')->name('home');

// Categories
Route::get('/categories/{category?}', 'CategoryController@index')->name('web.categories');
Route::get('/categories/{category}/{product}', 'ProductController@category')->name('web.category.product');

// Products
Route::get('/products', 'ProductController@index')->name('web.products');
Route::get('/products/{product}', 'ProductController@show')->name('web.product');

// Search
Route::get('/search', 'SearchController')->name('web.search');

// Reports
Route::post('/reports/report', 'MyAccount\PaymentController@report');
