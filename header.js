function Dropdown(){
  var x=document.getElementById("mydropdown");
  if((x.style.display==="none") || (x.style.display==="")){
    x.style.display="block";
  }
  
  else{
   x.style.display = "none";
  }

}