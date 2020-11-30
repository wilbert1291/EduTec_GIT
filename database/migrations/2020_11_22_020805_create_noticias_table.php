<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_noticias', function (Blueprint $table) {
            $table->integer('int_IdNoticia')->autoIncrement();
            $table->string('vch_Titulo',50);
            $table->string('vch_Contenido',1000);
            $table->string('vch_Imagen',100);
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
        Schema::dropIfExists('tbl_noticias');
    }
}
