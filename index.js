const checkBox = document.querySelector('#check');
const password = document.querySelector('#password');


checkBox.addEventListener('change',()=>{
    if(checkBox.checked){
        password.type='text';
    }else{
        password.type='password';
    }
})