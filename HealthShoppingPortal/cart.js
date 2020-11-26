var num = 0;
  num = document.getElementById("itemCount").innerHTML;
function decrement(){
  num--;
  if(num <= 0){
  document.getElementById("itemCount").innerHTML = 0;
  num = 0;
  }
  else
  document.getElementById("itemCount").innerHTML = num;
}

function increment(){
  document.getElementById("itemCount").innerHTML = ++num;   
}

