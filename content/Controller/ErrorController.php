<?php


namespace Content\Controller;


class ErrorController extends BaseController
{
    public function page404()
    {
        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('page404', $data);
    }
}