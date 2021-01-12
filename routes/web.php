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

/*
Route::get('/', function () {
	return view('welcome');
});
*/

Route::get('/', function () {
	return view('home');
});

Route::namespace('Web')->group( function () {

	Route::get('/clientes', 'ClienteController@list');

	Route::get('/cliente/cadastrar', function () {
		return view('cliente/cadastrar');
	});
	Route::post('/cliente/cadastrar', 'ClienteController@add');

	Route::get('/cliente/editar/{id}', 'ClienteController@select');
	Route::post('/cliente/editar/{id}', 'ClienteController@update');

	Route::get('/cliente/excluir/{id}', 'ClienteController@delete');
});
