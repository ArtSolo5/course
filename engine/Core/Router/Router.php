<?php

namespace Engine\Core\Router;

use Engine\Helper\Request;

class Router
{
    /**
     * @var array
     */
    private $route = [];

    /**
     * @var array
     */
    private $url;

    /**
     * @var Request
     */
    private $request;

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->url     = $this->request->url();

        $this->route = [
            'controller' => ENV . '\\Controller\\HomeController',
            'action'     => 'index',
            'parameters' => []
        ];

        try {
            $this->setController()
                 ->setAction()
                 ->setParameters();
        } catch (RouterException $e) {
            $this->route = [
                'controller' => ENV . '\\Controller\\ErrorController',
                'action'     => 'page404',
                'parameters' => []
            ];
        }
    }

    /**
     * @return array
     */
    public function getRoute() {
        return $this->route;
    }

    /**
     * @return $this
     * @throws RouterException
     */
    private function setController()
    {
        if (isset($this->url[0])) {
            $className = ENV . '\\Controller\\' . ucfirst($this->url[0]) . 'Controller';
            if (class_exists($className)) {
                $this->route['controller'] = $className;
                unset($this->url[0]);
            } else {
                throw new RouterException(sprintf("Controller '%s' does not exist", ucfirst($this->url[0]).'Controller'));
            }
        }
        return $this;
    }

    /**
     * @return $this
     */
    private function setAction()
    {
        if (isset($this->url[1])) {
            if (method_exists($this->route['controller'], $this->url[1])) {
                $this->route['action'] = $this->url[1];
                unset($this->url[1]);
            }
        }
        return $this;
    }

    private function setParameters()
    {
        $this->route['parameters'] = $this->url ? array_values($this->url) : [];
    }
}