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
Route::get('/home',function () {
    return view('/supporters/index');
});
Route::get('/supporters','SupporterController@index')->name('supporters.index');
Route::get('/supporters/{supporter}','SupporterController@show');
Route::delete('/supporters/{supporter}','SupporterController@destroy');

Auth::routes();


