<?php

namespace App\Components;

use PDO;
use PDOStatement;

class Database
{
    private PDO $conn;

    public function __construct()
    {
        $dns = 'mysql:host=db;port=3306;dbname=db;charset=utf8mb4;user=db;password=db';
        $this->conn = new PDO($dns);
    }

    public function query(string $query): PDOStatement
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
