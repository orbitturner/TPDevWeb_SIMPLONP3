<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserState;
use Faker\Generator as Faker;

$factory->define(UserState::class, function (Faker $faker) {

    return [
        'state_id' => $faker->randomDigitNotNull
    ];
});
