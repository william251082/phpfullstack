<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 9:12
 */

namespace Core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function add($route, $params=[]): void
    {
        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z])\}/', '(?P</1>[a-z]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    public function match($url): bool
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;

                return true;
            }
        }

        return false;
    }

    public function dispatch($url): void
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = "App\Controllers\\$controller";

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);
                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                }
                else {
                    echo "Method $action (in controller $controller) not found";
                }
            }
        }
        else {
            echo "No route matched";
        }
    }

    private function removeQueryStringVariables($url): string
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            }
            else {
                $url = '';
            }
        }

        return $url;
    }

    /**
     * Convert the string with hyphens to StudlyCaps,
     * e.g. post-authors => PostAuthors
     *
     * @param string $string The string to convert
     *
     * @return string
     */
    private function convertToStudlyCaps($string): string
    {
        return str_replace(
        ' ', '', ucwords(str_replace('-', ' ', $string))
        );
    }

    /**
     * Convert the string with hyphens to camelCase,
     * e.g. add-new => addNew
     *
     * @param string $string The string to convert
     *
     * @return string
     */
    private function convertToCamelCase($string): string
    {
        return lcfirst($this->convertToStudlyCaps($string));
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
