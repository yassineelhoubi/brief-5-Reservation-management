<?php 
// include '..model/connection.php';  
include "../model/modelUsers.php";

$posts = new modelUsers();

  if (isset($_POST['register'])) {
      $posts->register($_POST) ;
      
  }else if (isset($_POST['login'])) {
    $posts->login($_POST) ;
    
  }
