<?php
session_start();
include("db.php");
include("function.php");

$naam = $_POST['naam'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$rol = $_POST['rol'];
// $hash_password = password_hash($wachtwoord, PASSWORD_DEFAULT);



try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users (rol, naam, email, wachtwoord) 
    VALUES ('$rol', '$naam', '$email','$wachtwoord')";
    $conn->exec($sql);
    echo "New record created successfully";
    header("location:accountdashboard.php");
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
