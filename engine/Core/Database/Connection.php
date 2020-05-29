<?php


namespace Engine\Core\Database;


interface Connection
{
    public function connect();
    public function execute(string $sql, array $values = []): bool;
    public function query(string $sql , array $values = [], int $statement = PDO::FETCH_ASSOC);
}