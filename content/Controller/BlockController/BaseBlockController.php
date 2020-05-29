<?php


namespace Content\Controller\BlockController;


use Engine\Core\Auth\AuthClient;
use Engine\Core\Block\BlockController;
use Engine\Core\Language;
use Engine\Core\Model\ModelContainer;
use Engine\Core\View;
use Engine\Helper\Request;

abstract class BaseBlockController extends BlockController
{
    protected $isAuth;

    public function __construct(
        View $view,
        Request $request,
        Language $language,
        ModelContainer $model,
        AuthClient $auth
    ) {
        parent::__construct($view, $request, $language, $model, $auth);
        $this->isAuth = $this->checkAuth();
    }

    private function checkAuth()
    {
        $clientModel = $this->model->load('client');
        return $clientModel->isAuth();
    }

    abstract function output();
}