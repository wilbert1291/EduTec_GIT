<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cursos', function (Blueprint $table) {
            $table->integer('int_IdCurso')->autoIncrement();
            $table->integer('int_IdCategoria');
            $table->string('vch_NombreCurso', 100);
            $table->string('vch_Descripcion', 500);
            $table->foreign('int_IdCategoria')->references('int_IdCategoria')->on('tbl_categorias');
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
        Schema::dropIfExists('tbl_cursos');
    }
}
