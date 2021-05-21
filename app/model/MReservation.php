<?php
include "connection.php";   
class reservation {

    private $conn;

    /* connection */
    public function __construct(){

        $connection = new connection();
        $this->conn= $connection->connect();
    }

    /* insert in reservation table */
    public function insertReservation($idCustomer,$dateReservation,$checkin,$checkout){
        $sql    =   "INSERT INTO reservation(`idCustomer`, `dateReservation`, `checkIn`, `chekOut`) VALUES (?,?,?,?)";
        $stmt   =   $this->conn->prepare($sql);
        $stmt->execute([$idCustomer,$dateReservation,$checkin,$checkout]);
         $idreservation  =   $this->conn->lastInsertId();
         return $idreservation ;
    }

    /* Insert Room In Services Table */
    public function insertRoom($array,$idreservation){
        foreach($array as $key =>$value){    
                $sql    =   "INSERT INTO `services`(`idProperty`, `idReservation`) VALUES ((select IdProperty from Property where type = '$value[Roomtype]' and (bedtype= '$value[bedtype]' or bedtype is Null ) and view= '$value[viewtype]' ),?)";
                $stmt   =   $this->conn->prepare($sql);
                $stmt->execute([$idreservation]); 
        }
    }

    /* Insert Pension In services Table */
    public function insertPension($array,$idreservation){
        foreach($array as $key => $value){
            $sql    =   "INSERT INTO services (`idProperty`, `idReservation`) VALUES (?,?)";
            $stmt   =   $this->conn->prepare($sql);
            $stmt->execute([$value['idpension'],$idreservation]);
        }
    }

    /* Insert Bungalow Or Apart In Services Table */
    public function insertBungalowOrApart($array,$idreservation){
        foreach($array as $key => $value){
            if ($value['type'] == 'bungalow'){
                /* The Id Of Property Bungalow In Database Is " 5 " */
                $sql    =   "INSERT INTO services (`idProperty`, `idReservation`) VALUES (5,?)";
                $stmt   =   $this->conn->prepare($sql);
                $stmt->execute([$idreservation]); 
            } else if ($value['type'] == 'apartments'){
                /* The Id Of Property Apartments In Database Is " 6 " */
                $sql    =   "INSERT INTO services (`idProperty`, `idReservation`) VALUES (6,?)";
                $stmt   =   $this->conn->prepare($sql);
                $stmt->execute([$idreservation]);
            }
        }
    }

    /* Insert Property Of Children In Services Table */
    public function insertOffersChild($array,$idreservation){
        foreach($array as $key => $value){
            $sql    =   "INSERT INTO services (`idProperty`, `idReservation`) VALUES (?,?)";
            $stmt   =   $this->conn->prepare($sql);
            $stmt->execute([$value['idofferschild'],$idreservation]);
        }
    }

    /* Calculate Total Price From Property Table And Insert Result In Bill Table */
    public function bill($nbrOfDays,$idreservation){
        /* Calculate Total Price  */
        $sqlCalc    =   "SELECT SUM(a.price) as `total` FROM property as a , services as b WHERE a.idProperty = b.idProperty AND b.idReservation =?";
        $stmtCalc   =   $this->conn->prepare($sqlCalc);
        $stmtCalc->execute([$idreservation]);
        $row   = $stmtCalc->fetch(PDO::FETCH_ASSOC);
        /*  */
        $totalPrice =   $row['total'];
        $finalPrice = $totalPrice * $nbrOfDays;
        /* Insert Totale Price In Bill Tabke */
        $sqlinsert  =   "INSERT INTO `bill`(`idReservation`, `totalPrice`, `nbrOfDays`, `finalPrice`) VALUES (?,?,?,?)";
        $stmtinsert =   $this->conn->prepare($sqlinsert);
        $stmtinsert->execute([$idreservation,$totalPrice,$nbrOfDays,$finalPrice]);
        return $finalPrice;
    }


}