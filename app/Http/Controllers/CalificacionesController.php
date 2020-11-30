<?php

namespace App\Http\Controllers;

use App\Models\calificaciones;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class CalificacionesController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //************************************Alumnos-Profesores*****************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_teacher()
    {
        return view('teacher/calificaciones');
    }

    public function show_teacher()
    {
        $calificaciones = [];
        $profesor = DB::table('tbl_profesores')->where('int_IdUsuario', '=', auth()->user()->int_IdUsuario)->get();
        $datos = DB::select('SELECT ca.int_IdCalificacion, cu.vch_NombreCurso, u.name, ca.flt_Calificacion, ca.int_Aciertos, ca.int_Errores FROM tbl_calificaciones ca, tbl_cursos cu, tbl_alumnos a, users u WHERE ca.int_IdCurso = cu.int_IdCurso AND ca.int_IdAlumno = a.int_IdAlumno AND u.int_IdUsuario = a.int_IdUsuario AND a.int_IdInstitucion = '. $profesor[0]->int_IdInstitucion);

        foreach ($datos as $key) {
            $calificacion['clave_calificacion'] = $key->int_IdCalificacion;
            $calificacion['clave_curso']        = $key->vch_NombreCurso;
            $calificacion['clave_alumno']       = $key->vch_Nombre;
            $calificacion['calificacion']       = $key->flt_Calificacion;
            $calificacion['aciertos']           = $key->int_Aciertos;
            $calificacion['errores']            = $key->int_Errores;
            array_push($calificaciones, $calificacion);
        }
        return json_encode(array('data' => $calificaciones));
    }

    public function create_teacher()
    {
        
    }


    public function update_teacher()
    {
        
    }

    public function delete_teacher()
    {
        
    }
}
