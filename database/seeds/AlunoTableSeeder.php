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
        factory(App\Models\Aluno::class, 10)->create()->each(function ($aluno) {
            factory(App\Models\AlunoCurso::class)->create([
                'id_aluno' => $aluno->id,
                'id_curso' => 1,
                'status' => 1,
                'dt_cancelamento' => null,
                'dt_termino' => null
            ]);
        });

        factory(App\Models\Aluno::class, 15)->create()->each(function ($aluno) {
            factory(App\Models\AlunoCurso::class)->create([
                'id_aluno' => $aluno->id,
                'id_curso' => 2,
                'status' => 2,
                'dt_cancelamento' => null,
                'dt_termino' => now()
            ]);
        });

        factory(App\Models\Aluno::class, 10)->create()->each(function ($aluno) {
            factory(App\Models\AlunoCurso::class)->create([
                'id_aluno' => $aluno->id,
                'id_curso' => 2,
                'status' => 0,
                'dt_cancelamento' => now(),
                'dt_termino' => null
            ]);
        });
    }
}
