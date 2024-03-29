<?php

namespace App\config;

/* Class Session, gestion de la session utilisateur */

class Session
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function set(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function show(string $name)
    {
        if (isset($_SESSION[$name])) {
            $key = $this->get($name);
            $this->remove($name);
            return $key;
        }
    }

    public function get(string $name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    public function getUserInfo($name)
    {
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['user'][$name])) {
                return $_SESSION['user'][$name];
            }
        }
    }

    public function remove(string $name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public function destroy()
    {
        session_destroy();
    }

    public function start()
    {
        session_start();
    }
}