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
    // $model = new \App\Student;
    // $model->first_name = 'Shine';
    // $model->last_name = 'Oyutan';
    // $model->reg_num = 'UB98080812';
    // $model->save();
    
    // $model = \App\Student::find(2); //2 id-tai oyutan
    // $model = \App\Student::where('id', 2)->firstOrFail();
    
    // $model = \App\Student::find(3);
    // $model->delete();
    
    // $model = \App\Student::find(1);
    // $model->first_name = 'Bold';
    // $model->last_name = 'Camerton';
    // $model->save();
    
    // $model = \App\Student::find(1);
    // $model->delete();
    
    // $model = new \App\Student;
    // $model->first_name = 'Bat';
    // $model->last_name = 'Huu';
    // $model->save();
    
    // $model = \App\Student::find(4);
    // $model->reg_num = 'UB98050405';
    // $model->birthday = '1998-05-04';
    // $model->save();
    
    $students = \App\Student::orderby('first_name', 'asc')->get();
    
    return view('index', [
        'students' => $students,
    ]);
});
