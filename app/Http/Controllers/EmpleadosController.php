<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\empleados;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpleadosController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //**************************************Empleados-Admin******************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_admin()
    {
        $datos['sexos'] = DB::table('tbl_sexos')->where('bit_Activo', '=', 1)->get();
        $datos['estados'] = DB::table('tbl_estados')->get();
        return view('admin/empleados', $datos);
    }

    public function show_admin()
    {
        $empleados = [];
        $datos = DB::select('select * from users u, tbl_empleados e where u.`int_IdUsuario` = e.`int_IdUsuario`');

        foreach ($datos as $key) {
            $empleado['clave_usuario'] = $key->int_IdUsuario;
            $empleado['clave_estado'] = $key->chrClvEdo;
            $empleado['clave_municipio'] = $key->chrNumMunicipio;
            $empleado['clave_localidad'] = $key->chrClvLocalidad;
            $empleado['clave_sexo'] = $key->int_IdSexo;
            $empleado['nombre'] = $key->name;
            $empleado['apellido_paterno'] = $key->vch_ApellidoPaterno;
            $empleado['apellido_materno'] = $key->vch_ApellidoMaterno;
            $empleado['correo'] = $key->email;
            $empleado['telefono'] = $key->vch_Telefono;
            $empleado['curp'] = $key->vch_Curp;
            $empleado['calle'] = $key->vch_Calle;
            $empleado['colonia'] = $key->vch_Colonia;
            $empleado['codigo_postal'] = $key->vch_CodigoPostal;
            $empleado['contrasenia'] = $key->password;
            $empleado['pregunta_secreta'] = $key->vch_PreguntaSecreta;
            $empleado['respuesta_secreta'] = $key->vch_RespuestaPSecreta;
            $empleado['acceso'] = $key->bit_Activo;
            $empleado['fotografia'] = $key->vch_fotografia;
            $empleado['descripcion'] = $key->vch_descripcion;
            array_push($empleados, $empleado);
        }
        return json_encode(array('data' => $empleados));
    }

    public function save_admin(Request $request)
    {
        if ($request->id_user == "") {
            if (sizeof(DB::table('users')->where('vch_Curp', '=', $request->curp)->get())) {
                return "La curp ya esta siendo utilizada";
            }

            if (sizeof(DB::table('users')->where('vch_Telefono', '=', $request->telefono)->get())) {
                return "El telefono ya esta siendo utilizado";
            }

            if (sizeof(DB::table('users')->where('email', '=', $request->correo)->get())) {
                return "El correo ya esta siendo utilizado";
            }

            try {
                /*$image = $request->file('file');
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('assets\images\trabajadores'), $imageName);*/

                $usuario = User::create([
                    'chrClvEdo' => $request->estado,
                    'chrNumMunicipio' => $request->municipio,
                    'chrClvLocalidad' => $request->localidad,
                    'int_IdTipoUsuario' => 1,
                    'int_IdSexo' => $request->sexo,
                    'name' => $request->nombre,
                    'vch_ApellidoPaterno' => $request->ap,
                    'vch_ApellidoMaterno' => $request->am,
                    'email' => $request->correo,
                    'vch_Telefono' => $request->telefono,
                    'vch_Curp' => $request->curp,
                    'vch_Calle' => $request->calle,
                    'vch_Colonia' => $request->colonia,
                    'vch_CodigoPostal' => $request->codigo_postal,
                    'password' => Hash::make($request->password),
                    'vch_PreguntaSecreta' => $request->pregunta_secreta,
                    'vch_RespuestaPSecreta' => $request->respuesta,
                    'bit_Activo' => $request->acceso,
                ]);

                empleados::create([
                    'vch_fotografia' => "Sin_Imagen.jpg"/*$imageName*/,
                    'int_IdUsuario' => $usuario->int_IdUsuario,
                    'vch_descripcion' => $request->descripcion,
                ]);

                return true;
            } catch (Exception $e) {
                return $e;
            }
        } else {
            if (sizeof(DB::table('users')->where('vch_Curp', '=', $request->curp)->where('int_IdUsuario', '!=', $request->id_user)->get())) {
                return "La curp ya esta siendo utilizada";
            }

            if (sizeof(DB::table('users')->where('vch_Telefono', '=', $request->telefono)->where('int_IdUsuario', '!=', $request->id_user)->get())) {
                return "El telefono ya esta siendo utilizado";
            }

            if (sizeof(DB::table('users')->where('email', '=', $request->correo)->where('int_IdUsuario', '!=', $request->id_user)->get())) {
                return "El correo ya esta siendo utilizado";
            }


            try {
                DB::table('users')->where('int_IdUsuario', '=', $request->id_user)->update([
                    'chrClvEdo' => $request->estado,
                    'chrNumMunicipio' => $request->municipio,
                    'chrClvLocalidad' => $request->localidad,
                    'int_IdSexo' => $request->sexo,
                    'name' => $request->nombre,
                    'vch_ApellidoPaterno' => $request->ap,
                    'vch_ApellidoMaterno' => $request->am,
                    'email' => $request->correo,
                    'vch_Telefono' => $request->telefono,
                    'vch_Curp' => $request->curp,
                    'vch_Calle' => $request->calle,
                    'vch_Colonia' => $request->colonia,
                    'vch_CodigoPostal' => $request->codigo_postal,
                    'vch_PreguntaSecreta' => $request->pregunta_secreta,
                    'vch_RespuestaPSecreta' => $request->respuesta,
                    'bit_Activo' => $request->acceso,
                ]);
                DB::table('tbl_empleados')->where('int_IdUsuario', '=', $request->id_user)->update([
                    'vch_descripcion' => $request->descripcion,
                ]);

                return true;
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    public function delete_admin($id)
    {
        DB::table('tbl_empleados')->where('int_IdUsuario', '=', $id)->delete();
        DB::table('users')->where('int_IdUsuario', '=', $id)->delete();
    }
}
