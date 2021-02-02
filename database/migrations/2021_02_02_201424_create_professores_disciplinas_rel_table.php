<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessoresDisciplinasRelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professores_disciplinas_rel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_professores');
            $table->unsignedBigInteger('id_disciplinas');

            
            $table->foreign('id_professores')->references('id')->on('professores')->onDelete('CASCADE');
            $table->foreign('id_disciplinas')->references('id')->on('disciplinas')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professores_disciplinas_rel');
    }
}
