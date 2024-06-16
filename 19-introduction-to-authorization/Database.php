<?php

class Database
{
    private $connection;

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

    public function query(string $query, array $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}