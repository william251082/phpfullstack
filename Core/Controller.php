<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 10:47
 */

namespace Core;


abstract class Controller
{
    protected $route_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }
}
