const loginIDForm = document.querySelector('#loginID') ;
const passwordForm = document.querySelector('#password') ;
const loginButton = document.querySelector('#LoginButton') ;
const clearButton = document.querySelector('#ClearButton') ;
const completeForm = document.querySelector('#loginFormText') ;

loginButton.addEventListener('click',validate) ;

function validate(event){
    event.preventDefault() ;
    //console.log(loginIDForm.length)
    if(loginIDForm.value.length == 0 ){
        /*
        loginIDForm.focus() ;
        var errorMessage = document.createElement('p')
        var errorTextNode = document.createTextNode('Login ID Field Empty') ;
        errorMessage.appendChild(errorTextNode) ;
        errorMessage.style.color = 'rgba(255,0,0,.5)' ;
        errorMessage.style.display = 'inline-block' ;
        loginIDForm.style.border = "2px solid rgba(255,0,0,.5)" ;
        insertAfter(errorMessage,loginIDForm) ;
        setTimeout(function(){
            loginIDForm.style.border = "" ;
            completeForm.removeChild(errorMessage) ;
        },2000) ;
        */
    }
    else if(passwordForm.value.length == 0){
        /*
        passwordForm.focus() ;
        var errorMessage = document.createElement('P')
        var errorTextNode = document.createTextNode('Password Field Empty') ;
        errorMessage.appendChild(errorTextNode) ;
        errorMessage.style.color = 'rgba(255,0,0,.5)' ;
        errorMessage.style.display = 'inline-block' ;
        passwordForm.style.border = "2px solid rgba(255,0,0,.5)" ;
        insertAfter(errorMessage,passwordForm) ;
        setTimeout(function(){
            passwordForm.style.border = "" ;
        },2000) ;
        completeForm.removeChild(errorMessage) ;
        */
    }
}

window.onload = function(event){
    completeForm.reset() ;
}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}