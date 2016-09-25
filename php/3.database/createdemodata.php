<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
require_once('_init.php');

use Illuminate\Database\Capsule\Manager as Capsule;

$faker = Faker\Factory::create();

for ($i = 0; $i < 20; $i++) {
    Capsule::table('users')->insert([
        'email' => $faker->email,
        'name' => $faker->name,
    ]);
}