<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Instituicao;
use Faker\Generator as Faker;

$factory->define(Instituicao::class, function (Faker $faker) {
    return [
        'nome' => "Instituição " . $faker->company . ' '.$faker->companySuffix,
        'cnpj' => $faker->numerify("########0001##"),
        'status' => 1
    ];
});
