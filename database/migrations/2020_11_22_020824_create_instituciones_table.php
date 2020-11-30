<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_instituciones', function (Blueprint $table) {
            $table->integer('int_IdInstitucion')->autoIncrement();
            $table->integer('int_IdNivelEscolar');
            $table->integer('int_IdTurno');
            $table->string('vch_ClvInstitucional')->unique();
            $table->date('dt_FechaRegistro');
            $table->integer('int_IdUsuario');
            $table->foreign('int_IdNivelEscolar')->references('int_IdNivelEscolar')->on('tbl_niveles_escolares');
            $table->foreign('int_IdTurno')->references('int_IdTurno')->on('tbl_turnos');
            $table->foreign('int_IdUsuario')->references('int_IdUsuario')->on('users');
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
        Schema::dropIfExists('tbl_instituciones');
    }
}
