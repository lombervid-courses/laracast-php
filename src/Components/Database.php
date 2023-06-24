<?php

namespace App\Components;

use PDO;
use PDOStatement;

class Database
{
    private PDO $conn;

    public function __construct(array $config, string $username, string $password)
    {
        $dns = 'mysql:' . http_build_query($config, arg_separator: ';');

        $this->conn = new PDO($dns, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
    }

    public function query(string $query): PDOStatement
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
