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
        <a href="accountmaken.php">Account Maken</a>
        <a href="accountdashboard.php">Account Dashboard</a>
        <a class="active" href="accountsvc.php">account aan service kopple</a>
        <a href="logout.php">Log uit</a>
    </div>
    <!-- END TOP NAV -->


    <div class="w3-center w3-margin-top">


    </div>
    <!-- END FORM -->
</body>

</html>