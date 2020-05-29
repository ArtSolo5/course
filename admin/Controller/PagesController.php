<?php


namespace Admin\Controller;


class PagesController extends AdminController
{
    public function index()
    {
        $pageModel = $this->model->load('page');

        $data['pages'] = $pageModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('pages/list', $data);
    }

    public function create()
    {
        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('pages/create', $data);
    }

    public function add()
    {
        $pageModel = $this->model->load('page');

        $params = $this->request->post;
        $params['id']   = -1;
        $params['date'] = date("Y-m-d H:i:s");

        if (isset($params['title'])) {
            $page = $pageModel->createObject($params);
            $pageModel->insert($page);
            header('Location: /admin/pages/edit/' . $page->getId());
        }
    }

    public function edit($id)
    {
        $pageModel = $this->model->load('page');

        $data['page'] = $pageModel->find($id);

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('pages/edit', $data);
    }

    public function update()
    {
        $pageModel = $this->model->load('page');

        $params = $this->request->post;

        if (isset($params['title'])) {
            $page = $pageModel->find($params['id']);
            $page->setTitle($params['title']);
            $page->setContent($params['content']);
            $pageModel->update($page);
            header('Location: /admin/pages/edit/' . $page->getId());
        }
     }

     public function remove($id)
     {
         $pageModel = $this->model->load('page');

         $pageModel->delete($id);

         header('Location: /admin/pages/');
     }
}