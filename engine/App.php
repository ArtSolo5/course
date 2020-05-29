<?php


namespace Engine;

use Engine\Core\Controller;
use Engine\Core\Router\Router;

class App
{
    /**
     * @var Controller
     */
    private $controller;

    /**
     * @var string
     */
    private $action;

    /**
     * @var array
     */
    private $parameters;

    /**
     * App constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->controller = $config['controller'];
        $this->action     = $config['action'];
        $this->parameters = $config['parameters'];
    }

    /**
     * Run the application
     */
    public function run()
    {
        try {

            call_user_func_array(
                [$this->controller, $this->action], $this->parameters
            );

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}