<?php


namespace Admin\Controller;


class PublishersController extends AdminController
{
    public function index()
    {
        $publisherModel = $this->model->load('publisher');

        $data['publishers'] = $publisherModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('publishers/list', $data);
    }

    public function create()
    {
        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('publishers/create', $data);
    }

    public function add()
    {
        $publisherModel = $this->model->load('publisher');

        $params = $this->request->post;
        $params['id']   = -1;

        if (isset($params['name'])) {
            $publisher = $publisherModel->createObject($params);
            $publisherModel->insert($publisher);
            header('Location: /admin/publishers/edit/' . $publisher->getId());
        }
    }

    public function edit($id)
    {
        $publisherModel = $this->model->load('publisher');

        $data['publisher'] = $publisherModel->find($id);

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('publishers/edit', $data);
    }

    public function update()
    {
        $publisherModel = $this->model->load('publisher');

        $params = $this->request->post;

        if (isset($params['name'])) {
            $publisher = $publisherModel->find($params['id']);
            $publisher->setName($params['name']);
            $publisherModel->update($publisher);
            header('Location: /admin/publishers/edit/' . $publisher->getId());
        }
    }

    public function remove($id)
    {
        $publisherModel = $this->model->load('publisher');

        $publisherModel->delete($id);

        header('Location: /admin/publishers/');
    }
}