<?php
include "connection.php";   
class fetch {

    private $conn;
    /* connection */
    public function __construct(){

        $connection = new connection();
        $this->conn= $connection->connect();
    }

    public function fetchReservation(){
        $data=  null;
        $sql    = "SELECT reservation.idReservation , reservation.dateReservation , reservation.checkIn, reservation.chekOut, customer.Fname, customer.Lname, users.email FROM reservation JOIN customer ON reservation.idCustomer = customer.idCustomer JOIN users ON customer.idCustomer = users.id";
        $stmt   = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
        }
        
       
        return $data;
    }
}