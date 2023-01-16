<?php
include("db.php");

// delete from database
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $conn->prepare("DELETE FROM `users` WHERE id = ?");
    $delete->execute([$id]);
    header("location:accountdashboard.php");
}
