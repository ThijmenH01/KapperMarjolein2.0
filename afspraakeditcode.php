<?php
session_start();
include("db.php");
include("function.php");


// if isset post update_user update users in database pdo

if (isset($_POST['updateafspraak'])) {
    $id = $_POST['id'];
    $datum = $_POST['datum'];
    $servicescategorie = $_POST['servicescategorie'];
    $serviceKapper = $_POST['serviceKapper'];

    
    $update = "UPDATE afspraken SET datum= '$datum' WHERE afspraak_id = '$id'";
    $stmt = $conn->prepare($update);
    $stmt->execute();

    // SELECT * FROM userkt 
    // INNER JOIN `services` ON services.id = userkt.service_id
    // INNER JOIN `servicescategorie` ON servicescategorie_id = servicescategorie

    $update = "UPDATE userkt 
    INNER JOIN `services` ON services.id = userkt.service_id
    SET servicenaam= '$serviceKapper' WHERE afspraak_id = '$id'";
    $stmt = $conn->prepare($update);
    $stmt->execute();


    $update = "UPDATE userkt
    INNER JOIN `services` ON services.id = userkt.service_id
    INNER JOIN `servicescategorie` ON servicescategorie_id = servicescategorie
    SET servicescategorie= '$servicescategorie' WHERE afspraak_id = '$id'";
    $stmt = $conn->prepare($update);
    $stmt->execute();
    
    //echo all errors
    $stmt->debugDumpParams();
    


    if ($stmt->rowCount()) {
        $_SESSION['success'] = "Afspraak Successfully Updated";
        header("location:dashboard.php");
    }
}
