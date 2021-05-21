


const curentLocation = location.href;
const menuItem = document.querySelectorAll('.nav-link');
const menuLenght = menuItem.length;
console.log(menuItem[0].href);
for (let i=0 ; i<=menuLenght ; i++){
    if(menuItem[i].href === curentLocation){
        menuItem[i].className = "nav-link active"
    }
}


