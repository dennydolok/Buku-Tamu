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

Route::get('/', 'kontakController@index');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/kontak','kontakController@index');
Route::get('/hapus/{id}','kontakController@hapus');
Route::get('/edit/{id}','kontakController@edit');
Route::get('/create','kontakController@create');
Route::post('/save','kontakController@simpan');
Route::get('/report','kontakController@report');
Route::patch('/update/{id}','kontakController@update');
