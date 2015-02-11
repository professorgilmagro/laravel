<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('usuarios', 'UserController');

Route::get('usuarios/{id}/delete', [
  'uses' => 'UserController@destroy',
  'as' => 'usuarios.destroy'
]);

Route::get('usuarios/search', [
  'uses' => 'UserController@search',
  'as' => 'usuarios.search'
]);

Route::get('login', [
  'uses' => 'UserController@showLogin',
  'as' => 'usuario.login'
]);

Route::post('signin', [
  'uses' => 'UserController@signin',
  'as' => 'usuario.signin'
]);

Route::get('logout', [
  'uses' => 'UserController@logout',
  'as' => 'usuario.logout'
]);