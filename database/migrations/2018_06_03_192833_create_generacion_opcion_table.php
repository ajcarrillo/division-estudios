<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneracionOpcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generacion_opcion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('generacion_id');
            $table->foreign('generacion_id')->references('id')->on('generaciones');
            $table->unsignedInteger('opcion_id');
            $table->foreign('opcion_id')->references('id')->on('opciones_titulacion');
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
        Schema::dropIfExists('generacion_opcion');
    }
}
