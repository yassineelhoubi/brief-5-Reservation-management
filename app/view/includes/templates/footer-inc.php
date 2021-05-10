<footer class=" footer-style text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 ">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

      <!-- Google -->
      <a class="btn btn-outline-light m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

    </section>

    <!-- Section: Social media -->

    <!-- sign up -->
    <?php
	  if(!isset ($_SESSION['email'])) {    
	  ?>
    <section class="sign-up">
      <p class="d-flex justify-content-center align-items-center">
        <span class="m-3">Register Now</span>
        <a href="signup.php"><button type="button" class="btn btn-outline-light rounded-pill">Sign up</button>



        </a>
      </p>
    </section>
    <?php
    }
    ?>
  </div>
  

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-white" href="#">Guest House</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="layout/js/bootstrap.min.js"></script>
<script src="layout/js/header-active.js"></script>
<script src="layout/js/process-booking.js"></script>
</body>

</html>