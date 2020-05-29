<?php


namespace Admin\Controller\Block;


use Engine\Core\Block\BlockController;

class FooterBlockController extends BlockController
{
    function output()
    {
        $this->view->render('blocks/footer');
    }
}