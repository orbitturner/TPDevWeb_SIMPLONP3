<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Clientphysique;
use Faker\Generator as Faker;

$factory->define(Clientphysique::class, function (Faker $faker) {

    return [
        'numId' => $faker->word,
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'email' => $faker->word,
        'cni' => $faker->word,
        'telephone' => $faker->word,
        'adresse' => $faker->word,
        'sexe' => $faker->word,
        'dateNaiss' => $faker->word,
        'dateCreation' => $faker->word,
        'features' => $faker->word,
        'isSalarie' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
