<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-18
 * Time: 19:41
 */

namespace DivisionEstudios\Traits;


use DivisionEstudios\Classes\QueryFilter;

trait FilterBy
{
    public function scopeFilterBy($query, QueryFilter $filters, array $data)
    {
        return $filters->applyTo($query, $data);
    }
}
