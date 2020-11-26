var registerButton = document.getElementById('RegisterButton') ;
var clearButton = document.getElementById('ClearButton') ;
var loginIDForm = document.getElementById('loginID') ;
var nameForm = document.getElementById('name') ;
var phoneForm = document.getElementById('phone') ;
var passwordForm = document.getElementById('password') ;
var confirmPasswordForm = document.getElementById('confirmPassword') ;
var addressForm = document.getElementById('address') ;
var cityForm = document.getElementById('city') ;
var stateForm = document.getElementById('state') ;
var pincodeForm = document.getElementById('pincode') ;
var emailForm = document.getElementById('email') ;

registerButton.addEventListener('click',validate) ;

function validate(event){
    
    if(nameForm.value.length === 0){
        nameForm.focus() ;
        nameForm.style.border = "3px solid Tomato";
        nameForm.placeholder = "Enter Valid Name";
        setTimeout(function(){
            nameForm.style.border = "" ;
            nameForm.placeholder = "";
        },3000) ;
    }
    
    else if(phoneForm.value.length != 10){
        phoneForm.focus() ;
        phoneForm.value = "";
        phoneForm.style.border = "3px solid Tomato";
        phoneForm.placeholder = "Enter Valid Phone No";
        setTimeout(function(){
            phoneForm.style.border = "" ;
            phoneForm.placeholder = "";

        },3000) ;
    } 

    else if(emailForm.value.length === 0){
        emailForm.focus() ;
        emailForm.style.border = "3px solid Tomato";
        emailForm.placeholder = "Enter Valid Email ID";
        setTimeout(function(){
            emailForm.style.border = "" ;
            emailForm.placeholder = "";
        },3000) ;
    }
    else if(addressForm.value.length === 0){
        addressForm.focus() ;
        addressForm.style.border = "3px solid Tomato";
        addressForm.placeholder = "Enter Valid Address";
        setTimeout(function(){
            addressForm.style.border = "" ;
            addressForm.placeholder = "";
        },3000) ;
    }
    else if(cityForm.value.length === 0 || !isNaN(cityForm.value)){
        cityForm.focus() ;
        cityForm.value = "";
        cityForm.style.border = "3px solid Tomato";
        cityForm.placeholder = "Enter Valid City";
        setTimeout(function(){
            cityForm.style.border = "" ;
            cityForm.placeholder = "";
        },3000) ;    
    }
    else if(stateForm.value.length === 0 || !isNaN(cityForm.value)){
        stateForm.focus() ;
        stateForm.value = "";
        stateForm.style.border = "3px solid Tomato";
        stateForm.placeholder = "Enter Valid State";
        setTimeout(function(){
            stateForm.style.border = "" ;
            stateForm.placeholder = "";
        },3000) ;
    }
    else if(pincodeForm.value.length === 0){
        pincodeForm.focus() ;
        pincodeForm.style.border = "3px solid Tomato";
        pincodeForm.placeholder = "Enter Valid Pincode";
        setTimeout(function(){
            pincodeForm.style.border = "" ;
            pincodeForm.placeholder = "";
        },3000) ;
    } 
    else if(passwordForm.value.length === 0){
        passwordForm.focus() ;
        passwordForm.style.border = "3px solid Tomato";
        passwordForm.placeholder = "Enter Valid Password";
        setTimeout(function(){
            passwordForm.style.border = "" ;
            passwordForm.placeholder = "";

        },3000) ;
    }
    else if(confirmPasswordForm.value.length === 0){
        confirmPasswordForm.focus() ;
        confirmPasswordForm.style.border = "3px solid Tomato";
        confirmPasswordForm.placeholder = "Enter Valid Password";
        setTimeout(function(){
            confirmPasswordForm.style.border = "" ;
            confirmPasswordForm.placeholder = "";

        },3000) ;
    }
  
    else{
        console.log('Success') ;
    }
}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}