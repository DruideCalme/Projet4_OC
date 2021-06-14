<?php

namespace App\src\DAO;

use PDO;
use Exception;

abstract class DAO

{
    const DB_HOST = 'mysql:host=localhost;dbname=billet-alaska;charset=UTF8';
    const DB_USER = 'root';
    const DB_PASS = '';

    private $connection;

    private function checkConnection()
    {
        if($this->connection === null) 
        {
            return $this->getConnection();
        }

        return $this->connection;
    }

    private function getConnection()
    {
        try{
            $this->connection = new PDO(DAO::DB_HOST, DAO::DB_USER, DAO::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }

        catch(Exception $errorConnection) 
        {
            die('Erreur de connection : ' . $errorConnection->getMessage());
        }
    }

    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        }

        $result = $this->checkConnection()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $result;
    }
}