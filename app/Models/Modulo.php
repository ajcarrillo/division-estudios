<?php

namespace DivisionEstudios\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos_titulacion';

    public function opciones()
    {
        return $this->belongsToMany(Opcion::class, 'modulo_titulacion_opcion_titulacion', 'modulo_id', 'opcion_titulacion_id')->withPivot('id');
    }

    public function carreras()
    {
        return $this->belongsToMany(Carrera::class, 'carrera_modulo', 'modulo_id', 'carrera_id')->withPivot('id');
    }
}
