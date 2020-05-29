<?php

namespace Content\Controller;

class HomeController extends BaseController
{
    public function index()
    {
        $bookModel = $this->model->load('book');

        $data['novelBooks'] = $bookModel->findByCarousel(1);
        $data['fantasyBooks'] = $bookModel->findByCarousel(2);

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('home', $data);
    }
}