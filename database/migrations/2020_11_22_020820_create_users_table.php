<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('int_IdUsuario')->autoIncrement();
            $table->char('chrClvEdo', 2)->nullable();
            $table->char('chrNumMunicipio', 3)->nullable();
            $table->char('chrClvLocalidad',4)->nullable();
            $table->integer('int_IdTipoUsuario');
            $table->integer('int_IdSexo')->nullable();
            $table->string('name');
            $table->string('vch_ApellidoPaterno')->nullable();
            $table->string('vch_ApellidoMaterno')->nullable();
            $table->string('email')->unique();
            $table->string('vch_Telefono')->unique()->nullable();
            $table->string('vch_Curp')->unique()->nullable();
            $table->string('vch_Calle')->nullable()->nullable();
            $table->string('vch_Colonia')->nullable()->nullable();
            $table->string('vch_CodigoPostal')->nullable()->nullable();
            $table->string('password');
            $table->string('vch_PreguntaSecreta')->nullable();
            $table->string('vch_RespuestaPSecreta')->nullable();
            $table->boolean('bit_Activo');
            $table->timestamp('email_verified_at')->nullable();            
            $table->rememberToken();
            $table->foreign('int_IdTipoUsuario')->references('int_IdTipoUsuario')->on('tbl_tipo_usuarios');
            $table->foreign('int_IdSexo')->references('int_IdSexo')->on('tbl_sexos');
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
        Schema::dropIfExists('users');
    }
}
