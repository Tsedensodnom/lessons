<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MovieController@index');
Route::post('/movie/store', 'MovieController@store');

Route::get('/theatre', 'TheatreController@index');
Route::post('/theatre/store', 'TheatreController@store');