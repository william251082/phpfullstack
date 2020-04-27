<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 13:26
 */

namespace App\Models;

use PDO;
use PDOException;

class Post
{
    public static function getAll()
    {
        $host = 'localhost';
        $dbname = 'mvc';
        $username = 'root';
        $password = '';

        try {
            $db = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password
            );

            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
