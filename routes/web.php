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
    // return view('welcome');
    return redirect('/principal');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/principal', 'principalController@index');

// Gestion de Archivos
Route::get('/archivos', 'principalController@archivos');
Route::post('/archivos', 'principalController@archivos');
Route::post('/subirarchivo', 'principalController@subirarchivo');
Route::get('/eliminararchivo', 'principalController@eliminararchivo');
// Route::get('/descargar/{id}', 'principalController@aux_descargar');
Route::get('/descargar/{id}/{nombre}', 'principalController@descargar');

// Gestion de evaluaciones