<?php


namespace Admin\Controller;


use Engine\Core\Controller;

class ErrorController extends AdminController
{
    public function page404()
    {
        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('error404', $data);
    }
}