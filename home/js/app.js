const menu = document.querySelector('.menu-icon');
const menuBar = document.querySelector('.menu-bar');
const menus = document.querySelector('.menus');
const profile = document.querySelector('.user-profile1');

const user = document.querySelector('.user-profile');
const nav = document.querySelector('.nav-elements');

console.log(menu);
console.log(menuBar.innerHTML);
menu.addEventListener('click',()=>{



    menus.classList.toggle('showAll');
    if(menuBar.innerHTML=='close'){
        menuBar.innerHTML='menu';
    }else if(menuBar.innerHTML=='menu'){
        menuBar.innerHTML='close';
    }
});

const year = document.querySelector('.year');

let thisYear = new Date();
year.innerHTML =thisYear.getFullYear();



profile.addEventListener('click',()=>{
    menus.classList.toggle('hidden');
})

