/* property */
const addRoom = document.getElementById('addRoom');

const btnaddRoom    =   document.getElementById('addRoom-btn');

const hoteldiv = document.getElementById('hotel-div')

const nbrOfroom   =   document.querySelector('.nbrOfroom');


let i = 1;
btnaddRoom.addEventListener('click',function(){
    document.getElementById('title-persons').style.display='block'
    document.getElementById('persons').style.display = 'flex'
})
btnaddRoom.addEventListener('click', function () {
    nbrRoom = addRoom.value
    hoteldiv.innerHTML =``
    for(i=1 ; i<=nbrRoom ; i++){
        
    hoteldiv.innerHTML += `
            <!-- Room -->

            <div class="col-12 mt-3" id="title-room">
                <center>
                <hr>Room Type N°${i}
                    
                </center>
            </div>
            <div id="room${i}" class="col-sm-4">

                <select class="browser-default custom-select mb-4 " id="room${i}" name="room[${i}][Roomtype]" >
                    <option value="" disabled="" selected="">Room</option>
                    <option value="single room">single room</option>
                    <option value="double room">double room</option>
                </select>
            </div>

            <!-- Bed Type -->

            <div id="bed-type${i}" class="col-sm-4"></div>

            <!-- View Type -->

            <div id="view-type${i}" class="col-sm-4"></div>

            <!-- pension -->

            <div class="col-12 mt-2" id="title-pension">
                <center>Pension N°${i}
                    
                </center>
            </div>
            <div class="col-12" id="pension${i}"><select class="form-control " name="pension[${i}][idpension]">
                    <option value="" id="pension${i}" disabled="" selected="">Select type of Pension</option>
                    <option value="17">Complete</option>
                    <option value="18">Breakfast / Lunch</option>
                    <option value="19">Breakfast / Dinner</option>
                    <option value="20">without</option>
                </select>
            </div>
    `
}
    
})

function select_property() {
 
    var property = document.getElementById('property').value;
    console.log(property);

    if (property == "hotel") {

        nbrOfroom.style.display="flex"


    }else {
        nbrOfroom.style.display="none"

        document.getElementById('hotel-div').innerHTML =``
        
        document.getElementById('child_select').innerHTML = ``

        document.getElementById('title-persons').style.display='none'
        document.getElementById('persons').style.display = 'none'

    }
}

/* Room Type */
document.addEventListener('change', (e) => {
    for (let j = 1; j <= i; j++) {
        if (e.target.id == `room${j}` && e.target.value == 'double room') {
            document.getElementById(`view-type${j}`).innerHTML = ``
            document.getElementById(`bed-type${j}`).innerHTML = `<div >
            <select required id="bed-type${j}" class="browser-default custom-select mb-4 dom" id="select" name="room[${j}][bedtype]">
            <option value="" disabled="" selected="">Bed</option>
            <option value="double bed">Double Bed</option>
            <option value="2 Single Beds">2 Single Beds</option>
            </select>
            </div>`

        } else if (e.target.id == `room${j}` && e.target.value == 'single room') {
            document.getElementById(`bed-type${j}`).innerHTML = ``
            document.getElementById(`view-type${j}`).innerHTML = `<div >
            <select required class="browser-default custom-select mb-4 dom" id="select" name="room[${j}][viewtype]">
            <option value="" disabled="" selected="">View</option>
            <option value="interior view">interior view</option>
            <option value="exterior view">exterior view</option>
            </select>
            </div>`
        }
    }
})
/* Room Type view if target Double Room  */
document.addEventListener('change', (e) => {
    for (let j = 1; j <= i; j++) {
        if (e.target.id == `bed-type${j}`  && e.target.value == 'double bed') {
            document.getElementById(`view-type${j}`).innerHTML = `<div >
            <select required class="browser-default custom-select mb-4 dom" id="select" name="room[${j}][viewtype]">
            <option value="" disabled="" selected="">View</option>
            <option value="interior view">interior view</option>
            <option value="exterior view">exterior view</option>
            </select>
            </div>`
        } else if (e.target.id == `bed-type${j}` && e.target.value == '2 Single Beds') {
            document.getElementById(`view-type${j}`).innerHTML = `<div >
        <select  class="browser-default custom-select mb-4 dom" id="select" name="room[${j}][viewtype]">
        
        <option value="interior view">interior view</option>
        </select>
        </div>`
        }
    }
})
/* list for age of child */
function childs_input() {
    const nbr_child = document.getElementById('nbr_child').value;

    document.querySelector('#child_select').innerHTML = ``;
    for (i = 1; i <= nbr_child; i++) {
        document.querySelector('#child_select').innerHTML += ` 
        <div class=" col-12 child-offer">
            
                <select required class="col-sm-5 m-3 select-age browser-default custom-select " name="" id="child-age-` + i + `"  >
                    <option value="" disabled="" selected="">child age ` + i + `</option>
                    <option value="2"> age<= 2 </option> 
                    <option value="2.14"> 2 < age < 14 </option> 
                    <option value="14">age => 14 </option>
                </select>
            
            
                <select id = "select-offer` + i + `"  class="col-sm-5 m-3 select-offer` + i + ` browser-default custom-select " name="offerschild[${i}][idofferschild]">        
                </select>
            
        </div>`


    }
}
/*  */


document.addEventListener("change", function (e) {
    // const a = document.querySelectorAll('.child-offer')
    const nbchild = document.getElementById('nbr_child').value;

    for (let i = 1; i <= nbchild; i++) {
        const idenf = document.getElementById(`child-age-${i}`);
        // idenf.addEventListener("change", function () {
        // var interval_age = element.querySelector(".select-age").value
        if (e.target.id == `child-age-${i}` && e.target.value == "2") {
            document.querySelector(`#select-offer${i}`).innerHTML = ``
            document.querySelector(`#select-offer${i}`).innerHTML += `
        
        <option value="12">no supplement child bed 0 DH</option> 
        <option value="13">child bed supplement 25% single room</option>`


        } else if (e.target.id == `child-age-${i}` && e.target.value == "2.14") {
            document.querySelector(`#select-offer${i}`).innerHTML = ``
            document.querySelector(`#select-offer${i}`).innerHTML += `
        <option value="14">add 50% single room</option> `
        } else if (e.target.id == `child-age-${i}` && e.target.value == "14") {
            document.querySelector(`#select-offer${i}`).innerHTML = ``
            document.querySelector(`#select-offer${i}`).innerHTML += `
        <option value="15">add a single room</option>
        <option value="16">add 70% single room + bed</option>
        `
        }


    }
})
let x=2;
/* add property */
function addProperty(){
   
    document.getElementById('divProperty').innerHTML +=`
    <div class="row mt-4 mr-1">
    <div class="col-md-11 col-sm-10 col-10  ">
        <select class="browser-default custom-select mb-4 dom" id="property[${x}]" onchange="select_property()" name="typeproperty[${x
        }][type]">
            <option value="" disabled="" selected="">Property</option>
            <option value="bungalow">Bungalow</option>
            <option value="apartments">Apartments</option>
        </select>
    </div>
    <button class="col-md-1 col-sm-2 col-2  " type="button" onclick="addProperty()" style="height: fit-content;">
        <i class="fas fa-plus"></i>
    </button>
    </div>
    ` 
    x++;

}

