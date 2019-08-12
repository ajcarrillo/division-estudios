<?php

namespace DivisionEstudios\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Generacion extends Model
{
    protected $table    = 'generaciones';
    protected $fillable = [
        'inicio', 'fin',
    ];

    public static function byYear($year = NULL)
    {
        $generacion = DB::table('generaciones')
            ->whereRaw($year . " BETWEEN substr(inicio, 3, 2) and substr(fin, 3, 2)")
            ->first();

        if (is_null($generacion)) {
            $generacion = DB::table('generaciones')
                ->where('id', 1)
                ->first();
        }

        return $generacion;
    }

    public function opciones()
    {
        return $this->belongsToMany(Opcion::class, 'generacion_opcion', 'generacion_id', 'opcion_id');
    }
}
