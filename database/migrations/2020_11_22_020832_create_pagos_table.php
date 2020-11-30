<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pagos', function (Blueprint $table) {
            $table->integer('int_IdPago')->autoIncrement();
            $table->integer('int_IdInstitucion');
            $table->integer('int_IdPaquete');
            $table->integer('int_IdMetodoPago');
            $table->date('dt_FechaInicio');
            $table->date('dt_FechaFinal');
            $table->foreign('int_IdInstitucion')->references('int_IdInstitucion')->on('tbl_instituciones');
            $table->foreign('int_IdPaquete')->references('int_IdPaquete')->on('tbl_paquetes');
            $table->foreign('int_IdMetodoPago')->references('int_IdMetodoPago')->on('tbl_metodos_pago');
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
        Schema::dropIfExists('tbl_pagos');
    }
}
