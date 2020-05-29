<?php


namespace Admin\Controller;


use Engine\Core\Auth\AuthAdmin;
use Engine\Core\Block\BlockContainer;
use Engine\Core\Controller;
use Engine\Core\Language;
use Engine\Core\Model\ModelContainer;
use Engine\Helper\Request;
use Engine\Core\View;

class AdminController extends Controller
{
    public function __construct(
        View $view,
        BlockContainer $block,
        ModelContainer $model,
        Request $request,
        Language $language,
        AuthAdmin $auth
    ) {
        parent::__construct($view, $block, $model, $request, $language, $auth);

        $this->checkAuth();
    }

    private function checkAuth()
    {
        $userModel = $this->model->load('user');

        if (!$userModel->isAuth()) {
            header('Location: /admin/auth/');
        }
    }
}