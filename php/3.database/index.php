<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
require_once('_init.php');

use Illuminate\Database\Capsule\Manager as Capsule;

$users = Capsule::table('users')->get();

foreach ($users as $value) {
    echo $value->name.' - '.$value->email.'<br>';
}


//Examples:
// Capsule::table('users')->where('votes', '>', 100)->get();
// Capsule::table('users')->where('votes', '<', 200)->get();
// Capsule::table('users')->insert([
//     'email' => 'email@example.com',
//     'name' => 'User full name',
// ]);

//More at https://laravel.com/docs/5.3/queries