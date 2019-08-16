<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNombramientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nombramientos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('numero_memo_id');
            $table->foreign('numero_memo_id')->references('id')->on('numero_oficios');
            $table->text('numero_oficio')->nullable();
            $table->unsignedInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->unsignedInteger('opcion_id');
            $table->foreign('opcion_id')->references('id')->on('opciones_titulacion');
            $table->unsignedInteger('modulo_id')->nullable();
            $table->foreign('modulo_id')->references('id')->on('modulos_titulacion');
            $table->text('proyecto')->nullable();
            $table->date('fecha');
            $table->unsignedTinyInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->enum('estatus', [ 'P', 'E', 'C' ])->comment('P = pendiente, E = enviado, C = concluido');
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
        Schema::dropIfExists('nombramientos');
    }
}
