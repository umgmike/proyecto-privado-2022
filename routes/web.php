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
    Route::put('Usuarios/pass/{id}', 'UsuarioController@updatePass')->name('page-update.users-pass')->middleware('auth');
	Route::delete('Usuarios/{id}', 'UsuarioController@desactivarUsuarios')->name('page.desactivar.Usuarios')->middleware('auth');
	/*********					apartado de usuarios    					*********/


    /*********					apartado de Roles    					*********/
	Route::get('Roles', 'RolController@getRoles')->name('page.roles')->middleware('auth');
    Route::get('Roles/Crear', 'RolController@crearRoles')->name('page.create.roles')->middleware('auth');
	Route::post('Roles/Guardar', 'RolController@grabarRegistro')->name('page.save.roles')->middleware('auth');
	Route::get('Roles/{id}/Editar', 'RolController@editarRegistro')->name('page.edit.roles')->middleware('auth');
	Route::put('Roles/{id}', 'RolController@updateRegistro')->name('page.update.roles')->middleware('auth');
    Route::delete('Roles/{id}', 'RolController@desactivarRol')->name('page.desactivar.Rol')->middleware('auth');
	/*********					apartado de Roles    					*********/


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
	Route::get('Boleto/{id}/Editar', 'BoletoController@editarRegistro')->name('page.edit.boleto')->middleware('auth');
	Route::put('Boleto/{id}', 'BoletoController@updateRegistro')->name('page.update.boleto')->middleware('auth');
	Route::delete('Boleto/{id}', 'BoletoController@desactivarBoleto')->name('page.desactivar.boleto')->middleware('auth');
	/*********					apartado de Boleto


    /*********					apartado de Boleto    					*********/
	Route::get('Vuelos', 'VuelosController@getVuelos')->name('page.vuelos')->middleware('auth');
    Route::get('Vuelos/Crear', 'VuelosController@crearVuelos')->name('page.create.vuelos')->middleware('auth');
	Route::post('Vuelos/Guardar', 'VuelosController@grabarRegistro')->name('page.save.vuelos')->middleware('auth');
	Route::get('Vuelos/{id}/Editar', 'VuelosController@editarRegistro')->name('page.edit.vuelos')->middleware('auth');
	Route::put('Vuelos/{id}', 'VuelosController@updateRegistro')->name('page.update.vuelos')->middleware('auth');
	Route::delete('Vuelos/{id}', 'VuelosController@desactivarVuelos')->name('page.desactivar.vuelos')->middleware('auth');
	/*********					apartado de Vuelos    					*********/


    /*********					apartado de Aviones    					*********/
	Route::get('Aviones', 'AvionesController@getAviones')->name('page.Aviones')->middleware('auth');
    Route::get('Aviones/Crear', 'AvionesController@crearAviones')->name('page.create.Aviones')->middleware('auth');
	Route::post('Aviones/Guardar', 'AvionesController@grabarRegistro')->name('page.save.Aviones')->middleware('auth');
	Route::get('Aviones/{id}/Editar', 'AvionesController@editarRegistro')->name('page.edit.Aviones')->middleware('auth');
	Route::put('Aviones/{id}', 'AvionesController@updateRegistro')->name('page.update.Aviones')->middleware('auth');
    Route::get('Aviones/{id}/Editar2', 'AvionesController@editarRegistroAvion')->name('page.edit.Aviones.temp')->middleware('auth');
	Route::put('Aviones/{id}', 'AvionesController@updateRegistroAvion')->name('page.update.Aviones.temp')->middleware('auth');
    Route::delete('Aviones/{id}', 'AvionesController@activarAviones')->name('page.activar.Aviones')->middleware('auth');
    Route::delete('Aviones/{id}/EE', 'AvionesController@activarAvionesEnEspera')->name('page.activar.Aviones.espera')->middleware('auth');
    Route::post('Aviones/Guardar/Bolotes', 'AvionesController@grabarRegistroAviones')->name('page.save.Aviones.save')->middleware('auth');
	/*********					apartado de Aviones    					*********/

    /*********					apartado de Clases    					*********/
	Route::get('Clases', 'ClaseController@getClases')->name('page.clases')->middleware('auth');
    Route::get('Clases/Crear', 'ClaseController@crearClases')->name('page.create.clases')->middleware('auth');
	Route::post('Clases/Guardar', 'ClaseController@grabarRegistro')->name('page.save.clases')->middleware('auth');
	Route::get('Clases/{id}/Editar', 'ClaseController@editarRegistro')->name('page.edit.clases')->middleware('auth');
	Route::put('Clases/{id}', 'ClaseController@updateRegistro')->name('page.update.clases')->middleware('auth');
	/*********					apartado de Roles    					*********/


    /*********					apartado de empresas    					*********/
	Route::get('Empresas', 'EmpresaController@getEmpresas')->name('page.empresas')->middleware('auth');
    Route::get('Empresas/Crear', 'EmpresaController@crearEmpresas')->name('page.create.empresas')->middleware('auth');
	Route::post('Empresas/Guardar', 'EmpresaController@grabarRegistro')->name('page.save.empresas')->middleware('auth');
	Route::get('Empresas/{id}/Editar', 'EmpresaController@editarRegistro')->name('page.edit.empresas')->middleware('auth');
	Route::put('Empresas/{id}', 'EmpresaController@updateRegistro')->name('page.update.empresas')->middleware('auth');
	/*********					apartado de Roles    					*********/
});
