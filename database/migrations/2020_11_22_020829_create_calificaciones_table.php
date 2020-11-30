<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_calificaciones', function (Blueprint $table) {
            $table->integer('int_IdCalificacion')->autoIncrement();
            $table->integer('int_IdCurso');
            $table->integer('int_IdAlumno');
            $table->float('flt_Calificacion');
            $table->integer('int_Aciertos');
            $table->integer('int_Errores');
            $table->foreign('int_IdCurso')->references('int_IdCurso')->on('tbl_cursos');
            $table->foreign('int_IdAlumno')->references('int_IdAlumno')->on('tbl_alumnos');
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
        Schema::dropIfExists('tbl_calificaciones');
    }
}
