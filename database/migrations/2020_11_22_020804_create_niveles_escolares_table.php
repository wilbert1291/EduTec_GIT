<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNivelesEscolaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_niveles_escolares', function (Blueprint $table) {
            $table->integer('int_IdNivelEscolar')->autoIncrement();
            $table->string('vch_NombreNivelEscolar', 200);
            $table->boolean('bit_Activo');
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
        Schema::dropIfExists('tbl_niveles_escolares');
    }
}
