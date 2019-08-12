<?php

namespace DivisionEstudios\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class NumeroOficio extends Model
{
    protected $table    = 'numero_oficios';
    protected $fillable = [
        'numero_oficio', 'activo', 'year',
    ];

    public static function getNumeroOficio()
    {
        $year = Carbon::now()->year;

        return NumeroOficio::where('activo', 1)
            ->where('year', $year)
            ->first();
    }

    public function nombramiento()
    {
        return $this->hasOne(Nombramiento::class, 'numero_memo_id');
    }
}
