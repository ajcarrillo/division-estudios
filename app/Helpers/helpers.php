<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-11
 * Time: 21:43
 */
if ( ! function_exists('get_current_api_user')) {
    function get_current_api_user()
    {
        $user = Auth::guard('api')->user();

        return $user;
    }
};
