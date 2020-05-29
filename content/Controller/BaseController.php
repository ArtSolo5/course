<?php


namespace Content\Controller;


use Engine\Core\Auth\AuthClient;
use Engine\Core\Block\BlockContainer;
use Engine\Core\Controller;
use Engine\Core\Language;
use Engine\Core\Model\ModelContainer;
use Engine\Core\View;
use Engine\Helper\Request;

class BaseController extends Controller
{
    protected $isAuth;

    public function __construct(
        View $view,
        BlockContainer $block,
        ModelContainer $model,
        Request $request,
        Language $language,
        AuthClient $auth
    ) {
        parent::__construct($view, $block, $model, $request, $language, $auth);
        $this->isAuth = $this->checkAuth();
        session_start();
    }

    private function checkAuth()
    {
        $clientModel = $this->model->load('client');
        return $clientModel->isAuth();
    }
}