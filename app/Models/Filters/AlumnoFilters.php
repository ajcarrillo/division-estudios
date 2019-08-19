<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-19
 * Time: 00:01
 */

namespace DivisionEstudios\Models\Filters;


use DivisionEstudios\Classes\QueryFilter;

class AlumnoFilters extends QueryFilter
{

    public function rules(): array
    {
        return [
            'numero_control'  => 'filled',
            'sinNombramiento' => 'present',
        ];
    }

    public function numero_control($query, $numero_control)
    {
        $query->where('numero_control', $numero_control);
    }

    public function sinNombramiento($query)
    {
        $query->doesntHave('nombramiento');
    }
}
