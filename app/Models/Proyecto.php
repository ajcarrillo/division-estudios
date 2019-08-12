<?php

namespace DivisionEstudios\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table    = 'proyectos';
    protected $fillable = [ 'descripcion' ];

    public function nombramientos()
    {
        return $this->belongsToMany(Nombramiento::class, 'nombraminto_proyecto', 'proyecto_id', 'nombramiento_id');
    }
}
