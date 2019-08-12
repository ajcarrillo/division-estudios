<?php

namespace DivisionEstudios\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table    = 'alumnos';
    protected $fillable = [
        'numero_control', 'nombre_completo', 'sexo', 'carrera_id',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function nombramiento()
    {
        return $this->hasOne(Nombramiento::class, 'alumno_id');
    }
}
