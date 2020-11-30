<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\turnos;

class TurnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matutino = turnos::create([
            'vch_Turno' => 'Matutino',
        ]);

        $vespertino = turnos::create([
            'vch_Turno' => 'Vespertino',
        ]);

        $nocturno = turnos::create([
            'vch_Turno' => 'Nocturno',
        ]);

        $mixto = turnos::create([
            'vch_Turno' => 'Mixto',
        ]);
    }
}
