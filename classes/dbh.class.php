<?php

class Dbh
{
    private $host = 'localhost';
    private $user_name = 'root';
    private $password = '';
    private $db_name = 'scandiweb_test';

    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
            $pdo = new PDO($dsn, $this->user_name, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed ".$e->getMessage()."<br>";
        }
        return $pdo;
    }
}
