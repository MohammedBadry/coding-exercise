<?php

namespace Libraries;

use PDO;

class Database
{
    private static $instance = NULL;

    public function __construct() {
        
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            //for producion
            self::$instance = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD, $pdo_options);

            //for testing
            //self::$instance = new PDO('mysql:host=localhost;dbname=task', 'root', '', $pdo_options);
        }
        return self::$instance;
    }
}
