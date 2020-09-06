<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Compteepsx;
use Faker\Generator as Faker;

$factory->define(Compteepsx::class, function (Faker $faker) {

    return [
        'owner_id' => $faker->randomDigitNotNull,
        'accountNumber' => $faker->word,
        'cleRIB' => $faker->randomDigitNotNull,
        'solde' => $faker->word,
        'dateCreation' => $faker->word,
        'activeDate' => $faker->word,
        'nextRemunDate' => $faker->word,
        'closeDate' => $faker->word,
        'idUser' => $faker->randomDigitNotNull,
        'hostAgency' => $faker->randomDigitNotNull,
        'idOpeningFees' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
