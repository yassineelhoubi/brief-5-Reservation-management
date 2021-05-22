<?php
	session_start();
	if(!isset ($_SESSION['email'])  ) {
        include "includes/templates/header-inc.php";
        
	}
    else if (isset ($_SESSION['email'])  && ($_SESSION["role"]) == 'customer' ){
        include "includes/templates/header-con.php";
    } 
    else if (isset ($_SESSION['email'])   && ($_SESSION["role"]) == 'admin' ){
        include "includes/templates/header-adm.php";
    }
         
 ?>
<!-- index body -->


<!-- slider home -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./layout/img/slider-1.jpg" class="d-block w-100" alt="room">
            <div class="carousel-caption  d-md-block ">
                <h6>Hotel &amp; Resort</h6>
                <h2>Welcome To Roberto</h2>
                <a>Discover Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./layout/img/slider-2.jpg" class="d-block w-100" alt="room">
            <div class="carousel-caption  d-md-block">
                <h6>Hotel &amp; Resort</h6>
                <h2>Welcome To Roberto</h2>
                <a>Discover Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./layout/img/slider-3.jpg" class="d-block w-100" alt="room">
            <div class="carousel-caption  d-md-block">
                <h6>Hotel &amp; Resort</h6>
                <h2>Welcome To Roberto</h2>
                <a>Discover Now</a>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- slider home -->



<!--  -->
<div>
    <center>
        <h1 class="m-5 bold center heading-body">Discover Our Hotel</h1>
    </center>
</div>
<div class="container mt-5 mb-5  ">
    <div class="row">
        <div class="col-lg-6 col-md-12   ">
            <div class="column">
                <h2 class="mt-3 heading-body">Guest House</h2>
                <h5 class="mt-3">Lorem ipsum dolor sit amet.</h5>
                <p class=" lead mt-3 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus laborum
                    unde a
                    quos! Asperiores blanditiis obcaecati, nobis distinctio magnam voluptatum. Delectus soluta vitae
                    neque. Ullam quo modi voluptatibus facere. Impedit.</p>
                <button class="mb-3">see more</button>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 grid-img ">
            <img class="rounded" src="./layout/img/1.jpg" alt="room">
            <img class="rounded" src="./layout/img/5.jpg" alt="pool">
            <img class="rounded" src="./layout/img/9.jpg" alt="room">

        </div>
    </div>
</div>

<div>
    <center>
        <h1 class="m-5 heading-body ">Discover Our Pension</h1>
    </center>
</div>
<div class="container mt-5 mb-5  ">
    <div class="row">
        <div class="col-lg-6 col-md-12 order-lg-2  ">
            <div class="column">
                <h2 class="heading-body">Guest House</h2>
                <h5 class="lead">Lorem ipsum dolor sit amet.</h5>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus laborum unde a
                    quos! Asperiores blanditiis obcaecati, nobis distinctio magnam voluptatum. Delectus soluta vitae
                    neque. Ullam quo modi voluptatibus facere. Impedit.</p>
                <button class="mb-3">see more</button>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 grid-img rounded">
            <img class="rounded" src="./layout/img/petit-dej.jpg"  alt="pension">
            <img class="rounded" src="./layout/img/restaurant-hotel.jpg" alt="pension">
            <img class="rounded" src="./layout/img/6.jpg" alt="pension">

        </div>
    </div>
</div>
<!--  -->

<section class="section border-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 p-5">
                <h2 class="heading-body">Make Yourself Comfortable in Any of Our Fully Air-conditioned Rooms</h2>
            </div>
            <div class="col-md-6 text-right mb-3">
                <a href="booking.php"><button>Reserve Now</button></a>
            </div>
        </div>
    </div>
</section>

<!-- index body -->
<?php include "includes/templates/footer-inc.php";?>