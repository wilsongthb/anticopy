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
    // return redirect('/principal');
});

Auth::routes();
Route::get('/home', 'HomeController@index');

// Route::group(['middleware' => 'auth'], function(){
    Route::get('/principal', 'PrincipalController@index');

    // Gestion de Archivos
    Route::get('/archivos', 'ArchivosController@archivos');
    Route::post('/archivos', 'ArchivosController@archivos');
    Route::post('/subirarchivo', 'ArchivosController@subirarchivo');
    Route::get('/eliminararchivo', 'ArchivosController@eliminararchivo');
    Route::get('/descargar/{id}', 'ArchivosController@aux_descargar');
    Route::get('/descargar/{id}/{nombre}', 'ArchivosController@descargar');

    // Gestion de Archivos CRUDs AngularJS
    // Route::get('crud_angular', 'PrincipalController@angular');

    // Convertir Archivos
    Route::get('/convertir', 'PrincipalController@archivosconvertibles');
    Route::post('/convertir', 'PrincipalController@convertir');

    // Gestion de evaluaciones y comparaciones
    Route::get('/comparar', 'ComparacionController@comparar');
    Route::post('/comparar', 'ComparacionController@comparador');
    Route::resource('/comparacion', 'ComparacionController');
// });





// Pruebas
// Route::get('/console/{comando}', function($comando){
//     echo '<pre>'.$comando.'<br>';
//     echo consola($comando);
// });
// Route::get('/lahora', function(){
//     dispatch(new App\Jobs\lahora('La hora es', 40));
//     return time();
// });