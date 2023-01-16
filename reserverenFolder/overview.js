document.getElementById("afspraakdatum").onchange=function(){

  updateValue();
}

function updateValue(){
  document.getElementById("afspraakdatum").style.backgroundColor = "var(--Paars)";

  var input = document.getElementById("afspraakdatum").value;
  let datum = new Date(input);
  document.getElementById("output").innerHTML= datum.getDate() + "-" + (datum.getMonth()+1)+"-" + datum.getFullYear();

}





 function myFunction() {

        var keuzeb = document.getElementsByName("keuzebehandeling");
        var over = document.getElementsByName("keuzebehandelingoverig");
        var fin = document.getElementsByName("keuzefinish");
        var rem = document.getElementsByName("keuzereminder");
        var tijd = document.getElementsByName("keuzetijd");
        
          for (var opt of keuzeb){
            if (opt.checked){
              let option = opt.value.split(",");
              document.getElementById("kb").innerHTML = option[0];
            }
          }

          for (var opt of over){
            if (opt.checked){
              let option = opt.value.split(",");
              document.getElementById("ov").innerHTML = option[0];
            }
          }

          for (var opt of fin){
            if (opt.checked){
              let option = opt.value.split(",");
              document.getElementById("fi").innerHTML = option[0];
            }
          }

          for (var opt of rem){
            if (opt.checked){
              let option = opt.value.split(",");
              document.getElementById("re").innerHTML = option[0];
            }
          }

          for (var opt of tijd){
            if (opt.checked){
              let option = opt.value.split(",");
              document.getElementById("ti").innerHTML = option[0];
            }
          }

        }


// calculate totaal
function calc(){
  let totaalprijs=0;
  let totaaltijd=0;

  var rates = document.getElementsByTagName("input");
  var value_prijs=0;
  var value_tijd=0;
  for(var i = 0; i < rates.length; i++){
      if(rates[i].checked){
        let option = rates[i].value.split(",");
        value_prijs = option[2];
        value_tijd = option[1];

          // console.log(value_prijs);
          
           totaalprijs+=parseInt(value_prijs);
           totaaltijd+=parseInt(value_tijd);

      }
      
  }
  
  if (totaaltijd >= 60){

    const uren = Math.floor(totaaltijd /60);
    const minuten = totaaltijd % 60;

    if (minuten > 0){

    document.getElementById("total").innerHTML = totaalprijs+ " eur" +", " +uren +" uur en " +minuten +" minuten";
    }
    else{
      document.getElementById("total").innerHTML = totaalprijs+ " eur" +", " +uren +" uur";

    }
  
  }
  else{
    document.getElementById("total").innerHTML = totaalprijs+ " eur" +", " +totaaltijd +" minuten";
  }
 
}