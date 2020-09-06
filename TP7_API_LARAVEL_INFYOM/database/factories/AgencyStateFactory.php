<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AgencyState;
use Faker\Generator as Faker;

$factory->define(AgencyState::class, function (Faker $faker) {

    return [
        'state_id' => $faker->randomDigitNotNull
    ];
});
