<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinodalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinodales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nombramiento_id');
            $table->foreign('nombramiento_id')->references('id')->on('nombramientos');
            $table->unsignedInteger('maestro_id');
            $table->foreign('maestro_id')->references('id')->on('maestros');
            $table->enum('tipo', [ 'PRESIDENTE', 'SECRETARIO', 'VOCAL', 'VOCAL SUPLENTE' ]);
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
        Schema::dropIfExists('sinodales');
    }
}
