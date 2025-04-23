<?php

namespace App\Connection;

class Db
{

    public static function get(): \mysqli
    {
        ini_set('mysql.connect_timeout', 300);
        return  new \mysqli($_ENV['DB_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);
    }
}
