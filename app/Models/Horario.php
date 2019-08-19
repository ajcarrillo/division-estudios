<?php

namespace DivisionEstudios\Models;

use DivisionEstudios\Traits\FilterBy;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use FilterBy;

    protected $table = 'horarios';

    public function nombramientos()
    {
        return $this->hasMany(Nombramiento::class, 'horario_id');
    }
}
