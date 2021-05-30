<?php
	session_start();
	if(!isset ($_SESSION['email'])  || ($_SESSION["role"]) !== 'admin') {
		header("location:authentification.php");
        
	}
    include "includes/templates/header-adm.php";
 ?>
<!-- index body -->
<center><h1 class="heading-body m-4">Our Reservations</h1></center>

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
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
window.onload = fetchData;
function fetchData(){
    
    var xhr = new XMLHttpRequest(); 

    xhr.open("GET","../controller/C-adm-dsh.php",true);

    xhr.onload = function(){

        
        if(this.status == 200){
            var jsobj = JSON.parse(this.responseText);
            output =  ''
            for (i in jsobj){
                
                output +=     
                    '<tr>'+
                        '<td>'+i+'</td>'+
                        '<td>'+jsobj[i].dateReservation+'</td>'+
                        '<td>'+jsobj[i].checkIn+'</td>'+
                        '<td>'+jsobj[i].chekOut+'</td>'+
                        '<td>'+jsobj[i].Fname+'</td>'+
                        '<td>'+jsobj[i].Lname+'</td>'+
                        '<td>'+jsobj[i].email+'</td>'+
                        
                        '<td>'+'<input type="hidden" value="'+jsobj[i].email+'">'+'<button  class="btnModal"  id="'+jsobj[i].idReservation+'"  type="button"  data-toggle="modal" data-target="#exampleModal" ><i class="far fa-eye"></i></button>'+'</td>'+
                        
        
                    '</tr>'
            }
            document.getElementById('table').innerHTML = `   <tr>
        <th>Reservation N°</th>   
        <th>Date Reservation</th>    
        <th>Check in</th>
        <th>Check out</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Information</th>
        
        
    </tr>` +output
        }
        
    }
    xhr.send();
}
document.getElementsByClassName('btnModal').addEventListener('click',(e)=>{
    
        console.log(e.target.id)
    
})
document.addEventListener('click',(e)=>{
    
    console.log(e.target.id)
})

function x(e){
    
    console.log(e.target.id)
}
</script>
<!-- index body -->
<?php include "includes/templates/footer-inc.php";?>