<?php

class Database

{
    const DB_HOST = 'mysql:host=localhost;dbname=billet-alaska;charset=UTF8';
    const DB_USER = 'root';
    const DB_PASS = '';

    public function getConnection()

    {
        try{
            $connection = new PDO(Database::DB_HOST, Database::DB_USER, Database::DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return 'Connexion OK';
        }

        catch(Exception $errorConnection) 
        {
            die('Erreur de connection : ' . $errorConnection->getMessage());
        }
    }

}