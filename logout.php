<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['user_id']);
header('location:login.php');
