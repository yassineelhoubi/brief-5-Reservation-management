function fetchData() {
    var a = 1
    var xhr = new XMLHttpRequest();

    xhr.open("GET", '../controller/C-adm-dsh.php?fetch-R', true);

    xhr.onload = function () {
      console.log(xhr)

      if (this.status == 200) {
        var jsobj = JSON.parse(this.responseText);

        output = ''
        for (i in jsobj) {

          output +=
            '<tr>' +
            '<td>' + i + '</td>' +
            '<td>' + jsobj[i].dateReservation + '</td>' +
            '<td>' + jsobj[i].checkIn + '</td>' +
            '<td>' + jsobj[i].chekOut + '</td>' +
            '<td>' + jsobj[i].Fname + '</td>' +
            '<td>' + jsobj[i].Lname + '</td>' +
            '<td>' + jsobj[i].email + '</td>' +

            '<td>' + '<button  class="btnModal"  onclick="fetchInfo(' + jsobj[i].idReservation + ')"  type="button"  data-toggle="modal" data-target="#exampleModal" ><i class="far fa-eye"></i></button>' +
            '</td>' +


            '</tr>'
        }

        document.getElementById('table').innerHTML =
          `   <tr>
                  <th>Reservation N°</th>   
                  <th>Date Reservation</th>    
                  <th>Check in</th>
                  <th>Check out</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Information</th>
        
        
              </tr>` + output
      }

    }
    xhr.send();
  }

  function fetchInfo(e) {
    console.log(e)

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../controller/C-adm-dsh.php?R-info=" + e, true)
    xhr.onload = function () {
      if (this.status == 200) {
        var data = JSON.parse(this.responseText)
       
        output = ""
        for(i in data){
          console.log("id of property  ",i," : ",data[i].idProperty)

          var x =data[i].idProperty;

          x == 5 ? output+='<li>Bangalow</li>' 
          : x==6 ? output+='<li>Apartments</li>' 
          : x==7 ? output+='<li> Single Room , Interior View</li>' 
          : x==8 ? output+='<li>Single Room , exterior View</li>' 
          : x==9 ? output+='<li>Double Room , Double Bed , Interior View</li>' 
          : x==10 ? output+='<li>Double Room , Double Bed , Exterior View<l/i>'
          : x==11 ? output+='<li>Double Room , 2 Single Bed , Exterior View</li>'
          : x==12 ? output+='<li>No Supplement Child Bed</li>'
          : x==13 ? output+='<li>Child Bed Supplement 25% Single Room</li>'
          : x==14 ? output+='<li>Add 50% Single Room</li>'
          : x==15 ? output+='<li>Add a Single Room</li>'
          : x==16 ? output+='<li>Add 70% Single Room + Bed</li>'
          : x==17 ? output+='<li>Pension : Complet</li>'
          : x==18 ? output+='<li>Pension : Breakfast / Lunch</li>'
          : x==19 ? output+='<li>Pension : Breakfast / Dinner</li>'
          :  output+='<li>Pension : without</li>';

        }
        document.getElementById('listInfo').innerHTML=output
      }
    }
    xhr.send()

  }