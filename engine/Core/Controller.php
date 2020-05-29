<?php

namespace Engine\Core;

use Engine\Core\Auth\Auth;
use Engine\Core\Block\BlockContainer;
use Engine\Core\Model\ModelContainer;
use Engine\Helper\Request;

abstract class Controller
{
    protected $view;

    protected $block;

    protected $model;

    protected $request;

    protected $language;

    protected $auth;

    public function __construct(
        View $view,
        BlockContainer $block,
        ModelContainer $model,
        Request $request,
        Language $language,
        Auth $auth
    ) {
        $this->view     = $view;
        $this->block    = $block;
        $this->model    = $model;
        $this->request  = $request;
        $this->language = $language;
        $this->auth     = $auth;
    }
}