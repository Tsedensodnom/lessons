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

Route::get('/', 'BlogController@home');
Route::get('/posts', 'BlogController@posts');
Route::get('/category/{id}', 'BlogController@showCategory');
Route::get('/post/{id}', 'BlogController@showPost');

Route::auth();

Route::get('/home', function() {
   return redirect()->to('/'); 
});

Route::group(['middleware' => [ 'auth' ], 'prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    
    Route::resource('post', 'Admin\PostController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('user', 'Admin\UserController');
});
