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

Route::get('/bladetest', function() {
    return view('blade', [
        'title' => 'Title text',
        'countRandom' => rand(1, 100),
        'name' => 'Default text (passed)'
    ]); 
});

Route::get('/hello', function() {
    $count = rand(1, 100);
    
    return view('helloview', [
        'title' => 'Hello Page Title',
        'content' => 'Content...',
        'count' => $count,
    ]);
});

//http://localhost/mysite/hello/duriin string baij bolno
Route::get('/hello/{title}', function($title) {
    return view('helloview', [
        'title' => $title,
        'content' => 'hello content',
        'count' => 'Not random, just a string',
    ]);
});