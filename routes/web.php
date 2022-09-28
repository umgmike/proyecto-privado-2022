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

    /*********					apartado de alumnos    					*********/
	Route::get('Usuarios', 'UsuarioController@getUsuarios')->name('page.usuarios')->middleware('auth');
    Route::get('Usuarios/Crear', 'UsuarioController@crearUsuarios')->name('page.create.usuarios')->middleware('auth');
	Route::post('Usuarios/Guardar', 'UsuarioController@grabarRegistro')->name('page.save.Usuarios')->middleware('auth');
	Route::get('Usuarios/{id}/Editar', 'UsuarioController@editarRegistro')->name('page.edit.Usuarios')->middleware('auth');
	Route::put('Usuarios/{id}', 'UsuarioController@updateRegistro')->name('page.update.Usuarios')->middleware('auth');
	Route::delete('Usuarios/{id}', 'UsuarioController@desactivarUsuarios')->name('page.desactivar.Usuarios')->middleware('auth');
	/*********					apartado de alumnos    					*********/
});
