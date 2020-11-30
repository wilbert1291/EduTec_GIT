<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_preguntas_respuestas', function (Blueprint $table) {
            $table->integer('int_IdPregunta')->autoIncrement();
            $table->integer('int_IdCurso');
            $table->string('vch_Pregunta', 500);
            $table->string('vch_Resp1', 100);
            $table->string('vch_Resp2',100);
            $table->string('vch_Resp3',100);
            $table->string('vch_Resp4',100);
            $table->integer('vch_RespuestaCorrecta');
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
        Schema::dropIfExists('tbl_preguntas_respuestas');
    }
}
