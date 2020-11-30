<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_localidades', function (Blueprint $table) {
            $table->integer('intClvLocalidad');
            $table->char('chrClvEdo',2);
            $table->char('chrClvMunicipio',3);
            $table->char('chrClvLocalidad',4);
            $table->string('vchNomLocalidad', 100);
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
        Schema::dropIfExists('tbl_localidades');
    }
}
