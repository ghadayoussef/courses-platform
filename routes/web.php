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
//use Illuminate\Routing\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',function () {
    return view('/layouts/dashboard');
});
// Route::get('/chart',function(){
//     return view('/charts/google_pie_chart');
// });
//Route::get('/teachers', 'TeacherController@index')->middleware('role:Admin')->name('teachers.index');
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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
