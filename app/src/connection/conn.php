<?php

namespace App;

ini_set('mysql.connect_timeout', 300);

class Connection
{

    static function get(): \mysqli
    {
        return  new \mysqli($_ENV['DB_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);
    }
}
