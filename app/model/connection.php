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
            $dsn = "mysql:host={$this->servername};dbname={$this->database}";
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Cannot connect to Database . {$e->getMessage()}";
        }
    }
}

// <?php
// //DataBase Conction
// class connection{
//     private $dsn        = 'mysql:host=localhost;dbname=reservation-management';
//     private $username   = 'root';
//     private $password   = '';

//     public $conn;
//     function __construct(){
    
//         try {
//             //Start A New Connection With PDO Class
//             $this->conn = new PDO($this->dsn,$this->username,$this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//             // echo 'You Are Connected';
//         } catch (PDOException $e) {
//             echo 'Failed '. $e->getMessage();
//         }
//     }//construct close

// }
