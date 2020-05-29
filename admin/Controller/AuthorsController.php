<?php


namespace Admin\Controller;


class AuthorsController extends AdminController
{
    public function index()
    {
        $authorModel = $this->model->load('author');

        $data['authors'] = $authorModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('authors/list', $data);
    }

    public function create()
    {
        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('authors/create', $data);
    }

    public function add()
    {
        $authorModel = $this->model->load('author');

        $params = $this->request->post;
        $params['id']   = -1;

        if (isset($params['name'])) {
            $author = $authorModel->createObject($params);
            $authorModel->insert($author);
            header('Location: /admin/authors/edit/' . $author->getId());
        }
    }

    public function edit($id)
    {
        $authorModel = $this->model->load('author');

        $data['author'] = $authorModel->find($id);

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('authors/edit', $data);
    }

    public function update()
    {
        $authorModel = $this->model->load('author');

        $params = $this->request->post;

        if (isset($params['name'])) {
            $author = $authorModel->find($params['id']);
            $author->setName($params['name']);
            $author->setCountry($params['country']);
            $authorModel->update($author);
            header('Location: /admin/authors/edit/' . $author->getId());
        }
    }

    public function remove($id)
    {
        $authorModel = $this->model->load('author');

        $authorModel->delete($id);

        header('Location: /admin/authors/');
    }
}