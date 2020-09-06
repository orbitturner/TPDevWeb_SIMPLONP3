<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'description' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
