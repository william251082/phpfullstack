<?php

namespace App\Controllers\Admin;

use Core\Controller;

class Users extends Controller
{
    protected function before()
    {
        // Make sure an admin user is logged in for example
         return false;
    }

    public function indexAction()
    {
        echo 'User admin index';
    }
}
