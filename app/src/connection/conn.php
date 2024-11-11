<?php

namespace App;

class Connection
{
    static function get(): \PDO
    {
        $host = $_ENV['DB_HOST'];
        $db = $_ENV['MYSQL_DATABASE'];

        return new \PDO("mysql:host=$host;dbname=$db", $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD']);
    }
}
