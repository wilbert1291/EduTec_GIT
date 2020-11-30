<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\profesores;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfesoresController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //************************************Profesores-Admin*******************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_admin()
    {
        return view('institute/profesores');
    }

    public function show_admin()
    {
        $profesores = [];
        $institucion = DB::table('tbl_instituciones')->where('int_IdUsuario','=',auth()->user()->int_IdUsuario)->get();
        $datos = DB::select('SELECT * FROM users WHERE (SELECT int_IdInstitucion FROM tbl_profesores WHERE int_IdUsuario = users.int_IdUsuario) = '.$institucion[0]->int_IdInstitucion);
        
        foreach ($datos as $key) {
            $profesor['clave_usuario'] = $key['int_IdUsuario'];
            $profesor['clave_estado'] = $key['chrClvEdo'];
            $profesor['clave_municipio'] = $key['chrNumMunicipio'];
            $profesor['clave_localidad'] = $key['chrClvLocalidad'];
            $profesor['clave_tipo_usuario'] = $key['int_IdTipoUsuario'];
            $profesor['clave_sexo'] = $key['int_IdSexo'];
            $profesor['nombre'] = $key['vch_Nombre'];
            $profesor['apellido_paterno'] = $key['vch_ApellidoPaterno'];
            $profesor['apellido_materno'] = $key['vch_ApellidoMaterno'];
            $profesor['correo'] = $key['vch_Correo'];
            $profesor['telefono'] = $key['vch_Telefono'];
            $profesor['curp'] = $key['vch_Curp'];
            $profesor['calle'] = $key['vch_Calle'];
            $profesor['colonia'] = $key['vch_Colonia'];
            $profesor['codigo_postal'] = $key['vch_CodigoPostal'];
            $profesor['nombre_usuario'] = $key['vch_Usuario'];
            $profesor['contrasenia'] = $key['vch_Contrasenia'];
            $profesor['pregunta_secreta'] = $key['vch_PreguntaSecreta'];
            $profesor['respuesta_secreta'] = $key['vch_RespuestaPSecreta'];
            $profesor['acceso'] = $key['bit_Activo'];
            array_push($profesores, $profesor);
        }
        return json_encode(array('data'=>$profesores));        
    }

    public function create_admin()
    {
        
    }

    public function update_admin()
    {
        
    }

    public function delete_admin()
    {
        
    }

    //***********************************************************************************************
    //***********************************************************************************************
    //************************************Profesores-Instituto***************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_institute()
    {
        $datos['sexos'] = DB::table('tbl_sexos')->get();
        $datos['estados'] = DB::table('tbl_estados')->get();
        return view('institute/profesores', $datos);
    }

    public function show_institute()
    {
        $profesores = [];
        $institucion = DB::table('tbl_instituciones')->where('int_IdUsuario','=',auth()->user()->int_IdUsuario)->get();
        $datos = DB::select('SELECT * FROM users WHERE (SELECT int_IdInstitucion FROM tbl_profesores WHERE int_IdUsuario = users.int_IdUsuario) = '.$institucion[0]->int_IdInstitucion);

        foreach ($datos as $key) {
            $profesor['clave_usuario'] = $key->int_IdUsuario;
            $profesor['clave_estado'] = $key->chrClvEdo;
            $profesor['clave_municipio'] = $key->chrNumMunicipio;
            $profesor['clave_localidad'] = $key->chrClvLocalidad;
            $profesor['clave_tipo_usuario'] = $key->int_IdTipoUsuario;
            $profesor['clave_sexo'] = $key->int_IdSexo;
            $profesor['nombre'] = $key->name;
            $profesor['apellido_paterno'] = $key->vch_ApellidoPaterno;
            $profesor['apellido_materno'] = $key->vch_ApellidoMaterno;
            $profesor['correo'] = $key->email;
            $profesor['telefono'] = $key->vch_Telefono;
            $profesor['curp'] = $key->vch_Curp;
            $profesor['calle'] = $key->vch_Calle;
            $profesor['colonia'] = $key->vch_Colonia;
            $profesor['codigo_postal'] = $key->vch_CodigoPostal;
            $profesor['contrasenia'] = $key->password;
            $profesor['pregunta_secreta'] = $key->vch_PreguntaSecreta;
            $profesor['respuesta_secreta'] = $key->vch_RespuestaPSecreta;
            $profesor['acceso'] = $key->bit_Activo;
            array_push($profesores, $profesor);
        }
        return json_encode(array('data'=>$profesores)); 
    }

    public function create_institute($nombre, $AP, $AM, $correo, $telefono, $curp, $id_sexo, $id_estado, $id_municipio, $id_localidad, $calle, $colonia, $codigo_postal, $pass, $pregunta, $respuesta, $acceso)
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
            $institucion = DB::table('tbl_instituciones')->where('int_IdUsuario','=',auth()->user()->int_IdUsuario)->get();
            $id_institucion = $institucion[0]->int_IdInstitucion;
            profesores::create([
                'int_IdInstitucion' => $id_institucion,
                'int_IdUsuario' => $usuario->int_IdUsuario,
            ]);
    
            return true;
        }catch(Exception $e){
            return false;
        }
        
    }

    public function update_institute($id, $nombre, $AP, $AM, $correo, $telefono, $curp, $id_sexo, $id_estado, $id_municipio, $id_localidad, $calle, $colonia, $codigo_postal, $pregunta, $respuesta, $acceso)
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


        try{
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
            'vch_Calle'=> $calle, 
            'vch_Colonia'=> $colonia, 
            'vch_CodigoPostal'=> $codigo_postal, 
            'vch_PreguntaSecreta'=> $pregunta,
            'vch_RespuestaPSecreta'=> $respuesta, 
            'bit_Activo'=>$acceso]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function delete_institute($id)
    {
        DB::table('tbl_profesores')->where('int_IdUsuario', '=', $id)->delete();
        DB::table('users')->where('int_IdUsuario', '=', $id)->delete();
    }    
}
