<?php

class Dbh 
{
    private $host = "db4free.net";
    private $user = "jesus_san97";
    private $pwd = "Pochiix33";
    private $dbName = "jsanchezfolio";

    public function connect()
    {
        try
        {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

?>