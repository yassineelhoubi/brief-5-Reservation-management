<?php 

if(isset($_POST['reserver'])) {
    include "../model/MReservation.php";
    /* obj */
    $reservation    =   new reservation();
    session_start();

/* Insert in Reservation Table */
    $idCustomer     =   $_SESSION['id'];
    
    $dateReservation = date('Y-m-d');
    $checkin        =   $_POST['checkin'];
    $checkout       =   $_POST['checkout'];
    $idReservation  =   $reservation->insertReservation($idCustomer,$dateReservation,$checkin,$checkout);
    

/* Insert Room in Services Table */
    $reservation->insertRoom($_POST['room'],$idReservation);

/* Inset Pension In Services Table */
    $reservation->insertPension($_POST['pension'],$idReservation);
/* Insert Property Of Children In Services Table */
    $reservation->insertOffersChild($_POST['offerschild'],$idReservation);
/* Insert Bungalow Or Appart In services Table  */
    $reservation->insertBungalowOrApart($_POST['typeproperty'],$idReservation);
/* Insert In Price Total In Bill Table  */
    $checkin        =   strtotime($checkin);
    $checkout       =   strtotime($checkout);
    $nbrOfseconds   =   $checkout - $checkin;
    $nbrOfDays      =   $nbrOfseconds/(60*60*24) ;
    $finalPrice     =   $reservation->bill($nbrOfDays,$idReservation);


    $_SESSION['finalPrice'] =   $finalPrice;
    header('location:../view/booking.php');


}









?>