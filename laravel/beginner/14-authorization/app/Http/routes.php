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
    return view('welcome');
});

Route::auth();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/account/profile', function () {
        $user = \Auth::user();
        return view('account.profile', [
            'user' => $user,
        ]);
    });
    
    Route::get('/account/posts', function () {
        return view('account.posts');
    });
    
    Route::get('/users', function () {
        $users = \App\User::orderby('created_at', 'desc')->get();
        
        return view('users', [
            'users' => $users,
        ]);
    });
    
    Route::get('/users/edit/{id}', function ($id) {
        if (\Gate::allows('admin-access')) {
            return 'Access granted';
        }
        return 'Access denied - User zasah erhgui';
    });
});