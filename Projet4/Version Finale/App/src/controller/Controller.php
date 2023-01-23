<?php

namespace App\src\controller;

use App\config\Parameter;
use App\src\constraint\Validator;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\UserDAO;
use App\src\model\View;
use App\config\Request;
use App\config\Session;

/* Class Controller abstraite, généralisation de  l'usage des controlleurs */

abstract class controller

{
    protected $userDAO;
    protected $articleDAO;
    protected $commentDAO;
    protected $view;
    protected $get;
    protected $post;
    private $request;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
        $this->request = new Request();
        $this->validation = new Validator();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}