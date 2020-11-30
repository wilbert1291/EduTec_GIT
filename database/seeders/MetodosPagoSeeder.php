<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\metodos_pago;

class MetodosPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metodo1 = metodos_pago::create([
            'vch_MetodoPago' =>'Tarjeta de debito/credito',
        ]);

        $metodo2 = metodos_pago::create([
            'vch_MetodoPago' =>'Efectivo',
        ]);

        $metodo3 = metodos_pago::create([
            'vch_MetodoPago' =>'Cheque',
        ]);
    }
}
