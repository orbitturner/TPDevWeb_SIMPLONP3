<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CompteepsxEtat;
use Faker\Generator as Faker;

$factory->define(CompteepsxEtat::class, function (Faker $faker) {

    return [
        'state_id' => $faker->randomDigitNotNull
    ];
});
