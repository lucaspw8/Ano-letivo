<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinasTurmasRelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas_turmas_rel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_disciplinas');
            $table->unsignedBigInteger('id_turmas');

            $table->foreign('id_disciplinas')->references('id')->on('disciplinas')->onDelete('CASCADE');
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
        Schema::dropIfExists('disciplinas_turmas_rel');
    }
}
