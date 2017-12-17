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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('barangs', 'BarangController');

// Route::get('orders/autocomplete', 'OrderController@autocomplete');

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'OrderController@create'));
Route::get('searchajax',array('as'=>'searchajax','uses'=>'OrderController@autoComplete'));

Route::resource('orders', 'OrderController');
Route::get('barangJson','OrderController@barangAr');

Route::resource('orderItems', 'OrderItemController');




Route::resource('pembayarans', 'PembayaranController');
Route::get('pembayarans/create/{id}', 'PembayaranController@create');