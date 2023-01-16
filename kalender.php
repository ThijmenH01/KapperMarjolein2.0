<!DOCTYPE html>

<?php
session_start();
include("db.php");
include("function.php");

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $select = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $select->execute([$admin_id]);
    $row = $select->fetch(PDO::FETCH_ASSOC);
    $naam = $row['naam'];
}

// $date = date("Y-m-d");


error_reporting(0);
?>


<head>
    <html>
    <title>Kalender</title>
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
        <a class="active" href="kalender.php">Kalender</a>
        <a href="accountmaken.php">Account Maken</a>
        <a href="accountdashboard.php">Account Dashboard</a>
        <a href="logout.php">Log uit</a>
    </div>
    <!-- END TOP NAV -->

    <div class="w3-center">
        <br><br>
        <form action="kalender.php" method="get">

            <label for="datum">Afspraak Datum:</label>
            <input type="date" id="datum" name="datum" value="<?php echo $_GET["datum"] ?>"><br><br>

            <input id="button" type="submit" value="Pas toe"><br><br>
        </form>
    </div>

    <div>
        <!-- START TABEL -->
        <table class="table table-bordered table-striped w3-center">
            <thead>
                <tr>
                    <th>Prijs</th>
                    <th>Tijdsduur</th>
                    <th>Service</th>
                    <th>categorienaam</th>
                    <th>Tijd</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoon</th>
                    <th>Notities</th>
                    <th>Wijzigen</th>
                    <th>Annuleren</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // pdo query select all from klanten
                // $date = $_GET["datum"];
                if ($date == $_GET["datum"]) {
                    $date = date("Y-m-d");
                } else {
                    $date = $_GET["datum"];
                }
                $stmt = $conn->prepare("SELECT * FROM `afspraken` 
                JOIN `klanten` ON afspraken.klanten_id = klanten.id 
                JOIN `userkt` ON userkt.afspraak_id = afspraken.afspraak_id
                JOIN `services` ON services.id = userkt.service_id
                INNER JOIN `servicescategorie` ON servicescategorie_id = servicescategorie
                WHERE datum >= '$date'
                AND datum <'$date' + INTERVAL 1 DAY ");
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach ($result as $row) {
                    echo '</tr>';
                    echo '<td>' . '€' . $row['serviceprijs'] + $row['categorieprijs'] . '</td>';
                    echo '<td>' . $row['serviceduur'] + $row['categorieduur']  . '</td>';
                    echo '<td>' . $row['servicenaam'] . '</td>';
                    echo '<td>' . $row['categorienaam'] . '</td>';
                    echo '<td>' . $row['datum'] . '</td>';
                    echo '<td>' . $row['naam'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['telefoon'] . '</td>';
                    echo '<td>' . $row['notities'] . '</td>';
                    echo '<td>' .
                        "<a href='afspraakedit.php?id=" .
                        $row['afspraak_id'] .
                        "' class='btn btn-primary'>🅅</a>" .
                        '</td>';
                    echo '<td>' .
                        "<a href='afspraakdelete.php?id=" .
                        $row['afspraak_id'] .
                        "' class='btn btn-danger'>🅇</a>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <style>
        input {
            border-radius: 8px;
            width: 200px;
            border: 1px solid;
            height: 30px;
            background-color: white;


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

        label {
            color: #BA84EA;
            font-weight: bold;
        }

        th {
            color: #BA84EA;
        }
    </style>


</body>

</html>