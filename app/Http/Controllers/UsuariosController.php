<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use App\Models\profesores;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //*************************************Usuarios-Admin********************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_admin()
    {
        $datos['sexos'] = DB::table('tbl_sexos')->where('bit_Activo', '=', 1)->get();
        $datos['estados']= DB::table('tbl_estados')->get();
        $datos['tipos']= DB::table('tbl_tipo_usuarios')->where('int_IdTipoUsuario', '>', '2')->get();
        $datos['instituciones']= DB::select('SELECT * FROM users u, tbl_instituciones i WHERE u.int_IdUsuario = i.int_IdUsuario');
        return view('admin/usuarios', $datos);
    }

    public function show_admin()
    {
        $usuarios = [];
        $datos = DB::select('SELECT * FROM users u, tbl_profesores p WHERE u.int_IdUsuario = p.int_IdUsuario');

        foreach ($datos as $key) {
            $usuario['clave_usuario'] = $key->int_IdUsuario;
            $usuario['clave_estado'] = $key->chrClvEdo;
            $usuario['clave_municipio'] = $key->chrNumMunicipio;
            $usuario['clave_localidad'] = $key->chrClvLocalidad;
            $usuario['clave_tipo_usuario'] = $key->int_IdTipoUsuario;
            $usuario['clave_sexo'] = $key->int_IdSexo;
            $usuario['nombre'] = $key->name;
            $usuario['apellido_paterno'] = $key->vch_ApellidoPaterno;
            $usuario['apellido_materno'] = $key->vch_ApellidoMaterno;
            $usuario['correo'] = $key->email;
            $usuario['telefono'] = $key->vch_Telefono;
            $usuario['curp'] = $key->vch_Curp;
            $usuario['calle'] = $key->vch_Calle;
            $usuario['colonia'] = $key->vch_Colonia;
            $usuario['codigo_postal'] = $key->vch_CodigoPostal;
            $usuario['contrasenia'] = $key->password;
            $usuario['pregunta_secreta'] = $key->vch_PreguntaSecreta;
            $usuario['respuesta_secreta'] = $key->vch_RespuestaPSecreta;
            $usuario['profesor'] = "";
            $usuario['semestre'] = "";
            $usuario['grupo'] = "";
            $usuario['acceso'] = $key->bit_Activo;
            $usuario['clave_institucion'] = $key->int_IdInstitucion;
            array_push($usuarios, $usuario);
        }

        $datos = DB::select('SELECT * FROM users u, tbl_alumnos a WHERE u.int_IdUsuario = a.int_IdUsuario');
        foreach ($datos as $key) {
            $usuario['clave_usuario'] = $key->int_IdUsuario;
            $usuario['clave_estado'] = $key->chrClvEdo;
            $usuario['clave_municipio'] = $key->chrNumMunicipio;
            $usuario['clave_localidad'] = $key->chrClvLocalidad;
            $usuario['clave_tipo_usuario'] = $key->int_IdTipoUsuario;
            $usuario['clave_sexo'] = $key->int_IdSexo;
            $usuario['nombre'] = $key->name;
            $usuario['apellido_paterno'] = $key->vch_ApellidoPaterno;
            $usuario['apellido_materno'] = $key->vch_ApellidoMaterno;
            $usuario['correo'] = $key->email;
            $usuario['telefono'] = $key->vch_Telefono;
            $usuario['curp'] = $key->vch_Curp;
            $usuario['calle'] = $key->vch_Calle;
            $usuario['colonia'] = $key->vch_Colonia;
            $usuario['codigo_postal'] = $key->vch_CodigoPostal;
            $usuario['contrasenia'] = $key->password;
            $usuario['pregunta_secreta'] = $key->vch_PreguntaSecreta;
            $usuario['respuesta_secreta'] = $key->vch_RespuestaPSecreta;
            $usuario['clave_institucion'] = $key->int_IdInstitucion;
            $usuario['profesor'] = $key->int_IdProfesor;
            $usuario['semestre'] = $key->chr_Semestre;
            $usuario['grupo'] = $key->chr_Grupo;
            $usuario['acceso'] = $key->bit_Activo;
            array_push($usuarios, $usuario);
        }
        return json_encode(array('data'=>$usuarios)); 
    }

    public function create_admin($nombre, $AP, $AM, $correo, $telefono, $curp, $id_sexo, $id_estado, $id_municipio, $id_localidad, $calle, $colonia, $codigo_postal, $pass, $pregunta, $respuesta, $acceso, $profesor, $semestre, $grupo, $institucion, $tipo_usuario)
    {
        if (sizeof(DB::table('users')->where('vch_Curp', '=', $curp)->get())) {
            return "La curp ya esta siendo utilizada";
        }

        if (sizeof(DB::table('users')->where('vch_Telefono', '=', $telefono)->get())) {
            return "El telefono ya esta siendo utilizado";
        }

        if (sizeof(DB::table('users')->where('email', '=', $correo)->get())) {
            return "El correo ya esta siendo utilizado";
        }
        try{
            if ($tipo_usuario == 3){
                $usuario = User::create([
                    'chrClvEdo' => $id_estado,
                    'chrNumMunicipio' => $id_municipio,
                    'chrClvLocalidad' => $id_localidad,
                    'int_IdTipoUsuario' => 3,
                    'int_IdSexo' => $id_sexo,
                    'name' => $nombre,
                    'vch_ApellidoPaterno'=>$AP,
                    'vch_ApellidoMaterno'=>$AM,
                    'email' => $correo,
                    'vch_Telefono'=> $telefono,
                    'vch_Curp'=> $curp,
                    'vch_Calle'=> $calle,
                    'vch_Colonia'=> $colonia,
                    'vch_CodigoPostal'=> $codigo_postal,
                    'password'=> Hash::make($pass),
                    'vch_PreguntaSecreta'=> $pregunta,
                    'vch_RespuestaPSecreta'=> $respuesta,
                    'bit_Activo'=>$acceso,
                ]);
    
                profesores::create([
                    'int_IdInstitucion' => $institucion,
                    'int_IdUsuario' => $usuario->int_IdUsuario,
                ]);
            } else {
                $usuario = User::create([
                    'chrClvEdo' => $id_estado,
                    'chrNumMunicipio' => $id_municipio,
                    'chrClvLocalidad' => $id_localidad,
                    'int_IdTipoUsuario' => 3,
                    'int_IdSexo' => $id_sexo,
                    'name' => $nombre,
                    'vch_ApellidoPaterno'=>$AP,
                    'vch_ApellidoMaterno'=>$AM,
                    'email' => $correo,
                    'vch_Telefono'=> $telefono,
                    'vch_Curp'=> $curp,
                    'vch_Calle'=> $calle,
                    'vch_Colonia'=> $colonia,
                    'vch_CodigoPostal'=> $codigo_postal,
                    'password'=> Hash::make($pass),
                    'vch_PreguntaSecreta'=> $pregunta,
                    'vch_RespuestaPSecreta'=> $respuesta,
                    'bit_Activo'=>$acceso,
                ]);
        
                alumnos::create([
                    'int_IdInstitucion' => $institucion,
                    'int_IdUsuario' => $usuario->int_IdUsuario,
                    'int_IdProfesor' => $profesor,
                    'chr_Grupo' => $grupo,
                    'chr_Semestre' => $semestre,
                ]);
            }
            return true;
        } catch(Exception $e){
            return $e;
        }
        
                
    }

    public function update_admin($id, $nombre, $AP, $AM, $correo, $telefono, $curp, $id_sexo, $id_estado, $id_municipio, $id_localidad, $calle, $colonia, $codigo_postal, $pregunta, $respuesta, $acceso, $profesor, $semestre, $grupo, $institucion, $tipo_usuario)
    {
        if (sizeof(DB::table('users')->where('vch_Curp', '=', $curp)->where('int_IdUsuario', '!=', $id)->get())) {
            return "La curp ya esta siendo utilizada";
        }

        if (sizeof(DB::table('users')->where('vch_Telefono', '=', $telefono)->where('int_IdUsuario', '!=', $id)->get())) {
            return "El telefono ya esta siendo utilizado";
        }

        if (sizeof(DB::table('users')->where('email', '=', $correo)->where('int_IdUsuario', '!=', $id)->get())) {
            return "El correo ya esta siendo utilizado";
        }

        $usuario = DB::table('users')->where('int_IdUsuario', '=', $id)->get();
        if ($usuario[0]->int_IdTipoUsuario == 3){
            if($usuario[0]->int_IdTipoUsuario != $tipo_usuario){
                if (sizeof(DB::select('SELECT * FROM tbl_alumnos WHERE (SELECT int_IdProfesor FROM tbl_profesores WHERE int_IdUsuario = '. $id .') = int_IdProfesor'))) {
                    return "El profesor tiene alumnos asignados, no puedes cambiarle el tipo de usuario";
                }
                DB::table('tbl_profesores')->where('int_IdUsuario', '=', $id)->delete();
                alumnos::create([
                    'int_IdInstitucion' => $institucion,
                    'int_IdUsuario' => $usuario[0]->int_IdUsuario,
                    'int_IdProfesor' => $profesor,
                    'chr_Grupo' => $grupo,
                    'chr_Semestre' => $semestre,
                ]);
            }            
        } else {
            if($usuario[0]->int_IdTipoUsuario != $tipo_usuario){
                DB::table('tbl_alumnos')->where('int_IdUsuario', '=', $id)->delete();
                profesores::create([
                    'int_IdInstitucion' => $institucion,
                    'int_IdUsuario' => $usuario[0]->int_IdUsuario,
                ]);
            } else {
                DB::table('tbl_alumnos')->where('int_IdUsuario', '=', $id)->update([
                    'int_IdProfesor' => $profesor,
                    'chr_Grupo' => $grupo,
                    'chr_Semestre' => $semestre,
                ]);
            }
        }
        DB::table('users')->where('int_IdUsuario', '=', $id)->update([
            'name' => $nombre, 
            'vch_ApellidoPaterno'=>$AP, 
            'vch_ApellidoMaterno'=>$AM, 
            'email' => $correo, 
            'vch_Telefono'=> $telefono, 
            'vch_Curp'=> $curp, 
            'int_IdSexo' => $id_sexo, 
            'chrClvEdo' => $id_estado, 
            'chrNumMunicipio' => $id_municipio, 
            'chrClvLocalidad' => $id_localidad, 
            'int_IdTipoUsuario' => $tipo_usuario,
            'vch_Calle'=> $calle, 
            'vch_Colonia'=> $colonia, 
            'vch_CodigoPostal'=> $codigo_postal, 
            'vch_PreguntaSecreta'=> $pregunta,
            'vch_RespuestaPSecreta'=> $respuesta, 
            'bit_Activo'=>$acceso
        ]); 

        return true;
    }

    public function delete_admin($id, $tipo_usuario)
    {
        if ($tipo_usuario == 3){
            DB::table('tbl_profesores')->where('int_IdUsuario', '=', $id)->delete();
            DB::table('users')->where('int_IdUsuario', '=', $id)->delete();
        } else {
            DB::table('tbl_alumnos')->where('int_IdUsuario', '=', $id)->delete();
            DB::table('users')->where('int_IdUsuario', '=', $id)->delete();
        }
    }
}
