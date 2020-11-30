<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_empleados', function (Blueprint $table) {
            $table->integer('int_IdEmpleado')->autoIncrement();
            $table->string('vch_fotografia', 200);
            $table->integer('int_IdUsuario');
            $table->string('vch_descripcion', 200);
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
        Schema::dropIfExists('tbl_empleados');
    }
}
