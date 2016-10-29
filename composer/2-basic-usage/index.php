<?php

require_once('vendor/autoload.php');

$faker = \Faker\Factory::create();

$data = [];
for ($i = 0; $i < 100; $i++) {
    $age = $faker->numberBetween(20, 40); //20 - 40 хооронд random(санамсаргүй) тоо үүсгэх
    $data[$i] = [
        'id' => $faker->randomNumber(6), //6н оронтой random тоо үүсгэх
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'age' => $age,
        'job' => $faker->jobTitle,
        'birthday' => date('Y-m-d', strtotime('-'.$age.' years')), //date('now') функийн утгаас $age жил хасах
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
    ];
}

echo json_encode($data);