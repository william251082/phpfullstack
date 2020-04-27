<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 12:07
 */

namespace Core;


use Exception;

class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view"; // Relative to Core directory

        if (is_readable($file)) {
            require $file;
        }
        else {
            throw new Exception("$file not found");
        }
    }

    public static function renderTemplate($template, $args=[])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/App/Views');
            $twig   = new \Twig\Environment($loader);
            echo $twig->render($template, $args);
        }
        else {
            echo $twig->render($template, $args);
        }
    }
}
