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

Route::get('/', function () { return view('welcome'); })->name('welcome');

Auth::routes();

Route::group(['namespace' => 'AEROPUERTO_AURORA', 'middleware' => 'auth'], function () {
    Route::get('logout', 'LoginController@logout')->name('logout');
	Route::get('home', 'HomeController@HomeAdmin')->name('home')->middleware('auth');

    /*********					apartado de usuarios    					*********/
	Route::get('Usuarios', 'UsuarioController@getUsuarios')->name('page.usuarios')->middleware('auth');
    Route::get('Usuarios/Crear', 'UsuarioController@crearUsuarios')->name('page.create.usuarios')->middleware('auth');
	Route::post('Usuarios/Guardar', 'UsuarioController@grabarRegistro')->name('page.save.Usuarios')->middleware('auth');
	Route::get('Usuarios/{id}/Editar', 'UsuarioController@editarRegistro')->name('page.edit.Usuarios')->middleware('auth');
	Route::put('Usuarios/{id}', 'UsuarioController@updateRegistro')->name('page.update.Usuarios')->middleware('auth');
	Route::delete('Usuarios/{id}', 'UsuarioController@desactivarUsuarios')->name('page.desactivar.Usuarios')->middleware('auth');
	/*********					apartado de usuarios    					*********/

    /*********					apartado de pasajeros    					*********/
	Route::get('Pasajeros', 'PasajerosController@getPasajeros')->name('page.Pasajeros')->middleware('auth');
    Route::get('Pasajeros/Crear', 'PasajerosController@crearPasajeros')->name('page.create.Pasajeros')->middleware('auth');
	Route::post('Pasajeros/Guardar', 'PasajerosController@grabarRegistro')->name('page.save.Pasajeros')->middleware('auth');
	Route::get('Pasajeros/{id}/Editar', 'PasajerosController@editarRegistro')->name('page.edit.Pasajeros')->middleware('auth');
	Route::put('Pasajeros/{id}', 'PasajerosController@updateRegistro')->name('page.update.Pasajeros')->middleware('auth');
	Route::delete('Pasajeros/{id}', 'PasajerosController@desactivarPasajeros')->name('page.desactivar.Pasajeros')->middleware('auth');
	/*********					apartado de pasajeros    					*********/


    /*********					apartado de Boleto    					*********/
	Route::get('Boleto', 'BoletoController@getBoleto')->name('page.boleto')->middleware('auth');
    Route::get('Boleto/Crear', 'BoletoController@crearBoleto')->name('page.create.boleto')->middleware('auth');
	Route::post('Boleto/Guardar', 'BoletoController@grabarRegistro')->name('page.save.boleto')->middleware('auth');
	Route::get('Boleto/{id}/Editar', 'BoletoController@editarRegistro')->name('page.edit.boleto')->middleware('auth');
	Route::put('Boleto/{id}', 'BoletoController@updateRegistro')->name('page.update.boleto')->middleware('auth');
	Route::delete('Boleto/{id}', 'BoletoController@desactivarBoleto')->name('page.desactivar.boleto')->middleware('auth');
	/*********					apartado de Boleto    					*********/
});
