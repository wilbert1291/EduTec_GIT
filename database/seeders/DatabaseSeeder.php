<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NoticiasSeeder::class);
        $this->call(MetodosPagoSeeder::class);
        $this->call(NivelesEscolaresSeeder::class);
        $this->call(PaquetesSeeder::class);
        $this->call(SexosSeeder::class);
        $this->call(TipoUsuariosSeeder::class);
        $this->call(TurnosSeeder::class);
        $this->call(UsuariosSeeder::class);
    }
}
