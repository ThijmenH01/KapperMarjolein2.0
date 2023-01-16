<!DOCTYPE html>

<?php
session_start();
include("db.php");
include("function.php");
?>

<head>
    <html>
    <title>Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>
    <!-- START TOP NAV -->
    <div class="topnav">
        <a href="dashboard.php">Dashboard</a>
        <a href="booking.php">Afspraak Maken</a>
        <a href="kalender.php">Kalender</a>
        <a class="active" href="accountmaken.php">Account Maken</a>
        <a href="accountdashboard.php">Account Dashboard</a>
        <a href="logout.php">Log uit</a>
    </div>
    <!-- END TOP NAV -->


    <div class="w3-center w3-margin-top">
        <!-- START FORM -->
        <form action="add-user.php" method="POST">

            <strong><label for="naam">Gebruiker keuze</label></strong><br>

            <select name="rol" id="rol">
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select> <br><br>

            <strong><label for="naam">Naam:</label></strong><br>
            <input type="text" id="naam" placeholder="Naam" name=" naam" required><br><br>

            <strong><label for="email">Email:</label></strong><br>
            <input type="email" id="email" placeholder="Email" name="email" required><br><br>

            <strong><label for="wachtwoord">Wachtwoord:</label></strong><br>
            <input type="password" id="wachtwoord" name="wachtwoord" required><br><br>

            <input id="button" class="button" type="submit" name="submit " value="submit">
        </form>
    </div>
    <!-- END FORM -->
    <style>
        label {
            color: #BA84EA;
        }

        input,
        select {

            border-radius: 8px;
            width: 200px;
            border: 1px solid;
            height: 30px;
        }

        #button {
            width: 140px;
            height: 50px;
            border: none;
            background-color: #FFA500;
            color: white;

            font-weight: bold;
        }

        #button:hover {

            background-color: rgba(255, 165, 0, 0.5);
        }
    </style>


</body>

</html>