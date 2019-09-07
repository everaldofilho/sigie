<?php

use App\Models\Curso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            InstituicaoTableSeeder::class,
            CursoTableSeeder::class,
            AlunoTableSeeder::class
        ]);
    }
}
