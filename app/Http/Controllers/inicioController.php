<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inicioController extends Controller
{
    //Visitor
    public function inicio()
    {
        $datos['noticias'] = DB::table('tbl_noticias')->get()->take(3);
        $datos['paquetes'] = DB::table('tbl_paquetes')->get()->take(3);
        return view('visitor/inicio', $datos);
    }

    //Admin
    public function inicio_admin()
    {
        $data['instituciones'] = DB::table('tbl_instituciones');
        $data['usuarios'] = DB::table('users');
        $ganancias = DB::select("select sum(((select count(*) from tbl_historial_pagos where int_IdPaquete = 1)*600) + ((select count(*) from tbl_historial_pagos where int_IdPaquete = 2)*800) + ((select count(*) from tbl_historial_pagos where int_IdPaquete = 3) * 1200)) as total");
        $data['ganancias'] = $ganancias[0]->total;
        $data['suscripciones'] = DB::select('SELECT * FROM tbl_historial_pagos WHERE dt_FechaPago = "' . date('Y-m-d') . '"');
        return view('admin/inicio', $data);
    }

    //Institute
    public function inicio_institute()
    {
        $institucion = DB::table('tbl_instituciones')->where('int_IdUsuario', '=', auth()->user()->int_IdUsuario)->get();
        $datos['alumnos'] = DB::table('tbl_alumnos')->where('int_IdInstitucion', '=', $institucion[0]->int_IdInstitucion)->get();
        $datos['profesores'] = DB::table('tbl_profesores')->where('int_IdInstitucion', '=', $institucion[0]->int_IdInstitucion)->get();
        $suscripciones = DB::table('tbl_historial_pagos')->where('int_IdInstitucion', '=', $institucion[0]->int_IdInstitucion)->orderBy('dt_FechaExpiracion', 'desc')->get();
        if ($suscripciones->count() != 0) {
            $date = explode('-', $suscripciones[0]->dt_FechaExpiracion);
            $mes = "";
            switch ($date[1]) {
                case "01":
                    $mes = "enero";
                    break;
                case "02":
                    $mes = "febrero";
                    break;
                case "03":
                    $mes = "marzo";
                    break;
                case "04":
                    $mes = "abril";
                    break;
                case "05":
                    $mes = "mayo";
                    break;
                case "06":
                    $mes = "junio";
                    break;
                case "07":
                    $mes = "julio";
                    break;
                case "08":
                    $mes = "agosto";
                    break;
                case "09":
                    $mes = "septiembre";
                    break;
                case "10":
                    $mes = "octubre";
                    break;
                case "11":
                    $mes = "noviembre";
                    break;
                case "12":
                    $mes = "diciembre";
                    break;
            }
            if ($suscripciones[0]->dt_FechaExpiracion == date("Y-m-d")) {
                $datos['historial_pagos'] = "Su suscripcion vence hoy.";
            } else if ($suscripciones[0]->dt_FechaExpiracion < date("Y-m-d")) {
                $datos['historial_pagos'] = "Su suscripcion ha vencido.";
            }
            $datos['historial_pagos'] = $date[2] . " de " . $mes . " del " . $date[0];
        } else {
            $datos['historial_pagos'] = "No cuentas con una suscripcion activa";
        }

        return view('institute/inicio', $datos);
    }
    //Teacher
    public function inicio_teacher()
    {
        $profesor = DB::table('tbl_profesores')->where('int_IdUsuario','=', auth()->user()->int_IdUsuario)->get();
        $datos['alumnos'] = DB::table('tbl_alumnos')->where('int_IdProfesor', '=', $profesor[0]->int_IdProfesor)->get();
        return view('teacher/inicio', $datos);
    }
    //Student
    public function inicio_student()
    {
        return view('student/inicio');
    }
}
