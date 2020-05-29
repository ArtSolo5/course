<?php


namespace Content\Controller\BlockController;


class FooterBlockController extends BaseBlockController
{
    function output()
    {
        $this->view->render('blocks/footer');
    }
}