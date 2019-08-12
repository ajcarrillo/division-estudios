<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJefesDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jefes_departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('responsable_id');
            $table->foreign('responsable_id')->references('id')->on('users');
            $table->text('jefatura');
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
        Schema::dropIfExists('jefes_departamentos');
    }
}
