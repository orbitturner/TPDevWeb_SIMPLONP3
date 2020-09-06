<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Openingfee;
use Faker\Generator as Faker;

$factory->define(Openingfee::class, function (Faker $faker) {

    return [
        'libelle' => $faker->word,
        'montant' => $faker->word
    ];
});
