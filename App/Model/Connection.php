<?php

namespace App\Model;

class Connection
{
    private static $instance;

    public static function getConn()
    {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO('pgsql:host=127.0.0.1;port=5432;dbname=desafio;user=homestead;password=secret');

            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$instance;
    }
}
