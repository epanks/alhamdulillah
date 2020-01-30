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

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/paket-list', 'PaketController@index')->name('paket-list');
Route::get('/paket-list', 'PaketController@query')->name('paket.query');
Route::get('/paket-filter', 'PaketController@filter')->name('paket.filter');
Route::get('/paket-filter2', 'PaketfilterController@getPaket')->name('paket.filter2');

//export
Route::get('paket/export/', 'PaketController@export')->name('paket.download');
