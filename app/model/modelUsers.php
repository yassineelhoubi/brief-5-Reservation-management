<?php
include "connection.php";   
class modelUsers {


    /* connection */
    public function __construct(){

        $connection = new connection();
        $this->conn= $connection->connect();
    }
    /* sign up */
    public function register($Fname , $Lname , $email , $hashed_password , $nbrPhone){

        $checkuser  =    $this->conn->prepare("SELECT id FROM users WHERE email= ?");
        $checkuser->execute([$email]);

        $result    =   $checkuser->rowCount();
        if ($result == 0) {  
            /* insert in users table */
            $registerUser = $this->conn->prepare("INSERT into users (email, password, role) VALUES (?,?,'customer')");
            $registerUser->execute([$email,$hashed_password]);
            /* get id users */
            $iduser  = $this->conn->lastInsertId();
            /* insert in customer table */
            $sqlCstmr       =   "INSERT INTO customer (`idCustomer`, `Fname`, `Lname`, `nbrPhone`) VALUES (?,?,?,?) ";
            $registerCstmr   =   $this->conn->prepare($sqlCstmr);
            $registerCstmr->execute([$iduser,$Fname,$Lname,$nbrPhone]);
            header("location:../view/Booking.php");
              
        } else {  
            die('error'); 
        }  
    }
    /* sign in */
    public function login($email){

        
        $selectUser   =   $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $selectUser->execute([$email]);
        $row            =   $selectUser->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
/*  Get The Information Of Customers */

    public function selectCustmer($selectiduser){
        $selectCustmor      = $this->conn->prepare("SELECT * FROM customer WHERE idCustomer = ?");
        $selectCustmor->execute([$selectiduser]);
        $rows                =   $selectCustmor->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }





}