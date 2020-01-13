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
Route::group(['middleware'=>['auth','role:Admin|Teacher']],function(){
    Route::get('/supporters/create','SupporterController@create')->name('supporters.create');
    Route::delete('/supporters/{supporter}','SupporterController@destroy');
    Route::post('/supporters','SupporterController@store')->name('supporters.store');
    Route::get('/supporters/{supporter}/edit','SupporterController@edit');
    Route::post('/supporters/{supporter}','SupporterController@update');
    Route::get('/supporters/{supporter}/ban','SupporterController@ban');
 


});
Route::group(['middleware'=>['auth']],function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/supporters','SupporterController@index')->name('supporters.index')->middleware('forbid-banned-user');
Route::get('/supporters/comments','HomeController@showComments')->middleware('forbid-banned-user');
Route::get('/supporters/{comment}/approve','HomeController@approveComment');
Route::get('/supporters/{comment}/disapprove','HomeController@disApproveComment');
Route::get('/supporters/{supporter}','SupporterController@show')->name('supporters.show')->middleware('forbid-banned-user');
});


Route::group(['middleware'=>['auth','role:Admin']],function(){
    Route::get('/teachers', 'TeacherController@index')->name('teachers.index');
    Route::get('teachers/create','TeacherController@create')->name('teachers.create');
    Route::post('teachers','TeacherController@store');
    Route::get('/teachers/{teacher}', 'TeacherController@show')->name('teachers.show');
    Route::delete('/teacher/{teacher}','TeacherController@destroy')->name('teachers.destroy');
    Route::get('/teachers/{teacher}/edit','TeacherController@edit')->name('teachers.edit');
    Route::patch('/teacher/{teacher}','TeacherController@update')->name('teachers.update');
});


Route::get('/chart','LaravelGoogleGraph@index');
Route::get('/ajaxdata','AjaxTeacherController@index');
Route::get('/ajaxdata/getdata','AjaxTeacherController@getdata')->name('ajaxdata.getdata');//json format
Route::get('/ajaxdata/removedata/{teacher}','AjaxTeacherController@removedata')->name('ajaxdata.removedata');
Auth::routes();





 Auth::routes();

 Route::group(['middleware'=>['auth','role:Admin|Teacher']], function(){
    Route::get('/courses/create' ,'CourseController@create')->name('courses.create');
    Route::post('/courses', 'CourseController@store')->name('courses.store');
    Route::delete('/courses/{course}', 'CourseController@destroy')->name('courses.destroy');
    Route::get('/courses/{course}/edit','CourseController@edit')->name('courses.edit');
    Route::patch('/courses/{course}','CourseController@update')->name('courses.update');
 });
 Route::group(['middleware'=>'auth'], function(){
    Route::get('/courses','CourseController@index')->name('courses.index');
    Route::get('/courses/{course}','CourseController@show')-> name('courses.show');

 });
