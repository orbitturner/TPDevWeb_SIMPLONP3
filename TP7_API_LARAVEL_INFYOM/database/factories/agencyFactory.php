<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\agency;
use Faker\Generator as Faker;

$factory->define(agency::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'creationDate' => $faker->word,
        'lieu' => $faker->word,
        'numAgency' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
