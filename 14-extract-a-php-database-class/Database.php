<?php

class Database
{
    private $dsn = "mysql:host=127.0.0.1;port=3306;dbname=php;charset=utf8mb4;user=root";
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO($this->dsn);
    }

    public function query(string $query)
    {
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}