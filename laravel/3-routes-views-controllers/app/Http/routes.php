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

Route::get('/', ['uses' => 'BlogController@index', 'as' => 'home']);
Route::get('/posts', ['uses' => 'BlogController@postList', 'as' => 'posts']);
Route::get('/post/{id}', ['uses' => 'BlogController@postDetail', 'as' => 'post'])
    ->where('page', '[0-9]+');
Route::get('/categories', ['uses' => 'BlogController@categoryList', 'as' => 'categories']);
Route::get('/category/{id}', ['uses' => 'BlogController@categoryDetail', 'as' => 'category']);
