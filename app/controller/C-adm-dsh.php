<?php
session_start();

if(isset($_SESSION['role']) == 'admin'){
include "../model/M-adm-dsh.php";
$fetch = new fetch();
$rows = $fetch->fetchReservation();
echo json_encode($rows);

}
