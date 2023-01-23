<?php

namespace App\src\constraint;

use App\config\Parameter;

/* Class CommentValidation, contraintes de validation des commentaires postés */

class CommentValidation extends Validation
{
    public function checkField($name, $value)
    {
        if ($name === 'content') {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
    }

    private function checkContent($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank($name, $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength($name, $value, 2);
        }
        if ($this->constraint->maxLength($name, $value, 500)) {
            return $this->constraint->minLength($name, $value, 500);
        }
    }
}