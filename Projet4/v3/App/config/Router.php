<?php

namespace App\config;

use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use Exception;

class Router

{
    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct() 
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        $post = $this->request->getPost();
        $userId = $this->request->getGet()->get('userId');
        $articleId = $this->request->getGet()->get('articleId');
        $commentId = $this->request->getGet()->get('commentId');
        $commentAuthor = $this->request->getGet()->get('commentAuthor');
        try{
            if (isset($route))
            {
                if ($route === 'chapitre')
                {
                    $this->frontController->chapitre($articleId);
                } elseif ($route === 'chapitres') {
                    $this->frontController->chapitres();
                } elseif ($route === 'presentation') {
                    $this->frontController->presentation();
                } elseif ($route === 'espacePerso') {
                    $this->backController->espacePerso();
                } elseif ($route === 'updatePass') {
                    $this->backController->updatePass($post);
                } elseif ($route === 'deleteAccount') {
                    $this->backController->deleteAccount();
                } elseif ($route === 'manageArticles') {
                    $this->backController->manageArticles();
                } elseif ($route === 'addArticle') {
                    $this->backController->addArticle($post);
                } elseif ($route === 'editArticle') {
                    $this->backController->editArticle($post, $articleId);
                } elseif ($route === 'deleteArticle') {
                    $this->backController->deleteArticle($articleId);
                } elseif ($route === 'manageComments') {
                    $this->backController->manageComments();
                } elseif ($route === 'myComments') {
                    $this->backController->myComments();
                } elseif ($route === 'addComment') {
                    $this->backController->addComment($post, $articleId);
                } elseif ($route === 'editComment') {
                    $this->backController->editComment($post, $commentId, $commentAuthor, $articleId);
                } elseif ($route === 'deleteComment') {
                    $this->backController->deleteComment($commentId, $commentAuthor);
                } elseif ($route === 'flagComment') {
                    $this->backController->flagComment($commentId, $articleId);
                } elseif ($route === 'unflagComment') {
                    $this->backController->unflagComment($commentId);
                } elseif ($route === 'manageUsers') {
                    $this->backController->manageUsers();
                } elseif ($route === 'deleteUser') {
                    $this->backController->deleteUser($userId);
                } elseif ($route === 'register') {
                    $this->backController->register($post);
                } elseif ($route === 'login') {
                    $this->backController->login($post);
                } elseif ($route === 'logout') {
                    $this->backController->logout();
                } else {
                    $this->errorController->errorNotFound();
                }
            } else {
                $this->frontController->home();
            }
        }
        
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        } catch (Error $e) {
            $this->errorController->errorNotFound();
        }
    }
}