<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinasHabilidadesRelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas_habilidades_rel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_disciplinas');
            $table->unsignedBigInteger('id_habilidades');

            $table->foreign('id_disciplinas')->references('id')->on('disciplinas')->onDelete('CASCADE');
            $table->foreign('id_habilidades')->references('id')->on('habilidades')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinas_habilidades_rel');
    }
}
