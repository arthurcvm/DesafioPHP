<?php

namespace App\Model;

class Connection
{
    private static $instance;

    public static function getConn()
    {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO('pgsql:host=localhost;port=54320;dbname=desafio;user=homestead;password=secret');
        }

        return self::$instance;
    }
}
