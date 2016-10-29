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
    // \DB::table('movies')
    //     ->insert([
    //         'title' => 'Terminator: Salvation',
    //         'released' => '2014',
    //         'description' => 'This is movie description text',
    //     ]);
    
    // \DB::table('movies')
    //     ->where('id', 11)
    //     ->orWhere('id', 12)
    //     ->delete();
        
    // \DB::table('movies')
    //     ->where('id', 1)
    //     ->update([
    //         'title' => 'Wonder woman',
    //         'released' => '2017',
    //     ]);
    
    $movies = \DB::table('movies')->get();
    
    return view('index', [
        'movies' => $movies,
    ]);
});
