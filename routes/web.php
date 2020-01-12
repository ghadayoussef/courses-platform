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



 Auth::routes();

 Route::group(['middleware'=>'auth'], function(){
    Route::get('/courses','CourseController@index')->name('courses.index');
    Route::get('/courses/create' ,'CourseController@create')->name('courses.create');
    Route::post('/courses', 'CourseController@store')->name('courses.store');
    Route::get('/courses/{course}','CourseController@show')-> name('courses.show');
    Route::delete('/courses/{course}', 'CourseController@destroy')->name('courses.destroy');
    Route::get('/courses/{course}/edit','CourseController@edit')->name('courses.edit');
    Route::patch('/courses/{course}','CourseController@update')->name('courses.update');
 });



