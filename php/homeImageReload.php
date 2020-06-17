<?php
session_start();
include 'database_connect.php';
$_SESSION['refresh'] = 'refresh';
echo '<script>window.location.href="../src/HomePage.php";</script>';