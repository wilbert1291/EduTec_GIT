<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //***************************************Alumnos-Admin*******************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_admin()
    {
        $datos['categorias'] = DB::table('tbl_categorias')->where('bit_Activo', '=', 1)->get();
        return view('admin/cursos', $datos);
    }

    public function show_admin()
    {
        $cursos = [];
        $datos = DB::table('tbl_cursos')->get();
        foreach ($datos as $key) {
            $curso['clave_curso'] = $key->int_IdCurso;
            $curso['clave_categoria'] = $key->int_IdCategoria;
            $curso['nombre_curso'] = $key->vch_NombreCurso;
            $curso['descripcion'] = $key->vch_Descripcion;
            array_push($cursos, $curso);
        }
        return json_encode(array('data' => $cursos));
    }

    public function create_admin($nombre, $descripcion, $categoria)
    {
        try {
            cursos::create([
                'int_IdCategoria' => $categoria,
                'vch_NombreCurso' => $nombre,
                'vch_Descripcion' => $descripcion,
            ]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update_admin($id, $nombre, $descripcion, $categoria)
    {
        try {
            DB::table('tbl_cursos')->where('int_IdCurso', '=', $id)->update([
                'int_IdCategoria' => $categoria,
                'vch_NombreCurso' => $nombre,
                'vch_Descripcion' => $descripcion,
            ]);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function delete_admin($id)
    {
        DB::table('tbl_cursos')->where('int_IdCurso', '=', $id)->delete();
        return true;
    }
}
