<?php

use Illuminate\Database\Seeder;

class AlunoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Aluno::class, 30)->create()->each(function ($aluno) {
            factory(App\Models\AlunoCurso::class)->create(['id_aluno' => $aluno->id]);
        });
    }
}
