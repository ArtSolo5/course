<?php


namespace Content\Controller\BlockController;


class HeaderBlockController extends BaseBlockController
{
    function output()
    {
        $data['auth'] = $this->isAuth;

        $this->view->render('blocks/header', $data);
    }
}