<?php
session_start();
include 'database_connect.php';
$postpassword = md5($_POST["password"]."Sakura");
while ($row = $travelusers->fetch())
{
    $username = $row["UserName"];
    if ($_POST["username"] == $username)
    {
        $password = $row["Pass"];
        if($postpassword == $password){
            $_SESSION['UserName'] = $username;
            $_SESSION['UID'] = $row['UID'];
//            echo $_SESSION['UID']."<br>";
//            echo $_SESSION['UserName']."<br>";
            echo '<script>alert("Login Success!");window.location.href="../src/HomePage.php";</script>';
            return;
        }
        else{
            echo '<script>alert("Wrong Password!");window.location.href="../src/login.html";</script>';
            return;
        }
    }
}
echo '<script>alert("User Not Found!");window.location.href="../src/login.html";</script>';
?>