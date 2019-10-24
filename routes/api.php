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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('students','AlumnosController@index')->name('student.index');
Route::get('students/{legajo}','AlumnosController@show')->name('student.show');
Route::post('students/new','AlumnosController@store')->name('students.store');
Route::put('students/{legajo}','AlumnosController@update')->name('students.update');
Route::delete('students/{legajo}','AlumnosController@destroy')->name('students.destroy');

