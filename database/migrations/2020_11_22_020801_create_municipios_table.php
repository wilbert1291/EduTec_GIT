<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_municipios', function (Blueprint $table) {
            $table->integer('intClvMunicipio');
            $table->char('chrNumMunicipio', 3);
            $table->char('chrClvEdo', 2);
            $table->string('vchNomMunicipio', 40);
            $table->foreign('chrClvEdo')->references('chrClvEdo')->on('tbl_estados');
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
        Schema::dropIfExists('tbl_municipios');
    }
}
