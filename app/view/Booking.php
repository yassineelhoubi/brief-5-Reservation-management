<?php
 include "includes/templates/header-inc.php";
 /* include "../model/conn.php";
 $obj = new connection(); */
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
            <div class="col-sm-11">
                <select class="browser-default custom-select mb-4" id="property" onchange="select_property()">
                    <option value="" disabled="" selected="">Property</option>
                    <option value="hotel">Hotel</option>
                    <option value="bungolw">Bangalow</option>
                    <option value="appartements">Apartments</option>

                </select>
            </div>
            <div class="col-sm-1"> <i class="fas fa-plus" onclick="addProperty()"></i></div>
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


    </div>
</div>

<!-- index body -->
<?php include "includes/templates/footer-inc.php";?>