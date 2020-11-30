<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\empleados;
use App\Models\instituciones;
use App\Models\profesores;
use App\Models\alumnos;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wilbert = User::create([
            'name' => 'Wilbert Eduardo',
            'vch_ApellidoPaterno' => 'Villegas',
            'vch_ApellidoMaterno' => 'Gutierrez',
            'email' => 'wilbert1291@edutec.mx',
            'password' => Hash::make('123456'),
            'int_IdTipoUsuario' => 1,
            'bit_Activo' => '1',
        ]);

        $wilbert = empleados::create([
            'vch_fotografia' => 'wilbert.jpg',
            'int_IdUsuario' =>  DB::getPdo()->lastInsertId(),
            'vch_descripcion' => 'Ingeniero de TI',
        ]);

        $jonathan = User::create([
            'name' => 'Jonathan Israel',
            'vch_ApellidoPaterno' => 'Hernandez',
            'vch_ApellidoMaterno' => 'Hernandez',
            'email' => 'jonathan@edutec.mx',
            'password' => Hash::make('123456'),
            'int_IdTipoUsuario' => 1,
            'bit_Activo' => '1',
        ]);

        $jonathan = empleados::create([
            'vch_fotografia' => 'jonathan.jpg',
            'int_IdUsuario' =>  DB::getPdo()->lastInsertId(),
            'vch_descripcion' => 'Ingeniero de TI',
        ]);

        $geiser = User::create([
            'name' => 'Alberto Geiser',
            'vch_ApellidoPaterno' => 'Flores',
            'vch_ApellidoMaterno' => 'Rivera',
            'email' => 'geiser@edutec.mx',
            'password' => Hash::make('123456'),
            'int_IdTipoUsuario' => 1,
            'bit_Activo' => '1',
        ]);

        $geiser = empleados::create([
            'vch_fotografia' => 'geiser.jpg',
            'int_IdUsuario' =>  DB::getPdo()->lastInsertId(),      
            'vch_descripcion' => 'Ingeniero de TI',
        ]);

        $frank = User::create([
            'name' => 'Frank Edwin',
            'vch_ApellidoPaterno' => 'Vera',
            'vch_ApellidoMaterno' => 'Hernandez',
            'email' => 'frank@edutec.mx',
            'password' => Hash::make('123456'),
            'int_IdTipoUsuario' => 1,
            'bit_Activo' => '1',
        ]);

        $frank = empleados::create([
            'vch_fotografia' => 'frank.jpg',
            'int_IdUsuario' =>  DB::getPdo()->lastInsertId(),
            'vch_descripcion' => 'Ingeniero de TI',
        ]);

        $institute = User::create([
            'name' => 'institute wilbert',
            'email' => 'institute@edutec.mx',
            'password' => Hash::make('wilbert1291'),
            'int_IdTipoUsuario' => 2,
            'bit_Activo' => '1',
        ]);

        $institute1 = instituciones::create([
            'int_IdNivelEscolar' => 2,
            'vch_ClvInstitucional' => 000005,
            'int_IdTurno' => 1,
            'dt_FechaRegistro' => date('Y-m-d'),
            'int_IdUsuario'=> DB::getPdo()->lastInsertId(),
        ]);

        $id_institucion = DB::getPdo()->lastInsertId();
        $teacher = User::create([
            'name' => 'teacher wilbert',
            'email' => 'teacher@edutec.mx',
            'password' => Hash::make('wilbert1291'),
            'int_IdTipoUsuario' => 3,
            'bit_Activo' => '1',
        ]);

        $teacher1 = profesores::create([
            'int_IdInstitucion' => $id_institucion,
            'int_IdUsuario' => DB::getPdo()->lastInsertId(),
        ]);
        $id_profesor = DB::getPdo()->lastInsertId();

        $student = User::create([
            'name' => 'student wilbert',
            'email' => 'student@edutec.mx',
            'password' => Hash::make('wilbert1291'),
            'int_IdTipoUsuario' => 4,
            'bit_Activo' => '1',
        ]);

        $student1 = alumnos::create([
            'int_IdInstitucion' => $id_institucion,
            'int_IdUsuario' => DB::getPdo()->lastInsertId(),
            'int_IdProfesor' => $id_profesor,
            'chr_Grupo' => "A",
            'chr_Semestre'=> "10",
        ]);
    }
}
