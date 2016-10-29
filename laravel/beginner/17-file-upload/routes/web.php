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

use Illuminate\Http\Request;

Route::get('/', function () {
    $files = Storage::disk('public_path')->files('photos');
    return view('list', ['photos' => collect($files)]);
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', function (Request $request) {
    $path = $request->file('photo')->store('photos', 'public_path');
    return redirect()->to('/');
});