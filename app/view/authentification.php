<?php
session_start();
if(isset ($_SESSION['email'])  ) {
  header("location:index.php"); 
}
 include "includes/templates/header-inc.php";
 ?>
<!-- index body -->
<hr class="m-5">
<div class="container mt-5 mb-5 col-lg-3 col-md-6 col-sm-8">
  <form method="POST" action="../controller/ControlerUsers.php">
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email">
      <div class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password">
    </div>

    <button type="submit" name="login" class="btn btn-primary">Submit</button>
    <div class="form-text">Don't have account?<a href="signup.php"> Signup Now</a></div>
  </form>
</div>
<hr class="m-5">
<!-- index body -->
<?php include "includes/templates/footer-inc.php";?>