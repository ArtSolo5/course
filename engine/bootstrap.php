<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/functions.php';

$containerBuilder = new \DI\ContainerBuilder();

$containerBuilder->addDefinitions(__DIR__ . '/Config/app.php');
$containerBuilder->addDefinitions(__DIR__ . '/Config/database.php');

$container = $containerBuilder->build();

$app = $container->get(\Engine\App::class);
$app->run();
