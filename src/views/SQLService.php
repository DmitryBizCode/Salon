<?php

namespace App\views;
use PDO;
use PDOException;

class SQLService
{
    private PDO $pdo;

    public function __construct(string $host = 'my-mysql', string $user = 'root', string $pass = 'root', string $db = 'salon', int $port = 3306)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
        } catch (PDOException $e) {
            echo "Error access to database: " . $e->getMessage();
        }
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

}