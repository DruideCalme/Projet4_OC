<?php

namespace App\src\controller;

/* Class ErrorController, contrôleur qui gère les erreurs 404 et 500 */

class ErrorController extends Controller

{
    public function errorNotFound()
    {
        return $this->view->render('error_404');
    }

    public function errorServer()
    {
        return $this->view->render('error_500');
    }
}