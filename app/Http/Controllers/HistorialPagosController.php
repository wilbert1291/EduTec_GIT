<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\historial_pagos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialPagosController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //************************************Suscripcion-Admin******************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_admin()
    {
        return view('admin/historial_pagos');
    }

    public function show_admin()
    {
        $suscripciones = [];
        $datos = DB::select("SELECT hp.int_IdHistorialPago, u.name, mp.vch_MetodoPago, p.vch_NombrePaquete, hp.dt_FechaPago, hp.dt_FechaExpiracion FROM tbl_instituciones i, tbl_metodos_pago mp, tbl_paquetes p, tbl_historial_pagos hp, users u WHERE i.`int_IdInstitucion` = hp.`int_IdInstitucion` AND mp.`int_IdMetodoPago` = hp.`int_IdMetodoPago` AND p.`int_IdPaquete` = hp.`int_IdPaquete` AND u.`int_IdUsuario` = i.`int_IdUsuario`");
        foreach ($datos as $key) {
            $suscripcion['clave_historial'] = $key->int_IdHistorialPago;
            $suscripcion['clave_metodo_pago'] = $key->vch_MetodoPago;
            $suscripcion['clave_institucion'] = $key->name;
            $suscripcion['clave_paquete'] = $key->vch_NombrePaquete;
            $suscripcion['fecha_pago'] = $key->dt_FechaPago;
            $suscripcion['fecha_vencimiento'] = $key->dt_FechaExpiracion;
            array_push($suscripciones, $suscripcion);
        }
        return json_encode(array('data'=>$suscripciones)); 
    }


    //***********************************************************************************************
    //***********************************************************************************************
    //*************************************Suscripcion-Instituto*************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_institute()
    {
        $datos['paquetes'] = DB::table('tbl_paquetes')->get();
        return view('institute/suscripcion', $datos);
    }

    public function show_institute()
    {
        $suscripciones = [];
        $institucion = DB::table('tbl_instituciones')->where('int_IdUsuario','=',auth()->user()->int_IdUsuario)->get();
        $datos = DB::select("SELECT * FROM tbl_historial_pagos hp, tbl_metodos_pago mp, tbl_paquetes p WHERE hp.`int_IdMetodoPago` = mp.`int_IdMetodoPago` AND hp.`int_IdPaquete` = p.`int_IdPaquete` AND int_IdInstitucion = " . $institucion[0]->int_IdInstitucion . " ORDER BY int_IdHistorialPago DESC");
        foreach ($datos as $key) {
            $suscripcion['clave_historial'] = $key->int_IdHistorialPago;
            $suscripcion['nombre_metodo'] = $key->vch_MetodoPago;
            $suscripcion['nombre_paquete'] = $key->vch_NombrePaquete;
            $suscripcion['fecha_pago'] = $key->dt_FechaPago;
            $suscripcion['fecha_vencimiento'] = $key->dt_FechaExpiracion;
            $suscripcion['clave_metodo_pago'] = $key->int_IdMetodoPago;
            $suscripcion['clave_paquete'] = $key->vch_NombrePaquete;
            array_push($suscripciones, $suscripcion);
        }
        return json_encode(array('data'=>$suscripciones)); 
    }

    public function create_institute($paquete)
    {
        $fecha_expiracion = "";
        $institucion = DB::table('tbl_instituciones')->where('int_IdUsuario','=',auth()->user()->int_IdUsuario)->get();
        $suscripciones = DB::table('tbl_historial_pagos')->where('int_IdInstitucion','=', $institucion[0]->int_IdInstitucion)->orderBy('dt_FechaExpiracion', 'desc')->get();
        if ($suscripciones->count()>0) {
            $fecha_expiracion = $suscripciones[0]->dt_FechaExpiracion;
        } else {
            $fecha_expiracion = date('Y-m-d');
        }

        switch($paquete){
            case 1: 
                $fecha_expiracion = date("Y-m-d",strtotime($fecha_expiracion."+ 3 month"));
            break;

            case 2:
                $fecha_expiracion = date("Y-m-d",strtotime($fecha_expiracion."+ 6 month"));
            break;

            case 3:
                $fecha_expiracion = date("Y-m-d",strtotime($fecha_expiracion."+ 1 year"));
            break;
        }


        try{
            historial_pagos::create([
                'int_IdInstitucion' => $institucion[0]->int_IdInstitucion,
                'int_IdMetodoPago' => 1,
                'int_IdPaquete' => $paquete,
                'dt_FechaPago' => date('Y-m-d'),
                'dt_FechaExpiracion' => $fecha_expiracion,
            ]);
            return true;
        }catch(Exception $e){
            return "Ha ocurrido un error";
        }
    }  
}
