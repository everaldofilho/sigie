<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'id_instituicao' => 1,
        'nome' => $faker->randomElement([
            'Curso A',
            'Curso B',
            'Curso C',
            'Curso D',
            'Curso 3',
        ]),
        'duracao' => $faker->randomElement([
            '1 Ano',
            '6 Meses',
            '2 Anos',
            '3 Meses',
        ]),
        'status' => 1
    ];
});
