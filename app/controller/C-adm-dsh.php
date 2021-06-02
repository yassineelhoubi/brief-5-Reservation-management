<?php

include "../model/M-adm-dsh.php";
$fetch = new fetch();



if(isset($_GET['fetch-R'])){
    $rows = $fetch->fetchReservation();
    echo json_encode($rows);

}

if(isset($_GET['R-info'])){
    $idReservation = $_GET['R-info'];
    $data= $fetch->ReservationInfo($idReservation);
    echo json_encode($data);
    
}


