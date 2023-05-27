

const first = document.querySelector('.first');
const last = document.querySelector('.last');
const password = document.querySelector('.password');
const comfirm = document.querySelector('.comfirm');
const pass_match = document.querySelector('.pass_match');
const email = document.querySelector('.email');
const signup = document.querySelector('#signup');

const register =document.querySelector('.register');
console.log("Hello");
register.addEventListener('submit',(e)=>{
    if(first.value==""||last.value==""||email.value==""){
        pass_match.innerHTML = "One or more fields is empty"
        pass_match.style.display='block';
        e.preventDefault();
    }
    if(!checkPass(password.value,comfirm.value)){
        pass_match.innerHTML = "Passwords do not match";
        pass_match.style.display='block';
        e.preventDefault();
    }
    
    
})

function checkPass(pass, comfirm){
    if(!pass=="" &&checkPasswordLength(pass)&&checkPasswordLength(pass)){
        if(pass==comfirm){
            return true;
        }
    }
    return false;
}

function checkPasswordValidity(pass) {
    // Regular expressions for letters, numbers, and special characters
    const lettersRegex = /[a-zA-Z]/;
    const numbersRegex = /[0-9]/;
    let specialCharsRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
  
    // Check if the string contains letters, numbers, and special characters
    let containsLetters = lettersRegex.test(inputString);
    let containsNumbers = numbersRegex.test(inputString);
    let containsSpecialChars = specialCharsRegex.test(inputString);
    // Return true if the string contains all three types of characters, otherwise return false
    return containsLetters && containsNumbers && containsSpecialChars;
  }

function checkPasswordLength(pass){
    if(pass.length>=8){
        return true;
    }
    return false;
}