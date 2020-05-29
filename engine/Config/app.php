<?php

use Engine\App;
use Psr\Container\ContainerInterface;
use Engine\Helper\Request;
use Engine\Core\Router\Router;
use Engine\Core\Controller;

return [
    Router::class => DI\factory( function (ContainerInterface $c) {
        return new Router(
            $c->get(Request::class)
        );
    }),

    Controller::class => DI\factory(function (ContainerInterface $c) {
        $router = $c->get(Router::class);
        $controller =  $router->getRoute()['controller'];
        return $c->get($controller);
    }),

    'app_config' => [
        'controller' => DI\factory(function (ContainerInterface $c) {
            return $c->get(Controller::class);
        }),
        'action' => DI\factory(function (ContainerInterface $c) {
            $router = $c->get(Router::class);
            return $router->getRoute()['action'];
        }),
        'parameters' => DI\factory(function (ContainerInterface $c) {
            $router = $c->get(Router::class);
            return $router->getRoute()['parameters'];
        })
    ],

    App::class => DI\factory(function (ContainerInterface $c) {
        return new App(
            $c->get('app_config')
        );
    })
];
