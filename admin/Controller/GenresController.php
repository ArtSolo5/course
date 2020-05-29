<?php


namespace Admin\Controller;


class GenresController extends AdminController
{
    public function index()
    {
        $genreModel = $this->model->load('genre');

        $data['genres'] = $genreModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('genres/list', $data);
    }

    public function create()
    {
        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('genres/create', $data);
    }

    public function add()
    {
        $genreModel = $this->model->load('genre');

        $params = $this->request->post;
        $params['id']   = -1;

        if (isset($params['name'])) {
            $genre = $genreModel->createObject($params);
            $genreModel->insert($genre);
            header('Location: /admin/genres/edit/' . $genre->getId());
        }
    }

    public function edit($id)
    {
        $genreModel = $this->model->load('genre');

        $data['genre'] = $genreModel->find($id);

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('genres/edit', $data);
    }

    public function update()
    {
        $genreModel = $this->model->load('genre');

        $params = $this->request->post;

        if (isset($params['name'])) {
            $genre = $genreModel->find($params['id']);
            $genre->setName($params['name']);
            $genreModel->update($genre);
            header('Location: /admin/genres/edit/' . $genre->getId());
        }
    }

    public function remove($id)
    {
        $genreModel = $this->model->load('genre');

        $genreModel->delete($id);

        header('Location: /admin/genres/');
    }
}