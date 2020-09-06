<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProfileState;
use Faker\Generator as Faker;

$factory->define(ProfileState::class, function (Faker $faker) {

    return [
        'state_id' => $faker->randomDigitNotNull
    ];
});
