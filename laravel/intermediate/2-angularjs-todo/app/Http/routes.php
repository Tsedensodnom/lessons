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

Route::get('/', function () {
    return view('index');
});
Route::get('/features', function () {
    return view('features');
});
Route::get('/about-us', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});


//API Routes
Route::post('/api/login', 'Api\ApiController@login');
Route::get('/api/logout', 'Api\ApiController@logout');
Route::post('/api/signup', 'Api\ApiController@signup');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('/api/todos', 'Api\TodoController');
});

//Todo App
Route::get('/todo{any?}', function() {
    return view('todo');
})->where('any', '(.*)');