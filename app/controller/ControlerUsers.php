<?php // include '..model/connection.php';  
session_start();

if($_SERVER['REQUEST_METHOD']=='POST') {
  include "../model/modelUsers.php";

  $posts=new modelUsers();

/* Sign Up */
  if (isset($_POST['register'])) {

    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nbrPhone = $_POST['nbrPhone'];
    $hashed_password   =    md5($password);

    $posts->register($Fname , $Lname , $email , $hashed_password , $nbrPhone);

  }

/* Login */
  else if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];
    /*  */
    $hashed_password=md5($password);
    /*  */
    $row=$posts->login($email);

    $passworddb   = $row['password'];
    $role         = $row['role'];
    $selectiduser = $row['id'];
    /* if Admin */
    if($passworddb==$hashed_password && $role=='admin') {
      $_SESSION['email']  = $email;
      $_SESSION['role']   = $role;

      header("location:../view/adm-dashboard.php");
    }
    /* If Customer */
    else if ($passworddb==$hashed_password && $role=='customer') {
      $_SESSION['id']     = $selectiduser;
      $_SESSION['email']  = $email;
      $_SESSION['role']   = $role;
      /* Get The Information Of Customers */
      $rows=$posts->selectCustmer($selectiduser);
      $_SESSION['Fname']  = $rows['Fname'];
      $_SESSION['Lname']  = $rows['Lname'];
      header("location:../view/Booking.php");
    }else {
      header("location:../view/authentification.php");
    }
  }

}else {
  echo 'Error : You Can\'t  Browse This Page';
}