<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\CategoriasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\conocenosController;
use App\Http\Controllers\CombosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\HistorialPagosController;
use App\Http\Controllers\InstitucionesController;
use App\Http\Controllers\MetodosPagoController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\SexosController;
use App\Http\Controllers\UsuariosController;

Route::get('/', [inicioController::class, 'inicio']);//Cargar vista de inicio
Route::get('/inicio', [inicioController::class, 'inicio']);//Cargar vista de inicio
Route::get('/conocenos', [conocenosController::class, 'index']);//Cargar vista de conocenos
Route::GET('/inicio/combo_municipios/{id_estado}/{id_municipio}', [CombosController::class, 'combo_municipios']);//Cargar combo de municipios
Route::GET('/inicio/combo_localidades/{id_estado}/{id_municipio}/{id_localidad}', [CombosController::class, 'combo_localidades']);//Cargar combo de localidades

Auth::routes();
//rutas para logueado
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        //usuario administrador
        if (auth()->user()->int_IdTipoUsuario == 1) { //compara si el rol es administrador
            return redirect('admin/inicio'); //redirecciona a la carpeta para administrador
        }
        //usuario instituto
        elseif (auth()->user()->int_IdTipoUsuario == 2) { //compara si el rol es usuario instituto
            return redirect('institute/inicio'); //redirecciona a la carpeta para el usuario instituto
        }
        //usuario maestro
        elseif (auth()->user()->int_IdTipoUsuario == 3) { //compara si el rol es usuario maestro
            return redirect('teacher/inicio'); //redirecciona a la carpeta para el usuario maestro
        }
        //usuario estudiante
        elseif (auth()->user()->int_IdTipoUsuario == 4) { //compara si el rol es usuario estudiante
            return redirect('student/inicio'); //redirecciona a la carpeta para el usuario estudiante
        }
    }); 
});

//rutas para administrador
Route::middleware(['auth', 'soloadmin'])->group(function () {
    //***********************************************************************************************
    Route::get('admin/inicio', [inicioController::class, 'inicio_admin']);//Carga la pagina de inicio de admin
    //********************************************************************************************
    Route::get('admin/categorias/', [CategoriasController::class, 'index_admin']);//Cargar vista de categorias admin
    Route::get('admin/categorias/cargar_tabla', [CategoriasController::class, 'show_admin']);//Cargar tabla de categorias admin
    Route::get('admin/categorias/insertar/{nombre}/{activo}', [CategoriasController::class, 'create_admin']);//Insertar categorias admin
    Route::get('admin/categorias/modificar/{id}/{nombre}/{activo}', [CategoriasController::class, 'update_admin']);//Modificar categorias admin
    Route::get('admin/categorias/eliminar/{id}', [CategoriasController::class, 'delete_admin']);//Eliminar categorias admin
    //********************************************************************************************    
    Route::get('admin/historial_pagos/', [HistorialPagosController::class, 'index_admin']);//Cargar vista de historial de pagos admin
    Route::get('admin/historial_pagos/cargar_tabla', [HistorialPagosController::class, 'show_admin']);//Cargar tabla de historial de pagos admin
    //********************************************************************************************    
    Route::get('admin/usuarios/', [UsuariosController::class, 'index_admin']);//Cargar vista de usuarios admin
    Route::get('admin/usuarios/cargar_tabla', [UsuariosController::class, 'show_admin']);//Cargar tabla de usuarios admin
    Route::get('admin/usuarios/insertar/{nombre}/{AP}/{AM}/{correo}/{telefono}/{curp}/{id_sexo}/{id_estado}/{id_municipio}/{id_localidad}/{calle}/{colonia}/{codigo_postal}/{pass}/{pregunta}/{respuesta}/{acceso}/{profesor}/{semestre}/{grupo}/{institucion}/{tipo_usuario}', [UsuariosController::class, 'create_admin']);//Insertar usuarios admin
    Route::get('admin/usuarios/modificar/{id}/{nombre}/{AP}/{AM}/{correo}/{telefono}/{curp}/{id_sexo}/{id_estado}/{id_municipio}/{id_localidad}/{calle}/{colonia}/{codigo_postal}/{pregunta}/{respuesta}/{acceso}/{profesor}/{semestre}/{grupo}/{institucion}/{tipo_usuario}', [UsuariosController::class, 'update_admin']);//Modificar usuarios admin
    Route::get('admin/usuarios/eliminar/{id}/{tipo_usuario}', [UsuariosController::class, 'delete_admin']);//Eliminar usuarios admin
    Route::get('admin/usuarios/combo_municipios/{id_estado}/{id_municipio}', [CombosController::class, 'combo_municipios']);//Combo municipio admin
    Route::get('admin/usuarios/combo_localidades/{id_estado}/{id_municipio}/{id_localidad}', [CombosController::class, 'combo_localidades']);//Combo localidad admin
    Route::get('admin/usuarios/combo_profesor/{id_profesor}/{id_institucion}/{id_tipousuario}', [CombosController::class, 'combo_profesor']);//Combo profesor admin
    //********************************************************************************************    
    Route::get('admin/empleados/', [EmpleadosController::class, 'index_admin']);//Cargar vista de empleados admin
    Route::get('admin/empleados/cargar_tabla', [EmpleadosController::class, 'show_admin']);//Cargar tabla de empleados admin
    Route::POST('admin/empleados/guardar', [EmpleadosController::class, 'save_admin'])->name('save.empleado.admin');//Guardar empleados admin
    Route::GET('admin/empleados/guardar', [EmpleadosController::class, 'save_admin'])->name('save.empleado.admin');//Guardar empleados admin
    Route::get('admin/empleados/eliminar/{id}', [EmpleadosController::class, 'delete_admin']);//Eliminar empleados admin
    Route::get('admin/empleados/combo_municipios/{id_estado}/{id_municipio}', [CombosController::class, 'combo_municipios']);//Combo municipio admin
    Route::get('admin/empleados/combo_localidades/{id_estado}/{id_municipio}/{id_localidad}', [CombosController::class, 'combo_localidades']);//Combo localidad admin
    //********************************************************************************************    
    Route::get('admin/instituciones/', [InstitucionesController::class, 'index_admin']);//Cargar vista instituciones admin
    Route::get('admin/instituciones/cargar_tabla', [InstitucionesController::class, 'show_admin']);//Cargar tabla de instituciones admin
    Route::get('admin/instituciones/modificar/{id}/{estado}/{municipio}/{localidad}/{nombre}/{correo}/{telefono}/{clave_institucional}/{calle}/{colonia}/{CP}/{nivel_escolar}/{turno}/{acceso}', [InstitucionesController::class, 'update_admin']);//Modificar institucion admin
    Route::get('admin/instituciones/combo_municipios/{id_estado}/{id_municipio}', [CombosController::class, 'combo_municipios']);//Combo municipio admin
    Route::get('admin/instituciones/combo_localidades/{id_estado}/{id_municipio}/{id_localidad}', [CombosController::class, 'combo_localidades']);//Combo localidad admin
    Route::get('admin/instituciones/eliminar/{id}', [InstitucionesController::class, 'delete_admin']);//Eliminar institucion admin
    //********************************************************************************************    
    Route::get('admin/cursos/', [CursosController::class, 'index_admin']);//Cargar vista cursos admin
    Route::get('admin/cursos/cargar_tabla', [CursosController::class, 'show_admin']);//Cargar tabla de cursos admin
    Route::get('admin/cursos/insertar/{nombre}/{descripcion}/{categoria}', [CursosController::class, 'create_admin']);//Insertar cursos admin
    Route::get('admin/cursos/modificar/{id}/{nombre}/{descripcion}/{categoria}', [CursosController::class, 'update_admin']);//Modificar cursos admin
    Route::get('admin/cursos/eliminar/{id}', [CursosController::class, 'delete_admin']);//Eliminar cursos admin
    //********************************************************************************************    
    Route::get('admin/metodos_pago/', [MetodosPagoController::class, 'index_admin']);//Cargar vista metodos de pago admin
    Route::get('admin/metodos_pago/cargar_tabla', [MetodosPagoController::class, 'show_admin']);//Cargar tabla de metodos de pago admin
    Route::get('admin/metodos_pago/insertar/{nombre}', [MetodosPagoController::class, 'create_admin']);//Insertar metodos de pago admin
    Route::get('admin/metodos_pago/modificar/{id}/{nombre}', [MetodosPagoController::class, 'update_admin']);//Modificar metodos de pago admin
    Route::get('admin/metodos_pago/eliminar/{id}', [MetodosPagoController::class, 'delete_admin']);//Eliminar metodos de pago admin
    //********************************************************************************************    
    Route::get('admin/sexos/', [SexosController::class, 'index_admin']);//Cargar vista sexo admin
    Route::get('admin/sexos/cargar_tabla', [SexosController::class, 'show_admin']);//Cargar tabla sexo admin
    Route::get('admin/sexos/insertar/{nombre}/{activo}', [SexosController::class, 'create_admin']);//Insertar sexo admin
    Route::get('admin/sexos/modificar/{id}/{nombre}/{activo}', [SexosController::class, 'update_admin']);//Modificar sexo admin
    Route::get('admin/sexos/eliminar/{id}', [SexosController::class, 'delete_admin']);//Eliminar sexo admin
    //********************************************************************************************    
});

//rutas para instituciones (terminado)
Route::middleware(['auth', 'soloinstitute'])->group(function () {
    //***********************************************************************************************
    Route::get('institute/inicio', [inicioController::class, 'inicio_institute']);//Carga la pagina de inicio de instituto
    //********************************************************************************************
    Route::get('institute/profesores', [ProfesoresController::class, 'index_institute']);//Cargar vista de profesores de instituto
    Route::get('institute/profesores/cargar_tabla', [ProfesoresController::class, 'show_institute']);//Cargar tabla de profesores de instituto
    Route::get('institute/profesores/insertar/{nombre}/{AP}/{AM}/{correo}/{telefono}/{curp}/{id_sexo}/{id_estado}/{id_municipio}/{id_localidad}/{calle}/{colonia}/{codigo_postal}/{pass}/{pregunta}/{respuesta}/{acceso}', [ProfesoresController::class, 'create_institute']);//Insertar profesores de instituto
    Route::get('institute/profesores/modificar/{id}/{nombre}/{AP}/{AM}/{correo}/{telefono}/{curp}/{id_sexo}/{id_estado}/{id_municipio}/{id_localidad}/{calle}/{colonia}/{codigo_postal}/{pregunta}/{respuesta}/{acceso}', [ProfesoresController::class, 'update_institute']);//Actualizar profesores de instituto
    Route::get('institute/profesores/eliminar/{id}', [ProfesoresController::class, 'delete_institute']);//Eliminar profesores de instituto
    Route::get('institute/profesores/combo_municipios/{id_estado}/{id_municipio}', [CombosController::class, 'combo_municipios']);//Cargar combo de municipios
    Route::get('institute/profesores/combo_localidades/{id_estado}/{id_municipio}/{id_localidad}', [CombosController::class, 'combo_localidades']);//Cargar combo de localidades
    //********************************************************************************************
    Route::get('institute/alumnos', [AlumnosController::class, 'index_institute']);//Cargar vista de alumnos de instituto
    Route::get('institute/alumnos/cargar_tabla', [AlumnosController::class, 'show_institute']);//Cargar tabla de alumnos de instituto
    Route::get('institute/alumnos/insertar/{nombre}/{AP}/{AM}/{correo}/{telefono}/{curp}/{id_sexo}/{id_estado}/{id_municipio}/{id_localidad}/{calle}/{colonia}/{codigo_postal}/{pass}/{pregunta}/{respuesta}/{acceso}/{profesor}/{semestre}/{grupo}', [AlumnosController::class, 'create_institute']);//Insertar alumnos de instituto
    Route::get('institute/alumnos/modificar/{id}/{nombre}/{AP}/{AM}/{correo}/{telefono}/{curp}/{id_sexo}/{id_estado}/{id_municipio}/{id_localidad}/{calle}/{colonia}/{codigo_postal}/{pregunta}/{respuesta}/{acceso}/{profesor}/{semestre}/{grupo}', [AlumnosController::class, 'update_institute']);//Actualizar alumnos de instituto
    Route::get('institute/alumnos/eliminar/{id}', [AlumnosController::class, 'delete_institute']);//Eliminar alumnos de instituto
    Route::get('institute/profesores/combo_municipios/{id_estado}/{id_municipio}', [CombosController::class, 'combo_municipios']);//Cargar combo de municipios
    Route::get('institute/profesores/combo_localidades/{id_estado}/{id_municipio}{id_localidad}', [CombosController::class, 'combo_localidades']);//Cargar combo de localidades
    //********************************************************************************************
    Route::get('institute/suscripcion', [HistorialPagosController::class, 'index_institute']);//Cargar vista de suscripcion de instituto
    Route::get('institute/suscripcion/cargar_tabla', [HistorialPagosController::class, 'show_institute']);//Cargar tabla de suscripcion de instituto
    Route::get('institute/suscripcion/insertar/{paquete}', [HistorialPagosController::class, 'create_institute']);//Insertar suscripcion de instituto
    //********************************************************************************************
});

//rutas para maestros
Route::middleware(['auth', 'soloteacher'])->group(function () {
    //***********************************************************************************************
    Route::get('teacher/inicio', [inicioController::class, 'inicio_teacher']);//Carga la pagina de inicio de maestro
    //********************************************************************************************
    Route::get('teacher/alumnos', [AlumnosController::class, 'index_teacher']);//Cargar la vista alumnos teacher
    Route::get('teacher/alumnos/cargar_tabla', [AlumnosController::class, 'show_teacher']);//Cargar la vista alumnos teacher
    Route::get('teacher/alumnos/insertar/{nombre}/{AP}/{AM}/{correo}/{telefono}/{curp}/{id_sexo}/{id_estado}/{id_municipio}/{id_localidad}/{calle}/{colonia}/{codigo_postal}/{pass}/{pregunta}/{respuesta}/{acceso}/{profesor}/{semestre}/{grupo}', [AlumnosController::class, 'create_teacher']);//Cargar la vista alumnos teacher
    Route::get('teacher/alumnos/modificar/{id}/{nombre}/{AP}/{AM}/{correo}/{telefono}/{curp}/{id_sexo}/{id_estado}/{id_municipio}/{id_localidad}/{calle}/{colonia}/{codigo_postal}/{pregunta}/{respuesta}/{acceso}/{profesor}/{semestre}/{grupo}', [AlumnosController::class, 'update_teacher']);//Cargar la vista alumnos teacher
    Route::get('teacher/alumnos/eliminar/{id}', [AlumnosController::class, 'delete_teacher']);//Eliminar alumnos de instituto
    Route::get('teacher/alumnos/combo_municipios/{id_estado}/{id_municipio}', [CombosController::class, 'combo_municipios']);//Cargar combo de municipios
    Route::get('teacher/alumnos/combo_localidades/{id_estado}/{id_municipio}/{id_localidad}', [CombosController::class, 'combo_localidades']);//Cargar combo de localidades
    //********************************************************************************************
    Route::get('teacher/calificaciones', [CalificacionesController::class, 'index_teacher']);//Cargar la vista calificaciones teacher
    Route::get('teacher/calificaciones/cargar_tabla', [CalificacionesController::class, 'show_teacher']);//Cargar la tabla de calificaciones teacher
    //********************************************************************************************
});

//rutas para estudiantes
Route::middleware(['auth', 'solostudent'])->group(function () {
    //***********************************************************************************************
    Route::get('student/inicio', [inicioController::class, 'inicio_student']);//Carga la pagina de inicio de estudiante
    //********************************************************************************************
});