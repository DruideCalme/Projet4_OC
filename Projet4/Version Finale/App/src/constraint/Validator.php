<?php

namespace App\src\constraint;

/* Class Validator, validation de données contenues dans $data, lance la vérification sur le type de données associé au $name */

class Validator
{
    public function validate($data, $name)
    {
        if($name === 'Article') {
            $articleValidation = new ArticleValidation();
            return $articleValidation->check($data);
        } elseif ($name === 'User') {
            $userValidation = new UserValidation();
            return $userValidation->check($data);
        } elseif ($name === 'Comment') {
            $commentValidation = new CommentValidation();
            return $commentValidation->check($data);
        }
    }
}