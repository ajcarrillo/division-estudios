<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-18
 * Time: 19:48
 */

namespace DivisionEstudios\Models\Filters;


use DivisionEstudios\Classes\QueryFilter;

class HorarioFilters extends QueryFilter
{

    public function rules(): array
    {
        return [
            'fecha' => 'filled',
        ];
    }

    public function fecha($query, $fecha)
    {
        $query->whereDoesntHave('nombramientos', function ($query) use ($fecha) {
            $query->where('fecha', $fecha);
        });
    }
}
