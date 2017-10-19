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

// Головна сторінка
Route::get('/', ['as'=>'home','uses'=>'HomeController@index']);

// Авторизація

Route::get('logout',['as'=>'logout','uses'=>'HomeController@logout']);

Route::get('login',['as'=>'login','uses'=>'HomeController@login']);

Route::post('login', ['as'=>'login', 'uses'=>'HomeController@reg', 'before'=>'csrf']);

// Добавлення статті

Route::get('add_post',['as'=>'add_post','uses'=>'HomeController@add_post']);

Route::post('add_post',['as'=>'add_post','uses'=>'HomeController@add_post_db']);

// Добавлення коментарів

Route::post('add_coments_2',['as'=>'add_coments_2','uses'=>'HomeController@add_coments_2']);

Route::post('add_coments',['as'=>'add_coments','uses'=>'HomeController@add_coments_db']);

