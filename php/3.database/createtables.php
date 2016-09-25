<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
require_once('_init.php');

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function($table)
{
    $table->increments('id');
    $table->string('email')->unique();
    $table->string('name');
    $table->timestamps();
});