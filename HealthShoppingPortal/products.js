var num = 0;
  num = document.getElementById("itemCount").innerHTML;
function decrement(){
  num--;
  if(num <= 0){
  document.getElementById("itemCount").innerHTML = 0;
  document.getElementById("itemCount2").innerHTML = 0;
  num = 0;
  }
  else
  document.getElementById("itemCount").innerHTML = num;
  document.getElementById("itemCount2").innerHTML = num; 
}

function increment(){
  document.getElementById("itemCount").innerHTML = ++num;
  document.getElementById("itemCount2").innerHTML = num;
}

function addToCart(){
    if(num == 0){
        document.getElementById("alert").style.display = "block";
        setTimeout(function(){
            document.getElementById("alert").style.display = "none";     
        },2000) ;
    }
    else{
        document.getElementById("success").style.display = "block";
        setTimeout(function(){
            document.getElementById("success").style.display = "none";  
            $('#staticBackdrop').modal('hide');
            document.getElementById("itemCount").innerHTML = 1;
            document.getElementById("itemCount2").innerHTML = 1;
            num = 1;
        },2000); 
    }
   
    
}