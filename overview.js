//1.als klant service & datum geklikt heeft,stuur deze data naar backend toe
//bron:https://www.freecodecamp.org/chinese/news/how-to-make-api-calls-with-fetch/
let datumStuur = document.getElementById("afspraakdatum")
datumStuur.addEventListener('change', infoButtonListener)

let infoButtons = document.querySelectorAll(".datatime")
for (var i = 0; i < infoButtons.length; i++) {
  const infoButton = infoButtons[i];
  infoButton.addEventListener('click', infoButtonListener)
}

function infoButtonListener() {
  let tijdendisplay = document.querySelector(".tijdendisplay");
  var keuzeb = document.getElementsByName("keuzebehandeling");
  var over = document.getElementsByName("keuzebehandelingoverig");
  var fin = document.getElementsByName("keuzefinish");

  console.log(fin);
  let gekozen = 0;
  for (var i = 0; i < keuzeb.length; i++) {
    let keuzebb = keuzeb[i];
    if (keuzebb.checked) {
      gekozen = keuzebb.value.split(",")[1];
    }
  }
  console.log(gekozen)
  let gekozenOverig = 0;
  for (var i = 0; i < over.length; i++) {
    let overig = over[i];

    if (overig.checked) {
      gekozenOverig = overig.value.split(",")[1];
    }
  }
  console.log(gekozenOverig)
  let gekozenFinish = 0;
  for (var i = 0; i < fin.length; i++) {
    let finish = fin[i];

    if (finish.checked) {
      gekozenFinish = finish.value.split(",")[1];
    }
  }
  console.log(gekozenFinish)
  let serviceDuration = parseInt(gekozen) + parseInt(gekozenOverig) + parseInt(gekozenFinish);
  console.log(serviceDuration);
  //bron：https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Map

  if (serviceDuration == 0 || datumStuur.value == "") {
    tijdendisplay.innerHTML = '';
    return;
  }

  let info = {
    "datum": datumStuur.value,
    "serviceDuration": serviceDuration,

  }; //https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/input_event
  let infotime = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(info),
  };
  fetch('BeitestTime.php', infotime)
    .then(response => {
      //https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Guide/Using_promises
      response.json().then(beschikbaarTijdlist => {


        tijdendisplay.innerHTML = "";

        for (let i = 0; i < beschikbaarTijdlist.length; i++) {
          let Tijd = beschikbaarTijdlist[i]
          // console.log(Tijd)
          let beschikbaarTijd = document.querySelector(".labelforbuttonshort");
          let Node = document.createTextNode(Tijd.date);

          var tijdblok = document.createElement("input");
          // {/* <input type="radio" id="keuzetijd" name="keuzetijd" value="8:30-9:00"  onclick="myFunction()"> */}
          tijdblok.type = "radio";
          tijdblok.id = "keuzetijd-" + i;
          tijdblok.name = "keuzetijd";
          tijdblok.value = Tijd;
          tijdblok.onclick = myFunction;
          tijdendisplay.appendChild(tijdblok);

          var label = document.createElement("label");
          label.className = "labelforbuttonshort";
          label.htmlFor = "keuzetijd-" + i;
          var lableTime = document.createTextNode(Tijd);
          label.appendChild(lableTime);
          tijdendisplay.appendChild(label);
        }
      })
    })
}

//-------------------------bei----------------------------
document.getElementById("afspraakdatum").onchange = function () {

  updateValue();
}

function updateValue() {
  document.getElementById("afspraakdatum").style.backgroundColor = "var(--Paars)";

  var input = document.getElementById("afspraakdatum").value;
  let datum = new Date(input);
  document.getElementById("output").innerHTML = datum.getDate() + "-" + (datum.getMonth() + 1) + "-" + datum.getFullYear();

}





function myFunction() {

  var keuzeb = document.getElementsByName("keuzebehandeling");
  var over = document.getElementsByName("keuzebehandelingoverig");
  var fin = document.getElementsByName("keuzefinish");
  var rem = document.getElementsByName("keuzereminder");
  var tijd = document.getElementsByName("keuzetijd");

  for (var opt of keuzeb) {
    if (opt.checked) {
      let option = opt.value.split(",");
      document.getElementById("kb").innerHTML = option[0];
    }
  }

  for (var opt of over) {
    if (opt.checked) {
      let option = opt.value.split(",");
      document.getElementById("ov").innerHTML = option[0];
    }
  }

  for (var opt of fin) {
    if (opt.checked) {
      let option = opt.value.split(",");
      document.getElementById("fi").innerHTML = option[0];
    }
  }

  for (var opt of rem) {
    if (opt.checked) {
      let option = opt.value.split(",");
      document.getElementById("re").innerHTML = option[0];
    }
  }

  for (var opt of tijd) {
    if (opt.checked) {
      let option = opt.value.split(",");
      document.getElementById("ti").innerHTML = option[0];
    }
  }

}


// calculate totaal
function calc() {
  let totaalprijs = 0;
  let totaaltijd = 0;

  var rates = document.getElementsByTagName("input");
  var value_prijs = 0;
  var value_tijd = 0;
  for (var i = 0; i < rates.length; i++) {
    if (rates[i].checked) {
      let option = rates[i].value.split(",");
      value_prijs = option[2];
      value_tijd = option[1];

      // console.log(value_prijs);

      totaalprijs += parseInt(value_prijs);
      totaaltijd += parseInt(value_tijd);

    }

  }

  if (totaaltijd >= 60) {

    const uren = Math.floor(totaaltijd / 60);
    const minuten = totaaltijd % 60;

    if (minuten > 0) {

      document.getElementById("total").innerHTML = totaalprijs + " eur" + ", " + uren + " uur en " + minuten + " minuten";
    }
    else {
      document.getElementById("total").innerHTML = totaalprijs + " eur" + ", " + uren + " uur";

    }

  }
  else {
    document.getElementById("total").innerHTML = totaalprijs + " eur" + ", " + totaaltijd + " minuten";
  }

}

