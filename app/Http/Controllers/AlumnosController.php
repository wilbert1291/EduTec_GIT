<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\alumnos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlumnosController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //************************************Alumnos-Profesores*****************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_teacher()
    {
        $profesor = DB::table('tbl_profesores')->where('int_IdUsuario', '=', auth()->user()->int_IdUsuario)->get();
        $institucion = DB::table('tbl_instituciones')->where('int_IdInstitucion', '=', $profesor[0]->int_IdInstitucion)->get();
        $datos['sexos'] = DB::table('tbl_sexos')->get();
        $datos['estados'] = DB::table('tbl_estados')->get();
        $datos['profesores'] = DB::select('select * from users u, tbl_profesores p where (select int_IdInstitucion from tbl_profesores where int_IdUsuario = u.int_IdUsuario) = ' . $institucion[0]->int_IdInstitucion . ' AND u.int_IdUsuario = p.int_IdUsuario');
        return view('teacher/alumnos', $datos);
    }

    public function show_teacher()
    {
        $alumnos = [];
        $profesor = DB::table('tbl_profesores')->where('int_IdUsuario', '=', auth()->user()->int_IdUsuario)->get();
        $datos = DB::select('select * from users u, tbl_alumnos a where u.int_IdUsuario = a.int_IdUsuario and a.`int_IdProfesor` = ' . $profesor[0]->int_IdProfesor);

        foreach ($datos as $key) {
            $alumno['clave_usuario'] = $key->int_IdUsuario;
            $alumno['clave_estado'] = $key->chrClvEdo;
            $alumno['clave_municipio'] = $key->chrNumMunicipio;
            $alumno['clave_localidad'] = $key->chrClvLocalidad;
            $alumno['clave_tipo_usuario'] = $key->int_IdTipoUsuario;
            $alumno['clave_sexo'] = $key->int_IdSexo;
            $alumno['nombre'] = $key->name;
            $alumno['apellido_paterno'] = $key->vch_ApellidoPaterno;
            $alumno['apellido_materno'] = $key->vch_ApellidoMaterno;
            $alumno['correo'] = $key->email;
            $alumno['telefono'] = $key->vch_Telefono;
            $alumno['curp'] = $key->vch_Curp;
            $alumno['calle'] = $key->vch_Calle;
            $alumno['colonia'] = $key->vch_Colonia;
            $alumno['codigo_postal'] = $key->vch_CodigoPostal;
            $alumno['contrasenia'] = $key->password;
            $alumno['pregunta_secreta'] = $key->vch_PreguntaSecreta;
            $alumno['respuesta_secreta'] = $key->vch_RespuestaPSecreta;
            $alumno['profesor'] = $key->int_IdProfesor;
            $alumno['semestre'] = $key->chr_Semestre;
            $alumno['grupo'] = $key->chr_Grupo;
            $alumno['acceso'] = $key->bit_Activo;
            array_push($alumnos, $alumno);
        }
        return json_encode(array('data' => $alumnos));
    }

    public function create_teacher($nombre, $AP, $AM, $correo, $telefono, $curp, $id_sexo, $id_estado, $id_municipio, $id_localidad, $calle, $colonia, $codigo_postal, $pass, $pregunta, $respuesta, $acceso, $profesor, $semestre, $grupo)
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
        try {
            $usuario = User::create([
                'chrClvEdo' => $id_estado,
                'chrNumMunicipio' => $id_municipio,
                'chrClvLocalidad' => $id_localidad,
                'int_IdTipoUsuario' => 3,
                'int_IdSexo' => $id_sexo,
                'name' => $nombre,
                'vch_ApellidoPaterno' => $AP,
                'vch_ApellidoMaterno' => $AM,
                'email' => $correo,
                'vch_Telefono' => $telefono,
                'vch_Curp' => $curp,
                'vch_Calle' => $calle,
                'vch_Colonia' => $colonia,
                'vch_CodigoPostal' => $codigo_postal,
                'password' => Hash::make($pass),
                'vch_PreguntaSecreta' => $pregunta,
                'vch_RespuestaPSecreta' => $respuesta,
                'bit_Activo' => $acceso,
            ]);
            $institucion = DB::table('tbl_profesores')->where('int_IdUsuario', '=', auth()->user()->int_IdUsuario)->get();
            $id_institucion = $institucion[0]->int_IdInstitucion;
            alumnos::create([
                'int_IdInstitucion' => $id_institucion,
                'int_IdUsuario' => $usuario->int_IdUsuario,
                'int_IdProfesor' => $profesor,
                'chr_Grupo' => $grupo,
                'chr_Semestre' => $semestre,
            ]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }


    public function update_teacher($id, $nombre, $AP, $AM, $correo, $telefono, $curp, $id_sexo, $id_estado, $id_municipio, $id_localidad, $calle, $colonia, $codigo_postal, $pregunta, $respuesta, $acceso, $profesor, $semestre, $grupo)
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

        try {
            DB::table('users')->where('int_IdUsuario', '=', $id)->update([
                'name' => $nombre,
                'vch_ApellidoPaterno' => $AP,
                'vch_ApellidoMaterno' => $AM,
                'email' => $correo,
                'vch_Telefono' => $telefono,
                'vch_Curp' => $curp,
                'int_IdSexo' => $id_sexo,
                'chrClvEdo' => $id_estado,
                'chrNumMunicipio' => $id_municipio,
                'chrClvLocalidad' => $id_localidad,
                'vch_Calle' => $calle,
                'vch_Colonia' => $colonia,
                'vch_CodigoPostal' => $codigo_postal,
                'vch_PreguntaSecreta' => $pregunta,
                'vch_RespuestaPSecreta' => $respuesta,
                'bit_Activo' => $acceso
            ]);

            DB::table('tbl_alumnos')->where('int_IdUsuario', '=', $id)->update([
                'int_IdProfesor' => $profesor,
                'chr_Grupo' => $grupo,
                'chr_Semestre' => $semestre,
            ]);

            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function delete_teacher($id)
    {
        try {
            DB::table('tbl_alumnos')->where('int_IdUsuario', '=', $id)->delete();
            DB::table('users')->where('int_IdUsuario', '=', $id)->delete();
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }


    //***********************************************************************************************
    //***********************************************************************************************
    //***************************************Alumnos-Instituto***************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_institute()
    {
        $institucion = DB::table('tbl_instituciones')->where('int_IdUsuario', '=', auth()->user()->int_IdUsuario)->get();
        $datos['sexos'] = DB::table('tbl_sexos')->get();
        $datos['estados'] = DB::table('tbl_estados')->get();
        $datos['profesores'] = DB::select('select * from users u, tbl_profesores p where (select int_IdInstitucion from tbl_profesores where int_IdUsuario = u.int_IdUsuario) = ' . $institucion[0]->int_IdInstitucion . ' AND u.int_IdUsuario = p.int_IdUsuario');
        return view('institute/alumnos', $datos);
    }

    public function show_institute()
    {
        $alumnos = [];
        $institucion = DB::table('tbl_instituciones')->where('int_IdUsuario', '=', auth()->user()->int_IdUsuario)->get();
        $datos = DB::select("select * from users u, tbl_alumnos a where (select int_IdInstitucion from tbl_alumnos where int_IdUsuario = u.int_IdUsuario) = " . $institucion[0]->int_IdInstitucion . " AND u.int_IdUsuario = a.int_IdUsuario");

        foreach ($datos as $key) {
            $alumno['clave_usuario'] = $key->int_IdUsuario;
            $alumno['clave_estado'] = $key->chrClvEdo;
            $alumno['clave_municipio'] = $key->chrNumMunicipio;
            $alumno['clave_localidad'] = $key->chrClvLocalidad;
            $alumno['clave_tipo_usuario'] = $key->int_IdTipoUsuario;
            $alumno['clave_sexo'] = $key->int_IdSexo;
            $alumno['nombre'] = $key->name;
            $alumno['apellido_paterno'] = $key->vch_ApellidoPaterno;
            $alumno['apellido_materno'] = $key->vch_ApellidoMaterno;
            $alumno['correo'] = $key->email;
            $alumno['telefono'] = $key->vch_Telefono;
            $alumno['curp'] = $key->vch_Curp;
            $alumno['calle'] = $key->vch_Calle;
            $alumno['colonia'] = $key->vch_Colonia;
            $alumno['codigo_postal'] = $key->vch_CodigoPostal;
            $alumno['contrasenia'] = $key->password;
            $alumno['pregunta_secreta'] = $key->vch_PreguntaSecreta;
            $alumno['respuesta_secreta'] = $key->vch_RespuestaPSecreta;
            $alumno['profesor'] = $key->int_IdProfesor;
            $alumno['semestre'] = $key->chr_Semestre;
            $alumno['grupo'] = $key->chr_Grupo;
            $alumno['acceso'] = $key->bit_Activo;
            array_push($alumnos, $alumno);
        }
        return json_encode(array('data' => $alumnos));
    }

    public function create_institute($nombre, $AP, $AM, $correo, $telefono, $curp, $id_sexo, $id_estado, $id_municipio, $id_localidad, $calle, $colonia, $codigo_postal, $pass, $pregunta, $respuesta, $acceso, $profesor, $semestre, $grupo)
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

        try {
            $usuario = User::create([
                'chrClvEdo' => $id_estado,
                'chrNumMunicipio' => $id_municipio,
                'chrClvLocalidad' => $id_localidad,
                'int_IdTipoUsuario' => 3,
                'int_IdSexo' => $id_sexo,
                'name' => $nombre,
                'vch_ApellidoPaterno' => $AP,
                'vch_ApellidoMaterno' => $AM,
                'email' => $correo,
                'vch_Telefono' => $telefono,
                'vch_Curp' => $curp,
                'vch_Calle' => $calle,
                'vch_Colonia' => $colonia,
                'vch_CodigoPostal' => $codigo_postal,
                'password' => Hash::make($pass),
                'vch_PreguntaSecreta' => $pregunta,
                'vch_RespuestaPSecreta' => $respuesta,
                'bit_Activo' => $acceso,
            ]);
            $institucion = DB::table('tbl_instituciones')->where('int_IdUsuario', '=', auth()->user()->int_IdUsuario)->get();
            $id_institucion = $institucion[0]->int_IdInstitucion;
            alumnos::create([
                'int_IdInstitucion' => $id_institucion,
                'int_IdUsuario' => $usuario->int_IdUsuario,
                'int_IdProfesor' => $profesor,
                'chr_Grupo' => $grupo,
                'chr_Semestre' => $semestre,
            ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function update_institute($id, $nombre, $AP, $AM, $correo, $telefono, $curp, $id_sexo, $id_estado, $id_municipio, $id_localidad, $calle, $colonia, $codigo_postal, $pregunta, $respuesta, $acceso, $profesor, $semestre, $grupo)
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


        try {
            DB::table('users')->where('int_IdUsuario', '=', $id)->update([
                'name' => $nombre,
                'vch_ApellidoPaterno' => $AP,
                'vch_ApellidoMaterno' => $AM,
                'email' => $correo,
                'vch_Telefono' => $telefono,
                'vch_Curp' => $curp,
                'int_IdSexo' => $id_sexo,
                'chrClvEdo' => $id_estado,
                'chrNumMunicipio' => $id_municipio,
                'chrClvLocalidad' => $id_localidad,
                'vch_Calle' => $calle,
                'vch_Colonia' => $colonia,
                'vch_CodigoPostal' => $codigo_postal,
                'vch_PreguntaSecreta' => $pregunta,
                'vch_RespuestaPSecreta' => $respuesta,
                'bit_Activo' => $acceso
            ]);

            DB::table('tbl_alumnos')->where('int_IdUsuario', '=', $id)->update([
                'int_IdProfesor' => $profesor,
                'chr_Grupo' => $grupo,
                'chr_Semestre' => $semestre,
            ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete_institute($id)
    {
        DB::table('tbl_alumnos')->where('int_IdUsuario', '=', $id)->delete();
        DB::table('users')->where('int_IdUsuario', '=', $id)->delete();
    }
}
