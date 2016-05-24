<?php

require_once('vendor/autoload.php');

$faker = \Faker\Factory::create();

$data = [];
for ($i = 0; $i < 100; $i++) {
    $age = $faker->numberBetween(20, 40);
    $data[$i] = [
        'id' => $faker->randomNumber(6),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'age' => $age,
        'job' => $faker->jobTitle,
        'birthday' => date('Y-m-d', strtotime('-'.$age.' years')),
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
    ];
}

echo json_encode($data);