<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_paquetes', function (Blueprint $table) {
            $table->integer('int_IdPaquete')->autoIncrement();
            $table->string('vch_NombrePaquete', 30);
            $table->string('vch_Descripcion', 500);
            $table->string('vch_Tiempo', 30);
            $table->float('flt_precio');
            $table->integer('int_descuento');
            $table->string('vch_imagen')->nullable();
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
        Schema::dropIfExists('tbl_paquetes');
    }
}
