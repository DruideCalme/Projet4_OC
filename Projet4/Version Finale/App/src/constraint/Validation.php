<?php

namespace App\src\constraint;

use App\config\Parameter;

abstract class Validation
{
    protected $errors = [];
    protected $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public abstract function checkField($name, $value);

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    protected function addError($name, $error)
    {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }
}