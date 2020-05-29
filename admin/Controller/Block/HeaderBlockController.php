<?php


namespace Admin\Controller\Block;


use Engine\Core\Block\BlockController;

class HeaderBlockController extends BlockController
{
    function output()
    {
        $this->view->render('blocks/header');
    }
}