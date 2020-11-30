<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\niveles_escolares;

class NivelesEscolaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preescolar = niveles_escolares::create([
            'vch_NombreNivelEscolar' => 'Educación preescolar',
            'bit_Activo' => 0,
        ]);

        $primaria = niveles_escolares::create([
            'vch_NombreNivelEscolar' => 'Educación Primaria',
            'bit_Activo' => 1,
        ]);

        $secundaria = niveles_escolares::create([
            'vch_NombreNivelEscolar' => 'Educación secundaria',
            'bit_Activo' => 1,
        ]);

        $media_superior = niveles_escolares::create([
            'vch_NombreNivelEscolar' => 'Educación media superior',
            'bit_Activo' => 0,
        ]);

        $superior = niveles_escolares::create([
            'vch_NombreNivelEscolar' => 'Educación superior',
            'bit_Activo' => 0,
        ]);

        $posgrado = niveles_escolares::create([
            'vch_NombreNivelEscolar' => 'Educación posgrado',
            'bit_Activo' => 0,
        ]);
    }
}
