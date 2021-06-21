<?php

namespace App\config;

use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use Exception;

class Router

{
    private $frontController;
    private $errorController;

    public function __construct() 
    {
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'chapitre')
                {
                    $this->frontController->chapitre($_GET['articleId']);
                } elseif($_GET['route'] === 'chapitres') {
                    $this->frontController->chapitres();
                } elseif($_GET['route'] === 'presentation') {
                    $this->frontController->presentation();
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
        }
    }
}