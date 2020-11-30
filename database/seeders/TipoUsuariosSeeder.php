<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tipo_usuarios;

class TipoUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = tipo_usuarios::create([
            'vch_TipoUsuario' => 'Admin',
        ]);

        $institute = tipo_usuarios::create([
            'vch_TipoUsuario' => 'Institute',
        ]);

        $teacher = tipo_usuarios::create([
            'vch_TipoUsuario' => 'Teacher',
        ]);

        $student = tipo_usuarios::create([
            'vch_TipoUsuario' => 'Student',
        ]);
    }
}
