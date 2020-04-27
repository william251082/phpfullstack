<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 13:36
 */

namespace Core;

use PDO;
use PDOException;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null)
        {
            $host = 'localhost';
            $dbname = 'mvc';
            $username = 'root';
            $password = '';

            try {
                $db = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password
                );

                return $db;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
