<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_curso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_aluno')->index();
            $table->integer('id_curso')->index();
            $table->date('dt_inicio')->index();
            $table->date('dt_termino')->nullable()->index();
            $table->date('dt_cancelamento')->nullable()->index();
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_curso');
    }
}
