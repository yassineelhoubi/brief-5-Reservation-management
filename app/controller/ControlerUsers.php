<?php // include '..model/connection.php';  
session_start();

if($_SERVER['REQUEST_METHOD']=='POST') {
  include "../model/modelUsers.php";

  $posts=new modelUsers();

  if (isset($_POST['register'])) {
    $posts->register($_POST);

  }else if (isset($_POST['login'])) {
    $posts->login($_POST);
    
  }else if ((isset($_POST['logout']))){
    $posts->logout($_POST);
  }
}else {
  echo 'Error : You Can\'t  Browse This Page';
}
