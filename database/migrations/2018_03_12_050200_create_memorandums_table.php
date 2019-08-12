<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemorandumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memorandums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero');
            $table->unsignedInteger('nombramiento_id');
            $table->foreign('nombramiento_id')->references('id')->on('nombramientos');
            $table->unsignedInteger('jefe_departamento_id');
            $table->foreign('jefe_departamento_id')->references('id')->on('jefes_departamentos');
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
        Schema::dropIfExists('memorandums');
    }
}
