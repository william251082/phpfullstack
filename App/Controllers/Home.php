<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 10:21
 */

namespace App\Controllers;

use Core\Controller;

class Home extends Controller
{
    public function index()
    {
        echo 'Hello from the index action in the Home controller';
        echo '<p>Query string parameters: <pre>' .
            htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }
}
