<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_historial_calificaciones', function (Blueprint $table) {
            $table->integer('int_IdHistorialCal')->autoIncrement();
            $table->integer('int_IdAlumno');
            $table->integer('int_IdCurso');
            $table->float('flt_Calificacion');
            $table->date('dt_Fecha');
            $table->foreign('int_IdAlumno')->references('int_IdAlumno')->on('tbl_alumnos');
            $table->foreign('int_IdCurso')->references('int_IdCurso')->on('tbl_cursos');
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
        Schema::dropIfExists('tbl_historial_calificaciones');
    }
}
