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
Route::group(['middleware'=>['auth']],function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/supporters','SupporterController@index')->name('supporters.index')->middleware('forbid-banned-user');
Route::get('/supporters/{supporter}','SupporterController@show')->name('supporters.show')->middleware('forbid-banned-user');
});
Route::group(['middleware'=>['auth','role:Admin|Teacher']],function(){
    Route::get('/supporters/create','SupporterController@create')->name('supporters.create');
    Route::delete('/supporters/{supporter}','SupporterController@destroy');
    Route::post('/supporters','SupporterController@store')->name('supporters.store');
    Route::get('/supporters/{supporter}/edit','SupporterController@edit');
    Route::post('/supporters/{supporter}','SupporterController@update');
    Route::get('/supporters/{supporter}/ban','SupporterController@ban');

});

Auth::routes();


