<?php


namespace Admin\Controller;


class CarouselController extends AdminController
{
    public function index()
    {
        $carouselModel = $this->model->load('carousel');
        $carouselParameterModel = $this->model->load('carouselParameter');

        $data['carousels']  = $carouselModel->findAll();
        $data['parameters'] = $carouselParameterModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('carousel', $data);
    }

    public function update()
    {
        $carouselModel = $this->model->load('carousel');

        $carousel = $carouselModel->createObject($this->request->post);

        $carouselModel->update($carousel);

        header('Location: /admin/carousel');
    }
}