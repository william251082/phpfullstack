<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 12:07
 */

namespace Core;


class View
{
    public static function render($view)
    {
        $file = "../App/Views/$view"; // Relative to Core directory

        if (is_readable($file)) {
            require $file;
        }
        else {
            echo "$file not found";
        }
    }
}
