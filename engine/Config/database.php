<?php

use Psr\Container\ContainerInterface;
use Engine\Core\Database\MySQLConnection;
use Engine\Core\Database\Connection;

return [
    'database' => [
        'host'     => 'localhost',
        'name'     => 'db_course',
        'user'     => 'root',
        'password' => 'root',
        'charset'  => 'utf8'
    ],

    Connection::class => DI\Factory(function (ContainerInterface $c) {
        return new MySQLConnection($c->get('database'));
    }),
];

