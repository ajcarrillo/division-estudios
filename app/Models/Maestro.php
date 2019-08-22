<?php

namespace DivisionEstudios\Models;

use DivisionEstudios\Traits\FilterBy;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use FilterBy;

    protected $table   = 'maestros';
    protected $guarded = [];
}
