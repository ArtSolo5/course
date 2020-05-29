<?php


namespace Content\Controller;


use Engine\Core\Controller;

class BookController extends BaseController
{
    public function index($id)
    {
        $bookModel   = $this->model->load('book');
        $clientModel = $this->model->load('client');

        $book = $bookModel->find($id);

        $data['book'] = $book;

        $data['hasBook']    = $clientModel->hasBook($book->getId());
        $data['inReadList'] = $bookModel->inReadList($book->getId());

        $data['auth'] = $this->isAuth;

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('book', $data);
    }
}