<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-22
 * Time: 12:30
 */

namespace DivisionEstudios\Models\Filters;


use DivisionEstudios\Classes\QueryFilter;

class MaestroFilters extends QueryFilter
{
    public function rules(): array
    {
        return [
            'paginate' => 'present',
        ];
    }
}
