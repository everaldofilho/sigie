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
        factory(App\Models\Curso::class, 4)->create([
            'id_instituicao' => 1
        ]);
    }
}
