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
    protected $params = [];

    public function add($route, $params): void
    {
        $this->routes[$route] = $params;
    }

    public function match($url): bool
    {
        $reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";

        if (preg_match($reg_exp, $url, $matches)) {
            $params = [];
            foreach ($matches as $key => $match) {
                if (is_string($key)) {
                    $params[$key] = $match;
                }
            }
            $this->params = $params;

            return true;
        }

        return false;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}
