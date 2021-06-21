<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;

class FrontController

{
    private $articleDAO;
    private $commentDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
    }

    public function chapitre($articleId)
    {
        $articles = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);

        require '../templates/chapitre.php';
    }

    public function chapitres()
    {
        $articles = $this->articleDAO->getArticles();

        require '../templates/chapitres.php';
    }

    public function presentation()
    {
        require '../templates/presentation.html';
    }

    public function home()
    {
        $article = $this->articleDAO->getLastArticle();
        $lastComment = $this->commentDAO->getLastComment();

        require '../templates/home.php';
    } 
}