<?php

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    $typeSex = array_random(['MALE', 'FEMALE']);

    return [
        'name' => $faker->name,
        'date_of_birth' => $faker->date,
        'cep' => '87190000',
        'sex' => $typeSex,
        'address' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'neighborhood' => $faker->streetName,
        'complement' => $faker->secondaryAddress,
        'state' => $faker->stateAbbr,
        'city' => $faker->city,
    ];
});

