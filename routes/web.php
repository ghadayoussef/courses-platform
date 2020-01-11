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
    return view('/layouts/app');
});
// Route::get('/home',function () {
//     return view('/layouts/dashboard');
// });
//Route::get('/teachers', 'TeacherController@index')->name('teachers.index');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/teachers', 'TeacherController@index')->name('teachers.index');
    Route::get('teachers/create','PostController@create')->name('posts.create');
//     // Route::post('posts','PostController@store');
//     // Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
//     // Route::get('/posts/{post}/edit','PostController@edit')->name('posts.edit');
//     // Route::delete('/post/{post}','PostController@destroy')->name('posts.destroy');
//     // Route::patch('/post/{post}','PostController@update')->name('posts.update');
 });


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
