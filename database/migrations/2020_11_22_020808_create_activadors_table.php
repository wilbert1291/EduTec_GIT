<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_activador', function (Blueprint $table) {
            $table->integer('int_IdActivador')->autoIncrement();
            $table->string('codigo', 500);
            $table->boolean('usado');
            $table->integer('int_IdInstitucion');
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
        Schema::dropIfExists('tbl_activador');
    }
}
