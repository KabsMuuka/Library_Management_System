const bookbtn = document.querySelector('.book-btn');
const card = document.querySelector('.addBook');
const cancel = document.querySelector('.btn-cancel');
const add = document.querySelector('add');

bookbtn.addEventListener('click',()=>{
   card.classList.add('showCard');
})

cancel.addEventListener('click',()=>{
    card.classList.remove('showCard');
})

add.addEventListener('click',()=>{
    card.classList.remove('showCard');
})