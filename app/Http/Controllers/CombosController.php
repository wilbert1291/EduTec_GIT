<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CombosController extends Controller
{
    public function combo_municipios(Request $request, $id_estado, $id_municipio){
        $municipios = DB::table('tbl_municipios')->where('chrClvEdo','=', $id_estado)->get();
        foreach ($municipios as $municipio) {
            if($id_municipio == $municipio->chrNumMunicipio){
                echo "<option value=" . $municipio->chrNumMunicipio . " selected>" . $municipio->vchNomMunicipio . "</option>";
            } else {
                echo "<option value=" . $municipio->chrNumMunicipio . ">" . $municipio->vchNomMunicipio . "</option>";
            }
            
        }
    }

    public function combo_localidades(Request $request, $id_estado, $id_municipio, $id_localidad){
        $localidades = DB::table('tbl_localidades')->where('chrClvEdo','=',$id_estado)->where('chrClvMunicipio', '=', $id_municipio)->get();
        foreach ($localidades as $localidad) {
            if($id_localidad == $localidad->chrClvLocalidad){
                echo "<option value=" . $localidad->chrClvLocalidad . " selected>" . $localidad->vchNomLocalidad . "</option>";
            } else {
                echo "<option value=" . $localidad->chrClvLocalidad . ">" . $localidad->vchNomLocalidad . "</option>";
            }
        }
    }

    public function combo_profesor(Request $request, $id_profesor, $id_institucion, $id_tipousuario){


       if($id_tipousuario == 3){
            $profesores = DB::select('SELECT * FROM users u, tbl_profesores p WHERE u.int_IdUsuario = p.int_IdUsuario AND p.int_IdInstitucion =' . $id_institucion);
        } else {
            $profesores = DB::select('SELECT * FROM users u, tbl_profesores p WHERE u.int_IdUsuario = p.int_IdUsuario AND p.`int_IdInstitucion` = '. $id_institucion .' AND p.`int_IdUsuario` != ' . $id_profesor);
        }

        
        foreach ($profesores as $profesor) {
            if($id_profesor == $profesor->int_IdProfesor){
                echo "<option value=" . $profesor->int_IdProfesor . " selected>" . $profesor->name . "</option>";
            } else {
                echo "<option value=" . $profesor->int_IdProfesor . ">" . $profesor->name . "</option>";
            }
            
        }
    }
}
