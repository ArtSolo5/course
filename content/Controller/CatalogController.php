<?php


namespace Content\Controller;


class CatalogController extends BaseController
{
    public function index()
    {
        $bookModel   = $this->model->load('book');
        $genreModel  = $this->model->load('genre');
        $authorModel = $this->model->load('author');

        $data['books']   = $bookModel->findAll();
        $data['genres']  = $genreModel->findAll();
        $data['authors'] = $authorModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('catalog', $data);
    }

    public function filter(...$params)
    {
        $bookModel = $this->model->load('book');
        $genreModel  = $this->model->load('genre');
        $authorModel = $this->model->load('author');

        if (!empty($this->request->post)) {
            $data['books'] = $bookModel->findAllByName($this->request->post);
        } else {
            $data['books'] = $bookModel->findByFilter($params);
        }

        $data['genres']  = $genreModel->findAll();
        $data['authors'] = $authorModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('catalog', $data);
    }
}