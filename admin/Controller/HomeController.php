<?php

namespace Admin\Controller;

use Engine\Core\Controller;

class HomeController extends AdminController
{
    public function index()
    {
        $data['language'] = $this->language->load('dashboard/main');

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('home', $data);
    }
}