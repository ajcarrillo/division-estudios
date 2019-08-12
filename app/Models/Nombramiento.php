<?php

namespace DivisionEstudios\Models;

use Illuminate\Database\Eloquent\Model;

class Nombramiento extends Model
{
    protected $table   = 'nombramientos';
    protected $guarded = [];
    protected $dates   = [
        'fecha',
    ];

    public function memo()
    {
        return $this->belongsTo(NumeroOficio::class, 'numero_memo_id');
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }

    public function opcion()
    {
        return $this->belongsTo(Opcion::class, 'opcion_id');
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'modulo_id');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }

    public function sinodales()
    {
        return $this->hasMany(Sinodal::class, 'nombramiento_id');
    }

    public function setProyectoAttribute($value)
    {
        $this->attributes['proyecto'] = strtoupper($value);
    }
}
