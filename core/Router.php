<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 9:12
 */

class Router
{
    protected $routes = [];

    public function add($routes, $params): void
    {
        $this->routes = $params;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}
