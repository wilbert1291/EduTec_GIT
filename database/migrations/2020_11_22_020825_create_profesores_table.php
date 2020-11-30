<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_profesores', function (Blueprint $table) {
            $table->integer('int_IdProfesor')->autoIncrement();
            $table->integer('int_IdInstitucion');
            $table->integer('int_IdUsuario');
            $table->foreign('int_IdInstitucion')->references('int_IdInstitucion')->on('tbl_instituciones');
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
        Schema::dropIfExists('tbl_profesores');
    }
}
