<?php
session_start();
include("db.php");


$naam = $_POST['naam'];
$email = $_POST['email'];
$telefoon = $_POST['telefoon'];
$notites = $_POST['notities'];
$afspraakdatum = $_POST['afspraakdatum'];
$afspraaktijd = $_POST['afspraaktijd'];
$serviceKapper = $_POST['serviceKapper'];
$servicescategorie = $_POST['servicescategorie'];
// $serviceKapperid = 0;
// $medewerker_id  = 1;


$_SESSION['naam'] = $naam;
$_SESSION['email'] = $email;
$_SESSION['afspraakdatum'] = $afspraakdatum;


$stmt = $conn->prepare("SELECT * FROM `services` 
INNER JOIN `servicescategorie` ON servicescategorie_id = servicescategorie");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$serviceduur = $result['serviceduur'];
$categorieduur = $result['categorieduur'];

$afspraakdatumtijd = $afspraakdatum . " " . $afspraaktijd;
$duur =  $serviceduur + $categorieduur;


$afspraakdatumeindtijd = date('Y-m-d H:i:s', strtotime($afspraakdatumtijd . ' + ' . $duur . ' minutes'));





if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM `afspraken` WHERE `datum` = '$afspraakdatumtijd'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);


    $sql = "INSERT INTO `klanten`(`naam`, `email`, `telefoon`, `notities`) 
    VALUES ('$naam', '$email', '$telefoon', '$notites')";
    $conn->exec($sql);

    $klanten_id = $conn->lastInsertId();

    // inser into afspraken
    $sql = "INSERT INTO `afspraken`(`klanten_id`, `datum` , `afspraakeinde`) 
    VALUES ('$klanten_id', '$afspraakdatumtijd', '$afspraakdatumeindtijd')";
    $conn->exec($sql);

    $afspraak_id = $conn->lastInsertId();

    $sql = "SELECT * FROM `services`
    INNER JOIN `servicescategorie` ON servicescategorie_id = servicescategorie
     WHERE `servicenaam` = '$serviceKapper'  AND `servicescategorie` = '$servicescategorie'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo $serviceKapper = $row['servicenaam'];
        echo $servicescategorie = $row['servicescategorie'];
        echo $serviceKapperid  = $row['id'];
    }


    $sql = "SELECT * FROM `servicekt` WHERE `service_id` = '$serviceKapperid'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo $medewerker_id = $row['medewerker_id'];
    }

    $sql = "INSERT INTO `userkt`(`afspraak_id`, `user_id` , `service_id`)    
    VALUES ('$afspraak_id', '$medewerker_id',  '$serviceKapperid')";
    $conn->exec($sql);

    print("<br>");
    print("<br>");
    echo "Uw afspraak is gemaakt";

    header("Location:index.php");
    
} 