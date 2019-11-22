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

//viaje
Route::get('crear','TripController@create')->name('trip.create')->middleware('auth');
Route::post('/trip/store','TripController@store')->name('trip.store')->middleware('auth');
Route::get('solicitar-viaje','TripController@solicitar')->name('trip.solicitar')->middleware('auth');
Route::get('viajes','TripController@viajes')->name('trip.viajes')->middleware('auth');
Route::get('viaje-detalle/{trip}','TripController@show')->name('trip.show')->middleware('auth');
//detalle del viaje para cada usuario suscrito
Route::get('viaje-info/{trip}','TripController@info')->name('trip.info')->middleware('auth');
Route::get('misviajes','TripController@misViajes')->name('trip.mis_viajes')->middleware('auth');
//Route::get('trip/{id}','TripController@show')->name('')

//mensajes
Route::post('store','MessageController@store')->name('mensaje.store');


//peticiones
Route::post('/peticion/store','RequestController@store')->name('peticion.store');
Route::get('peticion/{id}/confirmar','RequestController@confirm')->name('peticion.confirm');

//verificacion de token
Route::get('verify/{token}','UserController@verify')->name('verify');


//autos relacionados a un usuario
Route::get('cars/{id}','CarController@index')->name('cars.index');



