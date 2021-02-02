<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTurmasRelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos_turmas_rel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alunos');
            $table->unsignedBigInteger('id_turmas');

            $table->foreign('id_alunos')->references('id')->on('alunos')->onDelete('CASCADE');
            $table->foreign('id_turmas')->references('id')->on('turmas')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos_turmas_rel');
    }
}
