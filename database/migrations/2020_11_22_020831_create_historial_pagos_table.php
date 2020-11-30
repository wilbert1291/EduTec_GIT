<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_historial_pagos', function (Blueprint $table) {
            $table->integer('int_IdHistorialPago')->autoIncrement();
            $table->integer('int_IdInstitucion');
            $table->integer('int_IdMetodoPago');
            $table->integer('int_IdPaquete');
            $table->date('dt_FechaPago');
            $table->date('dt_FechaExpiracion');
            $table->foreign('int_IdInstitucion')->references('int_IdInstitucion')->on('tbl_instituciones');
            $table->foreign('int_IdMetodoPago')->references('int_IdMetodoPago')->on('tbl_metodos_pago');
            $table->foreign('int_IdPaquete')->references('int_IdPaquete')->on('tbl_paquetes');
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
        Schema::dropIfExists('tbl_historial_pagos');
    }
}
