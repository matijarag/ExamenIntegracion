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

Route::get('/', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/admin', 'UserController');
Route::resource('/usu_norm', 'UsuarioNormalController');
Route::resource('/HorasDisponibles', 'HorariosDisponiblesController');
Route::resource('/modulos', 'ModuloController');
Route::resource('/fecha','fechaController');
Route::resource('/fecha2','fecha2');
Route::post('/fecha2/confirmacion','fecha2@hola');
Route::resource('/cita','citaController');
Route::resource('/eliminarHoras','EliminarHorasController');
Route::resource('/SeleccionarModulo', 'SeleccionarModuloController');
Route::resource('/EliminarModulo', 'EliminarModuloController');
Route::resource('/habilitar', 'HabilitarController');
