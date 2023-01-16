<?php
session_start();
include("db.php");
include("function.php");


// if isset post update_user update users in database pdo
if (isset($_POST['update_user'])) {
    $user_id = $_POST['user_id'];
    $rol = $_POST['rol'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $query = "UPDATE users SET rol=:rol, email=:email, wachtwoord=:wachtwoord WHERE id=:user_id";
    $stmt = $conn->prepare($query);
    $data = [':rol' => $rol, ':email' => $email, ':wachtwoord' => $wachtwoord, ':user_id' => $user_id];
    $stmt->execute($data);
    if ($stmt->rowCount()) {
        $_SESSION['success'] = "Student Updated Successfully";
        header("location:accountdashboard.php");
    }
}
