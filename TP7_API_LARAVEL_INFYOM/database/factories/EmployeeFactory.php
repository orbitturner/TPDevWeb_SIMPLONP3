<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {

    return [
        'numEmployee' => $faker->word,
        'telephone' => $faker->word,
        'email' => $faker->word,
        'cni' => $faker->word,
        'adresse' => $faker->word,
        'sexe' => $faker->word,
        'service' => $faker->word,
        'dateNaiss' => $faker->word,
        'idUser' => $faker->randomDigitNotNull,
        'agencyhost' => $faker->randomDigitNotNull
    ];
});
