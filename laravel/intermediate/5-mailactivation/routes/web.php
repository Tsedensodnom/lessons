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
use Illuminate\Notifications\Messages\MailMessage;

use App\Notifications\ActivationCodeRequested;
use App\Notifications\UserActivated;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/activation', function (Request $request) {
    return view('activate'); 
});

Route::get('user/sendactivation', function (Request $request) {
    \Notification::send($request->user(), new ActivationCodeRequested);
    
    return redirect()->to('user/activation');
});

Route::get('user/activate', function (Request $request) {
    $code = $request->query('code');
    
    $user = \App\User::where('activation_code', $code)->first();
    if ($user != null) {
        $user->is_activated = 1;
        $user->activation_code = null;
        $user->activated_at = \Carbon\Carbon::now();
        $user->save();
        
        \Notification::send($request->user(), new UserActivated);
        
        return redirect()->to('/');
    }
    throw new \Exception('Activation is invalid', 500);
});

Auth::routes();
Route::get('/home', 'HomeController@index');
