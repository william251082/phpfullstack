<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 10:21
 */

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Home extends Controller
{
    public function indexAction()
    {
        View::render('Home/index.php', [
            'name' => 'Will',
            'colours' => ['red', 'green', 'blue']
        ]);
    }

    protected function before()
    {
    }

    protected function after()
    {
    }
}
