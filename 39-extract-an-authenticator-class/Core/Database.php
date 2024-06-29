<?php

namespace Core;

use PDO;

class Database
{
    private $connection;
    private $statement;

    public function __construct(array $config, string $username = 'root', string $password = '')
    {
        $this->connection = new PDO(
            'mysql:' . http_build_query($config, '', ';'),
            $username,
            $password,
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    public function query(string $query, array $params = []): Database
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function find(): array|false
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->statement->fetch();

        if (!$result) {
            abort();
        }

        return $result;
    }

    public function get(): array|false
    {
        return $this->statement->fetchAll();
    }
}
