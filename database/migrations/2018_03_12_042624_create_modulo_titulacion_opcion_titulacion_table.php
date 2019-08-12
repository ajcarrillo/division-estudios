<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuloTitulacionOpcionTitulacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_titulacion_opcion_titulacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('modulo_id');
            $table->foreign('modulo_id')->references('id')->on('modulos_titulacion');
            $table->unsignedInteger('opcion_titulacion_id');
            $table->foreign('opcion_titulacion_id')->references('id')->on('opciones_titulacion');
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
        Schema::dropIfExists('modulo_titulacion_opcion_titulacion');
    }
}
