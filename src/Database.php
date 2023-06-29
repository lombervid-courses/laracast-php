<?php

declare(strict_types=1);

namespace App;

use PDO;
use PDOStatement;

class Database
{
    private PDO $connection;
    private PDOStatement $statement;

    public function __construct(array $config, string $username, string $password)
    {
        $dns = 'mysql:' . http_build_query($config, arg_separator: ';');

        $this->connection = new PDO($dns, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
    }

    public function query(string $query, array $params = []): static
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function get(): array
    {
        return $this->statement->fetchAll();
    }

    public function find(): mixed
    {
        return $this->statement->fetch();
    }

    public function findOrFail(): mixed
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }
}
