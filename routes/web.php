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

/*Route::get('/', function () {
    return view('theme.back.layout.admin');
});*/
/*Route::get('/app',function(){
    return view('theme.back.layout.admin');
});*/
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','HomeController@index');

Route::prefix('trip')->group(function (){
     Route::post('crear','TripController@create')->name('trip.create')->middleware('auth');
});
