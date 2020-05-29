<?php


namespace Engine\Core\Block;


use Engine\Core\Auth\AuthClient;
use Engine\Core\Language;
use Engine\Core\Model\ModelContainer;
use Engine\Core\View;
use Engine\Helper\Request;

abstract class BlockController
{
    protected $view;

    protected $request;

    protected $language;

    protected $model;

    protected $auth;

    public function __construct(
        View $view,
        Request $request,
        Language $language,
        ModelContainer $model,
        AuthClient $auth
    ) {
        $this->view     = $view;
        $this->request  = $request;
        $this->language = $language;
        $this->model    = $model;
        $this->auth     = $auth;
    }

    abstract function output();
}