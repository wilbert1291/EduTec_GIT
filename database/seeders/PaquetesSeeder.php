<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\paquetes;

class PaquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tres_meses = paquetes::create([
            'vch_NombrePaquete' => 'Paquete trimestral',
            'vch_Descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sapien et ligula ullamcorper malesuada proin libero nunc consequat interdum. Mauris augue neque gravida in fermentum et. Fermentum dui faucibus in ornare quam viverra orci sagittis. Semper auctor neque vitae tempus quam pellentesque. Sit amet tellus cras adipiscing enim eu. Leo duis ut diam quam nulla porttitor massa. Amet est placerat in egestas erat imperdiet sed euismod',
            'vch_Tiempo' => '3 meses',
            'flt_precio' => 600.0,
            'int_descuento' => 0,
            'vch_imagen'=> '3-meses.png',
        ]);

        $seis_meses = paquetes::create([
            'vch_NombrePaquete' => 'Paquete semestral',
            'vch_Descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sapien et ligula ullamcorper malesuada proin libero nunc consequat interdum. Mauris augue neque gravida in fermentum et. Fermentum dui faucibus in ornare quam viverra orci sagittis. Semper auctor neque vitae tempus quam pellentesque. Sit amet tellus cras adipiscing enim eu. Leo duis ut diam quam nulla porttitor massa. Amet est placerat in egestas erat imperdiet sed euismod',
            'vch_Tiempo' => '6 meses',
            'flt_precio' => 800.0,
            'int_descuento' => 0,
            'vch_imagen'=> '6-meses.png',
        ]);

        $doce_meses = paquetes::create([
            'vch_NombrePaquete' => 'Paquete anual',
            'vch_Descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sapien et ligula ullamcorper malesuada proin libero nunc consequat interdum. Mauris augue neque gravida in fermentum et. Fermentum dui faucibus in ornare quam viverra orci sagittis. Semper auctor neque vitae tempus quam pellentesque. Sit amet tellus cras adipiscing enim eu. Leo duis ut diam quam nulla porttitor massa. Amet est placerat in egestas erat imperdiet sed euismod',
            'vch_Tiempo' => '12 meses',
            'flt_precio' => 1200.0,
            'int_descuento' => 0,
            'vch_imagen'=> '12-meses.png',
        ]);
    }
}
