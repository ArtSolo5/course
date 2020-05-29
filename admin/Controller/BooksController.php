<?php


namespace Admin\Controller;


class BooksController extends AdminController
{
    public function index()
    {
        $pageModel = $this->model->load('book');

        $data['books'] = $pageModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('books/list', $data);
    }

    public function create()
    {
        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $authorModel    = $this->model->load('author');
        $genreModel     = $this->model->load('genre');
        $publisherModel = $this->model->load('publisher');

        $data['genres']    = $genreModel->findAll();
        $data['authors']   = $authorModel->findAll();
        $data['publishers'] = $publisherModel->findAll();

        $this->view->render('books/create', $data);
    }

    public function add()
    {
        $bookModel = $this->model->load('book');

        $params = $this->request->post;
        $params['id']   = -1;

        if (isset($params['name'])) {
            $book = $bookModel->createObject($params);
            $bookModel->insert($book);
            header('Location: /admin/books/edit/' . $book->getId());
        }
    }

    public function edit($id)
    {
        $bookModel = $this->model->load('book');

        $data['book'] = $bookModel->find($id);

        $authorModel    = $this->model->load('author');
        $genreModel     = $this->model->load('genre');
        $publisherModel = $this->model->load('publisher');

        $data['genres']    = $genreModel->findAll();
        $data['authors']   = $authorModel->findAll();
        $data['publishers'] = $publisherModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('books/edit', $data);
    }

    public function update()
    {
        $bookModel = $this->model->load('book');
        $genreModel = $this->model->load('genre');
        $authorModel = $this->model->load('author');
        $publisherModel = $this->model->load('publisher');

        $params = $this->request->post;

        if (isset($params['name'])) {
            $book = $bookModel->find($params['id']);
            $book->setName($params['name']);
            $book->setGenre($genreModel->find($params['genre']));
            $book->setAuthor($authorModel->find($params['author']));
            $book->setPublisher($publisherModel->find($params['publisher']));
            $book->setPrice($params['price']);
            $book->setPages($params['pages']);
            $book->setDescription($params['description']);

            $bookModel->update($book);
            header('Location: /admin/books/edit/' . $book->getId());
        }
    }

    public function remove($id)
    {
        $bookModel = $this->model->load('book');

        $bookModel->delete($id);

        header('Location: /admin/books/');
    }
}