const menu = document.querySelector('.menu-icon');
const menuBar = document.querySelector('.menu-bar');

const user = document.querySelector('.user-profile');
const nav = document.querySelector('.nav-elements');

menu.addEventListener('click',()=>{

    user.classList.toggle('show');
    nav.classList.toggle('show');
    if(menuBar.innerHTML=='close'){
        menuBar.innerHTML='menu';
    }else if(menuBar.innerHTML=='menu'){
        menuBar.innerHTML='close';
    }
});

const year = document.querySelector('.year');

let thisYear = new Date();
year.innerHTML =thisYear.getFullYear();

const menus = document.querySelector('.menus');
const profile = document.querySelector('.user-profile1');

profile.addEventListener('click',()=>{
    menus.classList.toggle('hidden');
})

