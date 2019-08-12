<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasEquivalentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_equivalentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('carrera_materia_destino_id');
            $table->foreign('carrera_materia_destino_id')->references('id')->on('carrera_materia');
            $table->unsignedBigInteger('carrera_materia_equivalente_id');
            $table->foreign('carrera_materia_equivalente_id')->references('id')->on('carrera_materia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias_equivalentes');
    }
}
