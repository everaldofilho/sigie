<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 45);
            $table->string('cpf', 15)->unique();
            $table->date('data_nascimento')->nullable();
            $table->string('email', 45);
            $table->string('celular', 15);
            $table->string('cep', 9);
            $table->string('uf', 2);
            $table->string('cidade', 45);
            $table->string('bairro', 45);
            $table->string('endereco', 60);
            $table->string('numero', 8);
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
        Schema::dropIfExists('aluno');
    }
}
