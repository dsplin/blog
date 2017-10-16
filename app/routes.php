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

/*Route::get('/', function()
{
	return View::make('hello');
});*/

Route::get('/', ['as'=>'home','uses'=>'HomeController@index']);

Route::get('logout',['as'=>'logout','uses'=>'HomeController@logout']);

Route::get('login',['as'=>'login','uses'=>'HomeController@login']);

Route::post('login', ['as'=>'login', 'uses'=>'HomeController@reg', 'before'=>'csrf']);