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

Route::get('/','ProductController@index')->name('product_index');
Route::get('/create','ProductController@create')->name('product_create');
Route::post('/store','ProductController@store')->name('product_store');
Route::get('{id}/show','ProductController@show')->name('product_show');
Route::get('/{id}/edit','ProductController@edit')->name('product_edit');
Route::put('/{id}/update','ProductController@update')->name('product_update');
Route::delete('/{id}/destroy','ProductController@destroy')->name('product_delete');
