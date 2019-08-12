<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemorandumDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memorandum_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('memorandum_id');
            $table->foreign('memorandum_id')->references('id')->on('memorandums');
            $table->unsignedInteger('maestro_id')->nullable();
            $table->foreign('maestro_id')->references('id')->on('maestros');
            $table->enum('tipo', [ 'SINODAL', 'ASESOR', 'REVISOR' ]);
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
        Schema::dropIfExists('memorandum_detalles');
    }
}
