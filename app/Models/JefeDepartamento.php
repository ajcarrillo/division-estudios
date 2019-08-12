<?php

namespace DivisionEstudios\Models;

use DivisionEstudios\User;
use Illuminate\Database\Eloquent\Model;

class JefeDepartamento extends Model
{
    protected $table   = 'jefes_departamentos';
    protected $guarded = [];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function carreras()
    {
        return $this->hasMany(Carrera::class, 'jefe_departamento_id');
    }
}
