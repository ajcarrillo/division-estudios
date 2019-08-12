<?php

namespace DivisionEstudios\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';

    public function nombramientos()
    {
        return $this->hasMany(Nombramiento::class, 'horario_id');
    }
}
