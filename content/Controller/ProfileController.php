<?php


namespace Content\Controller;

class ProfileController extends BaseController
{
    public function index()
    {
        if (!$this->isAuth) {
            header('Location: /profile/login');
        }

        $bookModel = $this->model->load('book');

        $data['books'] = $bookModel->findByClient();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('profile/library', $data);
    }

    public function filter($option)
    {
        $bookModel = $this->model->load('book');
        $genreModel  = $this->model->load('genre');
        $authorModel = $this->model->load('author');

        $data['books'] = $bookModel->findByClientBookName($this->request->post);

        $data['genres']  = $genreModel->findAll();
        $data['authors'] = $authorModel->findAll();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('profile/library', $data);
    }

    public function readList()
    {
        $bookModel = $this->model->load('book');

        $data['books'] = $bookModel->findByReadList();

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('profile/library', $data);
    }

    public function addToLibrary($id)
    {
        $bookModel = $this->model->load('book');

        $bookModel->addBookToLibrary($id);

        header('Location: /book/' . $id);
    }

    public function addToReadList($id)
    {
        $bookModel = $this->model->load('book');

        $bookModel->addBookToReadList($id);

        header('Location: /book/' . $id);
    }

    public function removeFromReadList($id)
    {
        $bookModel = $this->model->load('book');

        $bookModel->deleteFromReadList($id);

        header('Location: /book/' . $id);
    }

    public function login()
    {
        if ($this->isAuth) {
            header('Location: /profile');
        }

        if (!empty($this->request->post))
        {
            $clientModel = $this->model->load('client');

            $email    = $this->request->post['email'];
            $password = $this->request->post['password'];

            if ($clientModel->auth($email, $password)) {
                $clientId = $clientModel->getCurrentClient()->getId();
                session_start();
                $_SESSION['clientId'] = $clientId;
                header('Location: /');
            } else {
                header('Location: /profile/login');
            }
        }

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('profile/login', $data);
    }

    public function signUp()
    {
        if ($this->isAuth) {
            header('Location: /profile');
        }

        if (!empty($this->request->post)) {
            $clientModel = $this->model->load('client');

            $client = $clientModel->createObject($this->request->post);

            $clientModel->insert($client);
        }

        $data['header'] = $this->block->load('header');
        $data['footer'] = $this->block->load('footer');

        $this->view->render('profile/signUp', $data);
    }

    public function logout()
    {
        unset($_SESSION['clientId']);
        $userModel = $this->model->load('client');
        $userModel->logout();
        header('Location: /profile/login');
    }
}