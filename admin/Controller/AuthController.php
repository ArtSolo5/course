<?php


namespace Admin\Controller;


use Engine\Core\Auth\AuthAdmin;
use Engine\Core\Block\BlockContainer;
use Engine\Core\Controller;
use Engine\Core\Language;
use Engine\Core\Model\ModelContainer;
use Engine\Helper\Request;
use Engine\Core\View;

class AuthController extends Controller
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

        $userModel = $this->model->load('user');
        if ($userModel->isAuth()) {
            header('Location: /admin/');
        }
    }

    public function index()
    {
        $this->view->render('login');
    }

    public function login()
    {
        $userModel = $this->model->load('user');

        $email    = $this->request->post['email'];
        $password = $this->request->post['password'];

        if ($userModel->auth($email, $password)) {
            header('Location: /admin/');
        } else {
            header('Location: /admin/auth/');
        }
    }

    public function logout()
    {
        $userModel = $this->model->load('user');
        $userModel->logout();
        header('Location: /admin/auth/');
    }
}