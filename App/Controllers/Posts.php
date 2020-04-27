<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 9:54
 */

namespace App\Controllers;

use App\Models\Post;
use Core\Controller;
use Core\View;

class Posts extends Controller
{
    public function indexAction(): void
    {
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', [
            'posts' => $posts
        ]);
    }

    public function addNewAction(): void
    {
        echo 'Hello from the addNew action Post controller';
    }

    public function editAction()
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>' .
            htmlspecialchars(print_r($this->route_params, true)) . '</pre><p>';
    }
}
