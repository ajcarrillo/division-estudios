<?php

namespace DivisionEstudios\Models;

use DivisionEstudios\Traits\FilterBy;
use Illuminate\Database\Eloquent\Model;

class Nombramiento extends Model
{
    use FilterBy;

    protected $table    = 'nombramientos';
    protected $fillable = [
        'numero_memo_id',
        'numero_oficio',
        'alumno_id',
        'opcion_id',
        'modulo_id',
        'proyecto',
        'fecha',
        'horario_id',
        'estatus',
    ];
    protected $dates    = [
        'fecha',
    ];
    protected $casts    = [
        'fecha' => 'datetime:Y-m-d',
    ];

    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'fileable');
    }

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
