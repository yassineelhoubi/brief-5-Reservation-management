
/* property */

function select_property() {

    var property = document.getElementById('property').value;
    console.log(property);

    if (property == "hotel") {
        /* Room */
        document.getElementById('title-room').innerHTML = `<center>Room type<hr></center>`
        document.getElementById('room').innerHTML = `  
            <select class="browser-default custom-select mb-4 dom" id="room">
            <option value="" disabled="" selected="">Room</option>
            <option value="single room">single room</option>
            <option value="double room">double room</option>
            </select>
            `
        /* persons */
        document.getElementById('title-persons').innerHTML = `<center>Persons<hr></center>`
        document.getElementById('persons').innerHTML = `  
            <div class="col-sm-6">
                <input name="adults" placeholder="Adults" type="number" class="form-control datepicker mb-4 ">
            </div>
            <div class="col-sm-6">
                <input name="children" id='nbr_child' placeholder="Number of Children" type="number" class="form-control datepicker mb-4 " onkeyup="childs_input()" onchange="childs_input()">
            </div>
            `
        /* pension */
        document.getElementById('title-pension').innerHTML = `<center>Pension<hr></center>`
        document.getElementById('pension').innerHTML = `<select  class="form-control dom">
            <option value="" disabled="" selected="">Select type of Pension</option>
            <option value="compleet">Complete</option>
            <option value="half">Breakfast / Lunch</option>
            <option value="half">Breakfast / Dinner</option>
            <option value="without">without</option>
            </select>`

    } else {
        /* document.getElementById('hotel-div').innerHTML =`` */
        document.getElementById('title-room').innerHTML = ``
        document.getElementById('room').innerHTML = ``
        document.getElementById('view-type').innerHTML = ``
        document.getElementById('bed-type').innerHTML = ``
        document.getElementById('title-persons').innerHTML = ``
        document.getElementById('persons').innerHTML = ``
        document.getElementById('child_select').innerHTML = ``
        document.getElementById('title-pension').innerHTML = ``
        document.getElementById('pension').innerHTML = ``
    }
}
/* Room Type */
document.addEventListener('change', (e) => {
    if (e.target.value == 'double room') {
        document.getElementById('view-type').innerHTML = ``
        document.getElementById('bed-type').innerHTML = `<div >
            <select class="browser-default custom-select mb-4 dom" id="select">
            <option value="" disabled="" selected="">Bed</option>
            <option value="double bed">Double Bed</option>
            <option value="2 Single Beds">2 Single Beds</option>
            </select>
            </div>`

    } else if (e.target.value == 'single room') {
        document.getElementById('bed-type').innerHTML = ``
        document.getElementById('view-type').innerHTML = `<div >
            <select class="browser-default custom-select mb-4 dom" id="select">
            <option value="" disabled="" selected="">View</option>
            <option value="interior view">interior view</option>
            <option value="exterior view">exterior view</option>
            </select>
            </div>`
    }
})
/* Room Type view if target Double Room  */
document.addEventListener('change', (e) => {
    if (e.target.value == 'double bed') {
        document.getElementById('view-type').innerHTML = `<div >
            <select class="browser-default custom-select mb-4 dom" id="select">
            <option value="" disabled="" selected="">View</option>
            <option value="interior view">interior view</option>
            <option value="exterior view">exterior view</option>
            </select>
            </div>`
    } else if (e.target.value == '2 Single Beds') {
        document.getElementById('view-type').innerHTML = `<div >
        <select class="browser-default custom-select mb-4 dom" id="select">
        <option value="" disabled="" selected="">View</option>
        <option value="interior view">interior view</option>
        </select>
        </div>`
    }
})
/* list for age of child */
function childs_input() {
    const nbr_child = document.getElementById('nbr_child').value;

    document.querySelector('#child_select').innerHTML = ``;
    for (i = 1; i <= nbr_child; i++) {
        document.querySelector('#child_select').innerHTML += ` 
        <div class=" col-12 child-offer">
            
                <select class="col-sm-5 m-3 select-age browser-default custom-select " name="" id="child-age-` + i + `"  >
                    <option value="" disabled="" selected="">child age ` + i + `</option>
                    <option value="2"> age<= 2 </option> 
                    <option value="2.14"> 2 < age < 14 </option> 
                    <option value="14">age => 14 </option>
                </select>
            
            
                <select id = "select-offer` + i + `" name="slc_rm" class="col-sm-5 m-3 select-offer` + i + ` browser-default custom-select dom">        
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
            if (e.target.id == `child-age-${i}` && e.target.value == "2")  {
                document.querySelector(`#select-offer${i}`).innerHTML = ``
                document.querySelector(`#select-offer${i}`).innerHTML += `
        
        <option value="no supplement child bed 0 DH">no supplement child bed 0 DH</option> 
        <option value="child bed supplement 25% single room">child bed supplement 25% single room</option>`


            } else if (e.target.id == `child-age-${i}` && e.target.value == "2.14") {
                document.querySelector(`#select-offer${i}`).innerHTML = ``
                document.querySelector(`#select-offer${i}`).innerHTML += `
        <option value="add 50% single room">add 50% single room</option> `
            } else if (e.target.id == `child-age-${i}` && e.target.value == "14") {
                document.querySelector(`#select-offer${i}`).innerHTML = ``
                document.querySelector(`#select-offer${i}`).innerHTML += `
        <option value="add a single room">add a single room</option>
        <option value="add 70% single room + bed">add 70% single room + bed</option>
        `
            }
        
        
    }
})

function addProperty() {


    document.getElementById('addProperty').innerHTML += ``
    document.getElementById('title-room').innerHTML = ``
    document.getElementById('room').innerHTML = ``
    document.getElementById('view-type').innerHTML = ``
    document.getElementById('bed-type').innerHTML = ``
    document.getElementById('title-persons').innerHTML = ``
    document.getElementById('persons').innerHTML = ``
    document.getElementById('child_select').innerHTML = ``
    document.getElementById('title-pension').innerHTML = ``
    document.getElementById('pension').innerHTML = ``
}

let i=0
function  booking(){
    
    i++;
    let sel = document.querySelectorAll('.dom');
    var arr = Array.from(sel);
    var singleBranch =[];
    arr.forEach(function(item , index){
        singleBranch[index] = item.value;
    })
    console.log( singleBranch);
    addProperty();
}