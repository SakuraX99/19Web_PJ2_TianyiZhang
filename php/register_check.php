<?php
session_start();
include 'database_connect.php';
require_once('database_connect.php');
while ($row = $travelusers->fetch())
{
    $username = $row["UserName"];
    if ($_POST["username"] == $username)
    {
        echo '<script>alert("this username have already existed");window.location.href="../src/register.html";</script>';
        return;
    }
}
$newpassword = md5($_POST["password"]."Sakura");
$sql = "INSERT INTO traveluser (Email,UserName,Pass) VALUE ('_Email','_UserName','_Pass')";
$sql = preg_replace("/_UserName/",$_POST["username"], $sql);
$sql = preg_replace("/_Email/",$_POST["email"], $sql);
$sql = preg_replace("/_Pass/",$newpassword, $sql);
$pdo->exec($sql);
$_SESSION["user"] = $_POST["username"];
unset($_SESSION['username']);
echo '<script>alert("you have successfully registered!");window.location.href="../src/login.html";</script>';

?>