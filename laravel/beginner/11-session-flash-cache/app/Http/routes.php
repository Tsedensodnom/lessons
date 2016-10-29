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

use Illuminate\Http\Request;

Route::get('/', function () {
    $count = session('view_count', 1);
    $count++;
    session(['view_count' => $count]);
    
    $data = session('data');
    
    return view('session', [
        'count' => $count,
        'data' => $data,
    ]);
});

Route::get('/setSession', function() {
   session(['data' => rand(1, 100)]);
   
   return redirect()->to('/');
});

Route::get('/flash', function() {
   return view('flash'); 
});

Route::get('/cache', function() {
   echo '1. Get data<br>';
   if (\Cache::has('data')) {
       echo 'Get data from cache<br>';
       echo \Cache::get('data').'<br>';
   } else {
       echo '2. Process data<br>';
       $data = 0;
       for ($i = 0; $i < 1000; $i++) {
           $data += 1;
           // 10 second orchim hugatsaand hiigdeh tootsoolol
       }
       sleep(10);
       \Cache::put('data', $data, 1);
   }
   echo '3. Finish<br>';
});

Route::post('/sendmessage', function (Request $request) {
    $request->session()->flash('status', 'Захидал амжилттай илгээгдлээ');
    return redirect()->to('/flash');
});