<?php

require '../core/Router.php';

$router = new Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');

echo '<pre>';
//	var_dump($router->getRoutes());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '<pre>';

