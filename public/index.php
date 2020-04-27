<?php
echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"' . '<br>';

require '../core/Router.php';

$router = new Router();

echo 'Class = ' . get_class($router);
