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

// Offers
Route::get('/offers/{category?}', 'OfferController@index')->name('offers');
Route::get('/offers/{category}/{product}', 'OfferController@offer');

// Reports
Route::post('/reports/report', 'MyAccount\PaymentController@report');
