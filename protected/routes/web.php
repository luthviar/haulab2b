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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('customer.home');
});

Route::get('packets',function () {
    return view('customer.detail_packets');
});

Route::get('packets/order',function () {
    return view('customer.detail_invoice');
});

Route::get('packets/order/success',function () {
    return view('customer.success_order');
});