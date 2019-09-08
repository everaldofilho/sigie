<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Aluno;
use Faker\Generator as Faker;

$factory->define(Aluno::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cpf' => $faker->numerify("###########"),
        'data_nascimento' => $faker->date(),
        'email' => $faker->unique()->safeEmail,
        'celular' => $faker->numerify("119####-####"),
        'cep' => $faker->numerify("########"),
        'endereco' => $faker->streetName,
        'numero' => $faker->numberBetween(1, 1000),
        'bairro' => $faker->streetAddress,
        'cidade' => $faker->city,
        'uf' => $faker->randomElement(['SP', 'RJ']),
        'status' => 1
    ];
});
