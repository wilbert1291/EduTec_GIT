<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_alumnos', function (Blueprint $table) {
            $table->integer('int_IdAlumno')->autoIncrement();
            $table->integer('int_IdInstitucion');
            $table->integer('int_IdUsuario');
            $table->integer('int_IdProfesor');
            $table->char('chr_Grupo', 2);
            $table->char('chr_Semestre', 2);
            $table->foreign('int_IdUsuario')->references('int_IdUsuario')->on('users');
            $table->foreign('int_IdInstitucion')->references('int_IdInstitucion')->on('tbl_instituciones');
            $table->foreign('int_IdProfesor')->references('int_IdProfesor')->on('tbl_profesores');
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
        Schema::dropIfExists('tbl_alumnos');
    }
}
