<?php
	session_start();
	if(!isset ($_SESSION['email'])  || ($_SESSION["role"]) !== 'admin') {
		header("location:authentification.php");
        
	}
    include "includes/templates/header-adm.php";
 ?>
<!-- index body -->
<center>
  <h1 class="heading-body m-4">Our Reservations</h1>
</center>

<table id="table" class="mb-4 table table-dark table-striped table-hover">

</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul id="listInfo">

        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="layout/js/adm-dsh.js">
 
</script>
<!-- index body -->
<?php include "includes/templates/footer-inc.php";?>