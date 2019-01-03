<?php

use App\Http\Controllers\ControllerUsuario;
use App\Http\Controllers\ControllerPageIndex;
use App\Http\Controllers\ControllerValoraciones;
use App\Http\Controllers\ControllerPageAllWeb;
use App\Http\Controllers\ControllerPageOneWeb;
use App\Http\Controllers\ControllerContact;
use App\Http\Controllers\ControllerModificarWeb;

/* Ruta Inicio */
Route::get('/', ['as' => 'inicio', 'uses' => 'ControllerPageIndex@route']);

//Ruta para desconectar usuarios
Route::post('/desconectar', ['as' => 'desconectar', 'uses' => 'ControllerUsuario@desconectar']);

/* Mandamos a la ruta '/' que es el inicio con la informacion de las webs */
Route::get('/', 'ControllerPageIndex@Webs');
/* -Mandamos a la ruta '/' que es el inicio con la informacion de las webs*/

//Ruta a resumen de todas la webs
Route::get('/allweb', ['as' => 'allweb', 'uses' => 'ControllerPageAllWeb@route']);
//-Ruta a resumen de todas la webs

//Ruta a modificar webs
Route::get('/modificarWeb', ['as' => 'modificarWeb', 'uses' => 'ControllerModificarWeb@route']);
//Ruta a modificar webs

//Ruta a oneweb
Route::get('/{nombre}', 'ControllerPageOneWeb@Web');
//-Ruta a oneweb

//Eliminar comentario
Route::post('/ajax/deleteComent', function(){
	return response()->json(ControllerPageOneWeb::deleteComent(Input::All()));
});
//-Eliminar comentario

//Añadir comentario
Route::post('/ajax/addComent', function(){
	return response()->json(ControllerPageOneWeb::addComent(Input::All()));
});
//-Añadir comentario

//Login de la web
Route::post('/ajax/login', function ()
{
	return response()->json(ControllerUsuario::Login(Input::All()));
});
//-login de la web

//Votaciones usuarios
Route::match(['get','post'],'/ajax/votar', function ()
{
	return response()->json(ControllerValoraciones::Votar(Input::All()));
});
//-Votaciones usuarios

//Registro de usuarios
Route::post('/ajax/registro', function ()
{
	return response()->json(ControllerUsuario::Registro(Input::All()));
});
//-Registro de usuarios

//Ruta siguiente web
Route::post('/ajax/NextWeb', function(){
	return response()->json(ControllerModificarWeb::NextWeb(Input::All()));
});
//-Ruta siguiente web

//Ruta anterior web
Route::match(['get', 'post'],'/ajax/PreviaWeb', function(){
	return response()->json(ControllerModificarWeb::PreviaWeb(Input::All()));
});
//-Ruta anterior web


//Contact footer
Route::post('/ajax/contact', function ()
{
	return response()->json(ControllerContact::contact(Input::All()));
});
//-Contact footer

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
