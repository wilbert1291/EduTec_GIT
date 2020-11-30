<?php

namespace App\Http\Controllers;

use App\Models\instituciones;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstitucionesController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //*************************************Categorias-Admin******************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_admin()
    {
        $datos['turnos'] = DB::table('tbl_turnos')->get();
        $datos['niveles_escolares'] = DB::table('tbl_niveles_escolares')->get();
        $datos['estados'] = DB::table('tbl_estados')->get();
        return view('admin/instituciones', $datos);
    }

    public function show_admin()
    {
        $instituciones = [];
        $datos = DB::select("SELECT * FROM users u, tbl_instituciones i WHERE u.int_IdUsuario=i.int_IdUsuario");

        foreach ($datos as $key) {
            $institucion['clave_institucion'] = $key->int_IdUsuario;
            $institucion['clave_estado'] = $key->chrClvEdo;
            $institucion['clave_municipio'] = $key->chrNumMunicipio;
            $institucion['clave_localidad'] = $key->chrClvLocalidad;
            $institucion['clave_nivel_escolar'] = $key->int_IdNivelEscolar;
            $institucion['clave_turno'] = $key->int_IdTurno;
            $institucion['codigo_institucion'] = $key->vch_ClvInstitucional;
            $institucion['nombre_institucion'] = $key->name;
            $institucion['calle'] = $key->vch_Calle;
            $institucion['colonia'] = $key->vch_Colonia;
            $institucion['codigo_postal'] = $key->vch_CodigoPostal;
            $institucion['fecha_registro'] = $key->dt_FechaRegistro;
            $institucion['telefono'] = $key->vch_Telefono;
            $institucion['correo'] = $key->email;
            $institucion['contrasenia'] = $key->password;
            $institucion['activo'] = $key->bit_Activo;
            array_push($instituciones, $institucion);
        }
        return json_encode(array('data' => $instituciones));
    }

    public function create_admin($estado, $municipio, $localidad, $nombre, $correo, $telefono, $clave_institucional, $calle, $colonia, $CP, $password, $nivel_escolar, $turno)
    {
        try {
            $usuario = User::create([
                'chrClvEdo' => $estado,
                'chrNumMunicipio' => $municipio,
                'chrClvLocalidad' => $localidad,
                'int_IdTipoUsuario' => 2,
                'int_IdSexo' => 3,
                'name' => $nombre,
                'vch_ApellidoPaterno' => "",
                'vch_ApellidoMaterno' => "",
                'email' => $correo,
                'vch_Telefono' => $telefono,
                'vch_Curp' => md5($clave_institucional),
                'vch_Calle' => $calle,
                'vch_Colonia' => $colonia,
                'vch_CodigoPostal' => $CP,
                'password' => Hash::make($password),
                'vch_PreguntaSecreta' => "",
                'vch_RespuestaPSecreta' => "",
                'bit_Activo' => 1,
            ]);

            $instituto = instituciones::create([
                'vch_ClvInstitucional' => $clave_institucional,
                'int_IdNivelEscolar' => $nivel_escolar,
                'int_IdTurno' => $turno,
                'dt_FechaRegistro' => date("Y-m-d"),
                'int_IdUsuario' =>  $usuario->int_IdUsuario,
            ]);

            return true;
        } catch (Exception $e) {
        }
    }

    public function update_admin($id, $estado, $municipio, $localidad, $nombre, $correo, $telefono, $clave_institucional, $calle, $colonia, $CP, $nivel_escolar, $turno, $acceso)
    {
        try{
            DB::table('users')->where('int_IdUsuario', '=', $id)->update([
                'chrClvEdo' => $estado,
                'chrNumMunicipio' => $municipio,
                'chrClvLocalidad' => $localidad,
                'name' => $nombre,
                'email' => $correo,
                'vch_Telefono' => $telefono,
                'vch_Curp' => md5($clave_institucional),
                'vch_Calle' => $calle,
                'vch_Colonia' => $colonia,
                'vch_CodigoPostal' => $CP,
                'bit_Activo' => $acceso,
            ]);

            DB::table('tbl_instituciones')->where('int_IdUsuario', '=', $id)->update([
                'int_IdNivelEscolar' => $nivel_escolar,
                'int_IdTurno' => $turno,
            ]);
            return true;
        }catch(Exception $e){
            return $e;
        }
    }

    public function delete_admin($id)
    {
        try{
            DB::table('tbl_instituciones')->where('int_IdUsuario', '=', $id)->delete();
            DB::table('users')->where('int_IdUsuario', '=', $id)->delete();
            return true;
        }catch(Exception $e){
            return "La institucion tiene asignada profesores y/o alumnos";
        }
        
    }
}
