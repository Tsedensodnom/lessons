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
    $post = \App\Post::first();
    $post->translate('en')->title = 'Hello new english';
    $post->save();
    
    App::setLocale('mn');
    echo $post->title;
});
