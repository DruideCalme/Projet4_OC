<?php

namespace App\src\controller;

use App\config\Parameter;

/* Class FrontController, contrôleur qui gère la partie publique */

class FrontController extends Controller

{
    public function home()
    {
        $lastArticle = $this->articleDAO->getLastArticle();
        $lastComment = $this->commentDAO->getLastComment();

        $this->view->render('home', [
            'lastArticle' => $lastArticle,
            'lastComment' => $lastComment
        ]);
    } 

    public function chapitre($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);

        $this->view->render('chapitre', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function chapitres()
    {
        $articles = $this->articleDAO->getArticles();

        $this->view->render('chapitres', [
            'articles' => $articles
        ]);
    }

    public function presentation()
    {
        $this->view->render('presentation');
    }
}