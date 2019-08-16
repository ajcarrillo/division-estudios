<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-16
 * Time: 07:19
 */

namespace DivisionEstudios\Models;


use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table   = 'archivos';
    protected $guarded = [];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'documento_id');
    }
}
