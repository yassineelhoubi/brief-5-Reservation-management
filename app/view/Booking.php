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
        <!--checkin checkout-->
        <div class="row">
            <div class="col-sm-6">
                <input name="checkin" type="date" class="form-control datepicker mb-4">
            </div>
            <div class="col-sm-6">
                <input name="checkout" type="date" class="form-control datepicker mb-4">
            </div>
        </div>

        <!-- property -->
        <div class="row mt-4">
            <div class="col-sm-12 ">
                <select class="browser-default custom-select mb-4 dom" id="property" onchange="select_property()">
                    <option value="" disabled="" selected="">Property</option>
                    <option value="hotel">Hotel</option>
                    <option value="bangalow">Bangalow</option>
                    <option value="appartements">Apartments</option>
                </select>
            </div>
            
        </div>

        <!--Hotel-->
        <div class="row mt-4" id="hotel-div">
            <div class="col-12" id="title-room"></div>
            <div id="room" class="col-12"></div>
            <div id="bed-type" class="col-12"></div>
            <div id="view-type" class="col-12"></div>
        </div>
        <!-- persons -->
        <div class="col-12 mt-4" id="title-persons"></div>
        <div class="row " id="persons">
        </div>
        <div class="row" id="child_select">
        </div>
        <!-- pension -->
        <div class="row">
            <div class="col-12 mt-4" id="title-pension"></div>
            <div class="col-12" id="pension"></div>
        </div>
        <!--  -->
       
        <button  onclick="booking()">Valid</button>
        <button onclick="booking()" ><i class="fas fa-plus" ></i></button>
         
       
    </div>
</div>

<!-- index body -->
<?php include "includes/templates/footer-inc.php";?>