<?php
	session_start();
	if(!isset ($_SESSION['email']) ) {
		header("location:authentification.php");
	}else if (isset ($_SESSION['email'])  && ($_SESSION["role"]) == 'customer' ){
        include "includes/templates/header-con.php";
    } 
    else {
        include "includes/templates/header-adm.php";
    }
 ?>
<!-- index body -->
<div class="card shadow mb-5 mt-5 bg-white rounded">
    <!--Card-Body-->
    <div class="card-body" id="addProperty">
        <!--Card-Title-->
        <p class="card-title text-center shadow mb-5 rounded">Make your reservation</p>
        <hr>
        <form action="../controller/CReservation.php" method="POST">
            <!--checkin checkout-->
            <div class="row">
                <div class="col-sm-6">
                    <input name="checkin" required type="date" class="form-control datepicker mb-4">
                </div>
                <div class="col-sm-6">
                    <input name="checkout" required type="date" class="form-control datepicker mb-4">
                </div>
            </div>
            
                <!-- property -->
                <div class="row mt-4 mr-1">
                    <div class="col-md-11 col-sm-10 col-10  ">
                        <select required class="browser-default custom-select mb-4 " id="property" onchange="select_property()"
                            name="typeproperty[1][type]">
                            <option value="" disabled="" selected="">Property</option>
                            <option value="hotel">Hotel</option>
                            <option value="bungalow">Bungalow</option>
                            <option value="apartments">Apartments</option>
                        </select>
                    </div>
                    <button class="col-md-1 col-sm-2 col-2  " type="button" onclick="addProperty()"
                        style="height: fit-content;">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <!--Hotel-->

                <div class="row nbrOfroom mr-1" style="display:none">
                    <div class="col-8   ">
                        <input class="browser-default custom-select " min=1 type="number" placeholder="numbers of Rooms"
                            id="addRoom">
                    </div>
                    <button id="addRoom-btn" required type="button" class="col-4 ">add Room</button>
                </div>

                <div class="row mt-4" id="hotel-div">

                </div>

                <!-- persons title -->
                <div style="display:none;" class="col-12 mt-4" id="title-persons">
                    <center>
                        <hr>Persons</center>
                </div>
                <!-- persons input number -->
                <div style="display:none;" class="row " id="persons">
                    <div class="col-sm-6">
                        <input  name="adults" placeholder="Adults" type="number" class="form-control datepicker mb-4 ">
                    </div>
                    <div class="col-sm-6">
                        <input name="children" id='nbr_child' placeholder="Number of Children " type="number"
                            class="form-control datepicker mb-4 " min=0 max=6 onkeyup="if(this.value>6)this.value=null;" oninput="childs_input()" >
                    </div>
                </div>
                <!-- offers of child -->
                <div class="row" id="child_select">

                </div>

                <!-- add property -->
                <div id="divProperty">

                </div>

                <!-- submit -->
                <center><button style="width: 200px;" type="submit" name="reserver" >Reserver</button></center>

            </form>

            <!-- Sweet Alert -->
            <?php
                if(isset($_SESSION['finalPrice']) && $_SESSION['finalPrice']!=0 ){

            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire('Your Reservation Is Successfully <br> The total price is :  <?php echo $_SESSION['finalPrice']?> DH')
            </script>
            <?php
                unset($_SESSION['finalPrice']);
                }
            ?>


         

    </div>
</div>

<!-- index body -->
<?php include "includes/templates/footer-inc.php";?>