<?php

namespace DivisionEstudios\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table    = 'carreras';
    protected $fillable = [
        'descripcion', 'grado', 'jefe_departamento_id', 'id',
    ];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'carrera_id');
    }

    public function nombramientos()
    {
        return $this->hasMany(Nombramiento::class, 'carrera_id');
    }

    public function jefeDepartamento()
    {
        return $this->belongsTo(JefeDepartamento::class, 'jefe_departamento_id');
    }

    public function modulos()
    {
        return $this->belongsToMany(Modulo::class, 'carrera_modulo', 'carrera_id', 'modulo_id');
    }
}
