<?php

namespace DivisionEstudios\Models;

use Illuminate\Database\Eloquent\Model;

class Sinodal extends Model
{
    protected $table    = 'sinodales';
    protected $fillable = [
        'nombramiento_id', 'maestro_id', 'tipo',
    ];

    public function nombramiento()
    {
        return $this->belongsTo(Nombramiento::class, 'nombramiento_id');
    }

    public function maestro()
    {
        return $this->belongsTo(Maestro::class, 'maestro_id');
    }
}
