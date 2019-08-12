<?php

namespace DivisionEstudios\Models;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    protected $table = 'opciones_titulacion';

    public function modulos()
    {
        return $this->belongsToMany(Modulo::class, 'modulo_titulacion_opcion_titulacion', 'opcion_titulacion_id', 'modulo_id');
    }

    public function generaciones()
    {
        return $this->belongsToMany(Generacion::class, 'generacion_opcion', 'opcion_titulacion_id', 'generacion_id');
    }
}
