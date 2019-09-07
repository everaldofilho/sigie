<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AlunoCurso;
use App\Models\Curso;
use Faker\Generator as Faker;

$factory->define(AlunoCurso::class, function (Faker $faker) {
    $status = $faker->randomElement([0, 1, 2]);
    $dt_inicio = $faker->date();
    $dt_cancelamento = $status === 2 ? $faker->dateTimeBetween($dt_inicio) : null;
    $dt_termino = $status === 0 ? $faker->dateTimeBetween($dt_inicio) : null;

    return [
        'id_curso' => Curso::all()->random(1)->first()->id,
        'status' => $status,
        'dt_inicio' => $dt_inicio,
        'dt_termino' => $dt_termino,
        'dt_cancelamento' => $dt_cancelamento,
    ];
});
