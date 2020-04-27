<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 9:54
 */

namespace App\Controllers;

use Core\Controller;

class Posts extends Controller
{
    public function index(): void
    {
        echo 'Hello from index action Post controller';
    }

    public function addNew(): void
    {
        echo 'Hello from the addNew action Post controller';
    }

    public function edit()
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>' .
            htmlspecialchars(print_r($this->route_params, true)) . '</pre><p>';
    }
}
