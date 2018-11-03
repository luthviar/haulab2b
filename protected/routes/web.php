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

Route::get('/', 'HomeController@index');

Route::get('/home', function (){
    return view('home');
})->name('home');

Route::get('/packet/{id}/{title}','HomeController@view_packet');

Route::get('/packet/request/{id}/{title}','HomeController@request_order');

Route::get('/packet/request/invoice/{id}/{title}','HomeController@request_invoice');


Route::get('packets/order/success/request','HomeController@request_to_admin');

Route::post('packets/order/admin','HomeController@chat_admin');

Route::get('invoice/{id_user}/{id_invoice}','HomeController@view_by_invoice');

Route::get('packets',function () {
    return view('customer.detail_packets');
});

Route::get('packets/order',function () {
    return view('customer.detail_invoice');
});

Route::get('packets/order/success',function () {
    return view('customer.success_order');
});