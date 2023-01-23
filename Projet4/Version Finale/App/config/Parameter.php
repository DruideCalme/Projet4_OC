<?php

namespace App\config;

/* Class Parameter, utilisation objet des superglobales GET, POST */

class Parameter
{
    private $parameter;

    public function __construct($parameter)
    {
        $this->parameter = $parameter;
    }

    public function get($name)
    {
        if (isset($this->parameter[$name])) {
            return $this->parameter[$name];
        }
    }

    public function set($name, $value)
    {
        $this->parameter[$name] = trim($value);
    }

    public function all()
    {
        return $this->parameter;
    }

    public function trimAll()
    {
        foreach ($this->parameter as $name => $value) {
            $this->trim($name, $value);
        }
    }

    public function trim($name, $value)
    {
        $this->parameter[$name] = trim($value);
    }
}