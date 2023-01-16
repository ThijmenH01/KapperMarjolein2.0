<?php
session_start();
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="global.css">
  <link rel="stylesheet" href="reserverenFolder/reserveringspage.css">
  <link rel="stylesheet" href="header.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Covered+By+Your+Grace&family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <title>Afspraak maken</title>
</head>

<body>

  <div class='headerback'>

    <div id="wrapper">

      <div class="topnav" id="mytopnav">
        <ul>
          <p style="color: var(--Paars)">Marjolein de Kapper</p>
          <li><a href="http://kappermarjolein.open-ict.hu.nl/">Home</a></li>
          <li><a href="http://kappermarjolein.open-ict.hu.nl/modellen">Modellen</a></li>
          <li><a href="http://kappermarjolein.open-ict.hu.nl/contact">Contact</a></li>
          <a href="http://kappermarjolein.open-ict.hu.nl/reserveren">
            <li><button>Afspraak maken</button></li>
          </a>
          <a><i onclick="Dropdown()" class="fa-solid fa-bars fa-2x"></i></a>
        </ul>
      </div>
    </div>
  </div>

  <div class="dropdown" id="mydropdown">
    <ul>

      <a href="http://kappermarjolein.open-ict.hu.nl/">
        <li>Home</li>
      </a>
      <a href="http://kappermarjolein.open-ict.hu.nl/modellen">
        <li>Modellen</li>
      </a>
      <a href="http://kappermarjolein.open-ict.hu.nl/contact">
        <li>Contact</li>
      </a>
      <a href="http://kappermarjolein.open-ict.hu.nl/reserveren">
        <li>Afspraak maken</li>
      </a>

    </ul>
  </div>


  <div id="wrapper">
    <div class="reserveringspage">
      <div>
        <form action="reserverenFolder/add.php" method="POST">
          <p>1. Kies je behandeling</p>
          <h3>Behandeling</h3>
          <fieldset value="serviceKapper">
            <input type="radio" id="puntjes knippen" name="serviceKapper" value="Puntjes knippen" required onclick="myFunction(); calc();">
            <label class="labelforbutton" for="puntjes knippen">
              <div>Puntjes knippen</div>
              <div class="infoforbutton">
                <div>30 min</div>
                <div>10 eur</div>
              </div>
            </label><br>
            <input type="radio" id="kort haar" name="serviceKapper" value="Kort haar" onclick="myFunction(); calc();">
            <label class="labelforbutton" for="kort haar">
              <div>Kort haar</div>
              <div class="infoforbutton">
                <div>30 min</div>
                <div>15 eur</div>
              </div>
            </label><br>
            <input type="radio" id="haar tot schouders" name="serviceKapper" value="Haar tot schouders" onclick="myFunction(); calc();">
            <label class="labelforbutton" for="haar tot schouders">
              <div>Haar tot schouders</div>
              <div class="infoforbutton">
                <div>30 min</div>
                <div>20 eur</div>
              </div>
            </label><br>
            <input type="radio" id="lang haar" name="serviceKapper" value="Lang haar" onclick="myFunction(); calc();">
            <label class="labelforbutton" for="lang haar">
              <div>Lang haar</div>
              <div class="infoforbutton">
                <div>30 min</div>
                <div>25 eur</div>
              </div>
            </label><br>
          </fieldset>

          <fieldset value="servicescategorie">
            <h3>Extra</h3>
            <input type="radio" id="wassen" name="servicescategorie" value="7" required onclick="myFunction(); calc();">
            <label class="labelforbutton" for="wassen">
              <div>Wassen</div>
              <div class="infoforbutton">
                <div>15 min</div>
                <div>10 eur</div>
              </div>
            </label><br>

            <input type="radio" id="föhnen" name="servicescategorie" value="8" required onclick="myFunction(); calc();">
            <label class="labelforbutton" for="föhnen">
              <div>Föhnen</div>
              <div class="infoforbutton">
                <div>15 min</div>
                <div>10 eur</div>
              </div>
            </label><br>
            <input type="radio" id="wassen en föhnen" name="servicescategorie" value="9" onclick="myFunction(); calc();">
            <label class="labelforbutton" for="wassen en föhnen">
              <div>Wassen en föhnen</div>
              <div class="infoforbutton">
                <div>15 min</div>
                <div>20 eur</div>
              </div>
            </label><br>
            <input type="radio" id="geen " name="servicescategorie" value="11" required onclick="myFunction(); calc();">
            <label class="labelforbutton" for="geen ">
              <div>Geen</div>
              <div class="infoforbutton">
                <div></div>
                <div></div>
              </div>
            </label><br><br>
          </fieldset>

          <p>2. Kies een moment</p>
          <label for="afspraakdatum">
            <h3>Datum afspraak</h3>
          </label>
          <input type="datetime-local" id="afspraakdatum" name="afspraakdatum" value=" <?php echo date('Y-m-d H:i:s'); ?> " min="09:00" max="18:00"><br><br>

          <p>3. Vul je gegevens in</p>
          <h5>Naam</h5>
          <label for=" fname"><i class="fa fa-user"></i></label>
          <input type="text" id="fname" name="naam" placeholder="John M. Doe" required>

          <h5>Email</h5>
          <label for="email"><i class="fa fa-envelope"></i></label>
          <input type="text" id="email" name="email" placeholder="john@example.com" required>

          <h5>Telefoon nummer</h5>
          <label for="phone"> <i class="fa-solid fa-phone"></i></label>
          <input type="text" id="phone" name="telefoon" value="+31" placeholder="06 12345678" required>


          <h5>Opmerkingen</h5>
          <textarea id="note" name="notities" placeholder="Kan ik mijn hond meenemen?" rows="4" cols="35"></textarea><br>

          <input type="submit" id="submit" name="submit" value="submit"><br><br>

        </form>
      </div>



    </div>

    <div class="overview">
      <div class="firstbox">
        <p style="font-size: 30px">Mijn afspraak</p>
        <h3>Behandeling</h3>
        <p id="kb"></p>
        <h3>Extra</h3>
        <p id="ov"></p>
        <h3>Verzorging en styling</h3>
        <p id="fi"></p>
        <h3>Reminder</h3>
        <p id="re"></p>
        <h3>Totaal</h3>
        <p id="total"></p>
      </div>


      <div class="secondbox">

        <p><i class="fa-solid fa-calendar"></i></p>
        <p id="output"></p>
        <p id="ti"></p>

      </div>
    </div>
  </div>
</body>
<script src="reserverenFolder/overview.js"></script>
<script src="header.js"></script>

</html>