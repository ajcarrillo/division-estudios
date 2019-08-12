<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJefeDepartamentoIdToCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carreras', function (Blueprint $table) {
            $table->unsignedInteger('jefe_departamento_id')->after('grado')->nullable();
            $table->foreign('jefe_departamento_id')->references('id')->on('jefes_departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carreras', function (Blueprint $table) {
            $table->dropForeign([ 'jefe_departamento_id' ]);
            $table->dropColumn('jefe_departamento_id');
        });
    }
}
