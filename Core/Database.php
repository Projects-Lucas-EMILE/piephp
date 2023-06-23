<?php

namespace Core;

use PDO;

class Database
{
    private $pdo;

    function connect_to_db()
    {
        if ($this->pdo === null) {
            $this->pdo = new PDO("mysql:host=localhost;dbname=cinema_piephp", "root", "root");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    public function lastInsertId()
    {
        return $this->lastInsertId();
    }
}
