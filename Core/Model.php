<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 13:36
 */

namespace Core;

use App\Config;
use PDO;
use PDOException;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null)
        {
            try {
                $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

                return $db;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}
