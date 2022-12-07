<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    public function addArticle(Parameter $post)
    {
        if ($this->checkAdmin()) {
            $post->trimAll();
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleDAO->addArticle($post);
                    $this->session->set('add_article', '<p style="margin-top: 0">Le nouveau chapitre à bien été ajouté</p>');
                    header('Location: ../public/index.php?route=manageArticles');
                } else {
                    $this->view->render('add_article', [
                        'post' => $post,
                        'errors' => $errors
                    ]);
                }
            } else {
                $this->view->render('add_article');
            }
        } else {
            header('Location: ../public/index.php');
        }
    }

    public function editArticle(Parameter $post, $articleId)
    {
        if ($this->checkAdmin()){
            $post->trimAll();
            $article = $this->articleDAO->getArticle($articleId);

            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Article');
                if (!$errors) {
                    $this->articleDAO->editArticle($post, $articleId);
                    $this->session->set('edit_article', '<p style="margin-top: 0">Le chapitre à bien été mis à jour</p>');
                    header('Location: ../public/index.php?route=manageArticles');
                } else {
                    $this->view->render('edit_article', [
                        'post' => $post,
                        'errors' => $errors
                    ]);
                }
            } else {
                $post->set('id', $article->getId());
                $post->set('title', $article->getTitle());
                $post->set('content', $article->getContent());
                $this->view->render('edit_article', [
                    'post' => $post
                ]);
            }
        } else {
            header('Location: ../public/index.php');
        }
    }

    public function deleteArticle($articleId)
    {
        if ($this->checkAdmin()) {
            $this->articleDAO->deleteArticle($articleId);
            $this->session->set('delete_article', '<p style="margin-top: 0">Chapitre supprimé avec succès</p>');
            header('Location: ../public/index.php?route=manageArticles');
        }
    }

    public function addComment(Parameter $post, $articleId)
    {
        if ($this->checkLoggedIn()) {
            $post->trimAll();
            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsFromArticle($articleId);
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Comment');
                if (!$errors) {
                    $this->commentDAO->addComment($post, $articleId);
                    $this->session->set('add_comment', 'Votre commentaire à bien été ajouté');
                    header('Location: ../public/index.php?route=chapitre&articleId=' . $articleId);
                } else {
                    $this->view->render('chapitre', [
                        'article' => $article,
                        'comments' => $comments,
                        'errors' => $errors,
                        'post' => $post
                    ]);
                }
            } else {
                $this->view->render('add_comment', [
                    'articleId' => $articleId
                ]);
            }
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }    
    }

    public function editComment(Parameter $post, $commentId, $commentAuthor, $articleId)
    {
        if ($this->checkLoggedIn() && $commentAuthor === $this->session->getUserInfo('pseudo')) {
            $post->trimAll();
            $comment = $this->commentDAO->getComment($commentId);
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post ,'Comment');
                if (!$errors) {
                    $this->commentDAO->editComment($post, $commentId);
                    $this->session->set('edit_comment', '<p style="margin-top: 0">Modification du commentaire effectuée</p>');
                    header('Location: ../public/index.php?route=myComments');
                } else {
                    $this->view->render('edit_comment', [
                        'post' => $post,
                        'errors' => $errors
                    ]);
                }
            } else {
                $post->set('id', $comment->getId());
                $post->set('pseudo', $comment->getPseudo());
                $post->set('content', $comment->getContent());
                $this->view->render('edit_comment', [
                    'post' => $post,
                    'articleId' => $articleId,
                    'commentId' => $commentId
                ]);
            }
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    public function deleteComment($commentId, $commentAuthor)
    {
        if ($this->checkAdmin()) {
            $this->commentDAO->deleteComment($commentId);
            if ($commentAuthor === $this->session->getUserInfo('pseudo')) {
                $this->session->set('delete_comment', '<p style="margin-top: 0">Suppression du commentaire effectuée</p>');
                header('Location: ../public/index.php?route=myComments');
            } else {
                $this->session->set('delete_comment', '<p style="margin-top: 0">Suppression du commentaire effectuée</p>');
                header('Location: ../public/index.php?route=manageComments');
            }
        } else if ($this->checkLoggedIn() && $commentAuthor === $this->session->getUserInfo('pseudo')) {
            $this->commentDAO->deleteComment($commentId);
            $this->session->set('delete_comment', '<p style="margin-top: 0">Suppression du commentaire effectuée</p>');
            header('Location: ../public/index.php?route=myComments');
        } else {
            header('Location: ../public/index.php?route=myComments');
        }
    }

    public function flagComment($commentId, $articleId)
    {
        if ($this->checkLoggedIn()) {
            $this->commentDAO->flagComment($commentId);
            $this->session->set('flag_comment', 'Le commentaire à bien été signalé, merci');
            header('Location: ../public/index.php?route=chapitre&articleId=' . $articleId);
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    public function unflagComment($commentId)
    {
        if ($this->checkAdmin()) {
            $this->commentDAO->unflagComment($commentId);
            $this->session->set('unflag_comment', '<p style="margin-top: 0">Le commentaire a bien été autorisé</p>');
            header('Location: ../public/index.php?route=manageComments');
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    public function espacePerso()
    {
        if ($this->checkAdmin()) {
            $this->view->render('administration');
        } else if ($this->checkLoggedIn()) {
            $this->view->render('espace_perso');
        } else {
            header('Location: ../public/index.php?route=login');
        } 
    }

    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->session->destroy();
            $this->session->start();
            $this->session->set('logout', 'Déconnexion réussie');
            header('Location: ../public/index.php');
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    public function login(Parameter $post)
    {
        if (!$this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $result = $this->userDAO->login($post);
                if ($result && $result['isPasswordValid']) {
                    $this->session->set('user', $result['result']);
                    $this->session->set('login_message', '<p style="margin-top: 0">Content de vous revoir</p>');
                    header('Location: ../public/index.php');
                } else {
                    $this->session->set('error_login', '<p style="margin-top: 0">Le pseudo ou le mot de passe sont incorrects</p>');
                    $this->view->render('login', [
                        'post' => $post
                    ]);
                }
            } else {
                $this->view->render('login');
            }
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }   
    }

    public function register(Parameter $post)
    {
        if (!$this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'User');
                $checkUser = $this->userDAO->checkUser($post);
                if ($checkUser) {
                    $errors['pseudo'] = $checkUser;
                }
                if (!$errors) {
                    $this->userDAO->register($post);
                    $result = $this->userDAO->login($post);
                    if ($result && $result['isPasswordValid']) {
                        $this->session->set('user', $result['result']);
                        $this->session->set('register', 'Votre inscription à bien été effectuée');
                        header('Location: ../public/index.php');
                    } else {
                        $this->view->render('login', [
                            'post' => $post
                        ]);
                    }
                } else {
                    $this->view->render('register', [
                        'errors' => $errors,
                        'post' => $post
                    ]);
                }
            } else {
                $this->view->render('register');
            }
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }  
    }

    public function updatePass(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'User');
                if (!$errors) {
                    $this->userDAO->updatePassword($post, $this->session->get('user'));
                    $this->session->set('update_password', '<p style="margin-top: 0">Le mot de passe à bien été mis à jour</p>');
                    header('Location: ../public/index.php?route=espacePerso');
                } else {
                    $this->view->render('update_pass', [
                        'errors' => $errors
                    ]);
                }
            } else {
                $this->view->render('update_pass');
            }
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    public function deleteAccount(Parameter $post)
    {
        if ($this->checkAdmin()) {
            header('Location: ../public/index.php?route=espacePerso');
        } else if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $result = $this->userDAO->login($post);
                if ($result && $result['isPasswordValid']) {
                    $this->userDAO->deleteAccount($this->session->get('user'));
                    $this->session->destroy();
                    $this->session->start();
                    $this->session->set('delete_account', 'Votre compte à bien été supprimé');
                    header('Location: ../public/index.php');
                } else {
                    $this->session->set('error_deleting_account', '<p style="margin-top: 0">Le mot de passe est incorrect</p>');
                    $this->view->render('delete_account', [
                        'post' => $post
                    ]);
                }
            } else {
                $this->view->render('delete_account');
            }
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    public function manageArticles()
    {
        if ($this->checkAdmin()) {
            $articles = $this->articleDAO->getArticles();
            $this->view->render('manage_articles', [
                'articles' => $articles
        ]);
        } else {
            header('Location: ../public/index.php');
        }
    }

    public function manageComments()
    {
        if ($this->checkAdmin()) {
            $comments = $this->commentDAO->getComments();
            $flagComments = $this->commentDAO->getFlagComments();
            $this->view->render('manage_comments', [
                'comments' => $comments,
                'flagComments' => $flagComments
        ]);
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    public function myComments()
    {
        if ($this->checkLoggedIn()) {
            $comments = $this->commentDAO->getUserComments($this->session->getUserInfo('pseudo'));
            $this->view->render('my_comments', [
                'comments' => $comments
            ]);
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    public function manageUsers()
    {
        if ($this->checkAdmin()) {
            $users = $this->userDAO->getUsers();
            $this->view->render('manage_users', [
                'users' => $users
            ]);
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    public function deleteUser($userId)
    {
        if ($this->checkAdmin()) {
            $this->userDAO->deleteUser($userId);
            $this->session->set('delete_user', '<p style="margin-top: 0">L\'utilisateur a bien été supprimé</p>');
            header('Location: ../public/index.php?route=manageUsers');
        } else {
            header('Location: ../public/index.php?route=espacePerso');
        }
    }

    private function checkLoggedIn()
    {
        if(!$this->session->getUserInfo('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
        } else {
            return true;
        }
    }

    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if($this->session->getUserInfo('role') === 'Admin') {
            return true;
        } else {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
        }
    }
}