<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preguntas_respuestas extends Model
{
    use HasFactory;

    protected $table = 'tbl_preguntas_respuestas';
    protected $primaryKey = 'int_IdPregunta';
    protected $fillable = ['int_IdPregunta', 'int_IdCurso', 'vch_Pregunta', 'vch_Resp1', 'vch_Resp2', 'vch_Resp3', 'vch_Resp4', 'vch_RespuestaCorrecta'];
}
