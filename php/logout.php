<?php
session_start();
include 'database_connect.php';
unset($_SESSION['UserName']);
unset($_SESSION['UID']);
unset($_SESSION['refresh']);
unset($_SESSION['IMAGEJUMP']);
unset($_SESSION['imagesrc']);
unset($_SESSION['country']);
unset($_SESSION['city']);
unset($_SESSION['title']);
unset($_SESSION['description']);
unset($_SESSION['theme']);
unset($_SESSION['favors']);
unset($_SESSION['imageid']);
?>echo '<script>alert("Logout Success!");window.location.href="../src/HomePage.php";</script>';
