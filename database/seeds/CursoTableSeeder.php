<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso = App\Models\Curso::class;
        factory($curso)->create(['nome' => 'Informática','id_instituicao' => 1]);
        factory($curso)->create(['nome' => 'Inglês', 'id_instituicao' => 1]);
        factory($curso)->create(['nome' => 'Espanhol','id_instituicao' => 1]);
        factory($curso)->create(['nome' => 'Web design','id_instituicao' => 1]);
        factory($curso)->create(['nome' => 'Administração','id_instituicao' => 1]);
        factory($curso)->create(['nome' => 'Análise de Sistemas','id_instituicao' => 2]);
        factory($curso)->create(['nome' => 'Ciência da Computação', 'id_instituicao' => 2]);
        factory($curso)->create(['nome' => 'Desenho Industrial','id_instituicao' => 2]);
        factory($curso)->create(['nome' => 'Ciências Econômicas','id_instituicao' => 2]);
        factory($curso)->create(['nome' => 'Matemática','id_instituicao' => 2]);
    }
}
