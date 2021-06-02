<?php
class connection
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "reservation-management";

    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->servername};dbname={$this->database}";//Data Source Name
            $pdo = new PDO($dsn, $this->username, $this->password);//Start A New Connection With PDO class
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Cannot connect to Database . {$e->getMessage()}";
        }
    }
}


