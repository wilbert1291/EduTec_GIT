<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\sexos;

class SexosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hombre = sexos::create([
            'vch_Sexo' => 'Hombre',
            'bit_Activo' => 1,
        ]);

        $mujer = sexos::create([
            'vch_Sexo' => 'Mujer',
            'bit_Activo' => 1,
        ]);

        $indefinido = sexos::create([
            'vch_Sexo' => 'Indefinido',
            'bit_Activo' => 0,
        ]);
    }
}
