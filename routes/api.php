<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Auth::routes(['verify' => true]);


Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
Route::get('logout', 'Api\AuthController@logout');
Route::get('user', 'Api\AuthController@getAuthStudent')->middleware('auth:api','verified');

Route::put('update', 'Api\StudentController@update') -> middleware('auth:api','verified'); 
Route::get('courses', 'Api\StudentController@showCourses') -> middleware('auth:api','verified'); 
Route::post('courses/{course}/enroll', 'Api\StudentController@enroll') -> middleware('auth:api','verified'); 
Route::get('courses/enrolled', 'Api\StudentController@enrolledCourses') -> middleware('auth:api','verified'); 
Route::post('courses/{id}/comment', 'Api\StudentController@comment') -> middleware('auth:api','verified'); 



Route::get('/email/resend', 'Api\VerificationController@resend')->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', 'Api\VerificationController@verify')->name('verification.verify');
