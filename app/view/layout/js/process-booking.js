function addProperty() {


    document.getElementById('addProperty').innerHTML += `          
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
        </div>`

}

/* property */

function select_property() {

    var property = document.getElementById('property').value;
    console.log(property);

    if (property == "hotel") {
        /* Room */
        document.getElementById('title-room').innerHTML = `<center>Room type<hr></center>`
        document.getElementById('room').innerHTML = `  
            <select class="browser-default custom-select mb-4" id="room">
            <option value="" disabled="" selected="">Room</option>
            <option value="single room">single room</option>
            <option value="double room">double room</option>
            </select>
            `
        /* persons */
        document.getElementById('title-persons').innerHTML = `<center>Persons<hr></center>`
        document.getElementById('persons').innerHTML = `  <div class="col-sm-6">
            <input name="adults" placeholder="Adults" type="number" class="form-control datepicker mb-4">
            </div>
            <div class="col-sm-6">
            <input name="children" id='nbr_child' placeholder="Number of Children" type="number" class="form-control datepicker mb-4" onkeyup="childs_input()">
            </div>
            `
        /* pension */
        document.getElementById('title-pension').innerHTML = `<center>Pension<hr></center>`
        document.getElementById('pension').innerHTML = `<select  class="form-control">
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
            <select class="browser-default custom-select mb-4" id="select">
            <option value="" disabled="" selected="">Bed</option>
            <option value="double bed">Double Bed</option>
            <option value="2 Single Beds">2 Single Beds</option>
            </select>
            </div>`

    } else if (e.target.value == 'single room') {
        document.getElementById('bed-type').innerHTML = ``
        document.getElementById('view-type').innerHTML = `<div >
            <select class="browser-default custom-select mb-4" id="select">
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
            <select class="browser-default custom-select mb-4" id="select">
            <option value="" disabled="" selected="">View</option>
            <option value="interior view">interior view</option>
            <option value="exterior view">exterior view</option>
            </select>
            </div>`
    } else if (e.target.value == '2 Single Beds') {
        document.getElementById('view-type').innerHTML = `<div >
        <select class="browser-default custom-select mb-4" id="select">
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
            
                <select class="col-sm-5 m-3 select-age browser-default custom-select" name="" id="child-age-` + i + `"  >
                    <option value="" disabled="" selected="">child age ` + i + `</option>
                    <option value="2"> age<= 2 </option> 
                    <option value="2.14"> 2 < age < 14 </option> 
                    <option value="14">age => 14 </option>
                </select>
            
            
                <select id = "select-offer` + i + `" name="slc_rm" class="col-sm-5 m-3 select-offer` + i + ` browser-default custom-select ">        
                </select>
            
        </div>`


    }
}
/*  */



// document.addEventListener(`change` ,function(){
// const a = document.querySelectorAll('.child-offer')
// a.forEach(element => { 
//     element.addEventListener(`click`, function(){
//         var interval_age = element.querySelector(".select-age").value
//     if(interval_age == 2){
//         element.querySelector('.select-offer').innerHTML = ``;
//         element.querySelector('.select-offer').innerHTML +=`

//         <option value="jkdjkds">no supplement child bed 0 DH</option> 
//         <option value="sdsdsd">child bed supplement 25% single room</option>`


//     }
//     else if (interval_age == 2.14){
//         element.querySelector('.select-offer').innerHTML = ``;
//         element.querySelector('.select-offer').innerHTML +=`
//         <option value="">add 50% single room</option> `
//     }else if (interval_age == 14 ){
//         element.querySelector('.select-offer').innerHTML = ``;
//         element.querySelector('.select-offer').innerHTML +=`
//         <option value="">add a single room</option>
//         <option value="">add 70% single room + bed</option>
//         `
//     }
// })
// });
// })

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
        
        <option value="jkdjkds">no supplement child bed 0 DH</option> 
        <option value="sdsdsd">child bed supplement 25% single room</option>`


            } else if (e.target.id == `child-age-${i}` && e.target.value == "2.14") {
                document.querySelector(`#select-offer${i}`).innerHTML = ``
                document.querySelector(`#select-offer${i}`).innerHTML += `
        <option value="">add 50% single room</option> `
            } else if (e.target.id == `child-age-${i}` && e.target.value == "14") {
                document.querySelector(`#select-offer${i}`).innerHTML = ``
                document.querySelector(`#select-offer${i}`).innerHTML += `
        <option value="">add a single room</option>
        <option value="">add 70% single room + bed</option>
        `
            }
        // })
        
    }
})



/*  */
/* function offer_child(){
    for (i = 1; i <= 2; i++) {
        console.log('child-age-'+i);
        const id_child_select = document.getElementById('child-age-'+i);
        id_child_select.addEventListener('change', function(){
            if (e.target.value == 'yassine'){
                console.log('okokok');

            }
        })

    }
}


function generateOtions {
    // create option elements
    opt = document.createElement('option')

    select = document.querySelector('[name="slc_rm"]')
    select.appendChild(opt)
}

function generateChildInput () {
    //create element for input
    div = document.createElement('div')

    cont.appendChild(div)

    div.addEventListener('input', (e) => {

    })


}

function removeChildInput() {
    CredentialsContainer.
} */