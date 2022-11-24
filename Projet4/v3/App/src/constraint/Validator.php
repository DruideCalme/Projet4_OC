<?php

namespace App\src\constraint;

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