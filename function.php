<?php

if (!isset($_SESSION['admin_id']) && !isset($_SESSION['user_id'])) {
    header('location:login.php');
    die;
}
