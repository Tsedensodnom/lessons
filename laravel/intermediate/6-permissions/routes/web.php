<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/secret', function () {
    if (\Gate::allows('permission', 'page.secret')) {
        return 'this is a secret page';
    }
    return 'error';
});

Route::get('/secret/top', function () {
    if (\Gate::allows('permission')) {
        return 'this is a top secret page';
    }
    return 'error';
})->name('page.secret.top');

Auth::routes();

Route::get('/home', 'HomeController@index');
