<?php

namespace App\src\constraint;

use App\config\Parameter;

class ArticleValidation extends Validation
{
    public function checkField($name, $value)
    {
        if ($name === 'title') {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'content') {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
    }

    private function checkTitle($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank($name, $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength($name, $value, 2);
        }
        if ($this->constraint->maxLength($name, $value, 100)) {
            return $this->constraint->maxLength($name, $value, 100);
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
        if ($this->constraint->maxLength($name, $value, 4000)) {
            return $this->constraint->minLength($name, $value, 4000);
        }
    }
}