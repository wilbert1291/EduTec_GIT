<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_categorias', function (Blueprint $table) {
            $table->integer('int_IdCategoria')->autoIncrement();
            $table->string('vch_NombreCategoria', 50);
            $table->boolean('bit_Activo');
            $table->string('vch_Imagen', 300);
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
        Schema::dropIfExists('tbl_categorias');
    }
}
