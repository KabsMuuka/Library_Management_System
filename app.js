

const first = document.querySelector('.first');
const last = document.querySelector('.last');
const password = document.querySelector('.password');
const comfirm = document.querySelector('.comfirm');
const pass_match = document.querySelector('.pass_match');
const email = document.querySelector('.email');
const signup = document.querySelector('#signup');

const register =document.querySelector('.register');

register.addEventListener('submit',(e)=>{
    if(!(first.value==""||last.value==""||email.value=="")){
        if(checkPass(password.value,comfirm.value)){
            if(checkPasswordLength(password.value)){
                if(!checkPasswordValidity(password.value)){
                    pass_match.innerHTML = "password needs to have special chars and numbers";
                    pass_match.style.display='block';
                    e.preventDefault();
                }
            }else{
                pass_match.innerHTML = "Passwords too short, 8 or more characters";
                pass_match.style.display='block';
                e.preventDefault();
            }
        }else{
            pass_match.innerHTML = "Passwords do not match";
            pass_match.style.display='block';
            e.preventDefault();
        }
    }else{
        pass_match.innerHTML = "One or more fields is empty"
        pass_match.style.display='block';
        e.preventDefault();
    }  
    
})

function checkPass(pass, comfirm){
    if(!pass==""){
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
    let containsLetters = lettersRegex.test(pass);
    let containsNumbers = numbersRegex.test(pass);
    let containsSpecialChars = specialCharsRegex.test(pass);
    // Return true if the string contains all three types of characters, otherwise return false
    return containsLetters && containsNumbers && containsSpecialChars;
  }

function checkPasswordLength(pass){
    if(pass.length>=8){
        return true;
    }else{
            return false;
    }

}