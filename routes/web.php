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

//attributes
Route::name('attribute.')->middleware(['auth','admin'])->group(function () {
    Route::get('/attribute','AttributeController@index')->name('list');
    Route::get('/attribute/create','AttributeController@create')->name('create');
    Route::post('/attribute/create','AttributeController@store')->name('store');
    
});
//product
Route::name('product.')->middleware(['auth'])->group(function () {
    Route::get('/product','ProductController@index')->name('list');
    Route::get('/product/list/{id}','ProductController@show')->name('show');
    Route::get('/product/create','ProductController@create')->name('create');
    Route::post('/product/create','ProductController@store')->name('store');
    
});
//middleware(['admin'])
