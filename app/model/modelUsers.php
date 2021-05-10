<?php
include "connection.php";   
class modelUsers {

    private $Fname;
    private $Lname;
    private $email;
    private $password;
    private $nbrPhone;
    private $conn;

    /* connection */
    public function __construct(){

        $connection = new connection();
        $this->conn= $connection->connect();
    }
    /* sign up */
    public function register(){
        $this->Fname = $_POST['Fname'];
        $this->Lname = $_POST['Lname'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->nbrPhone = $_POST['nbrPhone'];

        $hashed_password   =    md5($this->password);
        $checkuser  =    $this->conn->prepare("SELECT id FROM users WHERE email= '$this->email'");
        $checkuser->execute();

        $result    =   $checkuser->rowCount();
        if ($result == 0) {  
            /* insert in users table */
            $registerUser = $this->conn->prepare("INSERT into users (email, password, role) VALUES ('$this->email', '$hashed_password','customer')");
            $registerUser->execute();
            /* get id users */
            $iduser  = $this->conn->lastInsertId();
            /* insert in customer table */
            $sqlCstmr       =   "INSERT INTO customer (`idCustomer`, `Fname`, `Lname`, `nbrPhone`) VALUES ('$iduser','$this->Fname','$this->Lname','$this->nbrPhone') ";
            $registerCstmr   =   $this->conn->prepare($sqlCstmr);
            $registerCstmr->execute();
            header("location:../view/Booking.php");
              
        } else {  
            die('error'); 
        }  
    }
    /* sign in */
    public function login(){
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $hashed_password   =    md5($this->password);
        
        $selectUser   =   $this->conn->prepare("SELECT * FROM users WHERE email = '$this->email'");
        $selectUser->execute();
        $row            =   $selectUser->fetch(PDO::FETCH_ASSOC);
        $passworddb     =   $row['password'];
        $role           =   $row['role'];
        $selectiduser   =   $row['id'];

        if($passworddb == $hashed_password && $role == 'admin'){
            $_SESSION['email']  = $this->email;
            $_SESSION['role']   = $role;

            header("location:../view/adm-dashboard.php");
        }else if($passworddb == $hashed_password && $role == 'customer'){
            
            $_SESSION['email']  = $this->email;
            $_SESSION['role']   = $role;
            $selectCustmor      = $this->conn->prepare("SELECT * FROM customer WHERE idCustomer = $selectiduser");
            $selectCustmor->execute();
            $row                =   $selectCustmor->fetch(PDO::FETCH_ASSOC);
            $_SESSION['Fname']  = $row['Fname'];
            $_SESSION['Lname']  = $row['Lname'];
            header("location:../view/Booking.php");


        }else{
            header("location:../view/authentification.php");
        }
    }
/*     public function logout(){
	session_start();
	session_unset();
	session_destroy();

	header("location:../view/authentification.php");
	exit();
    } */


}