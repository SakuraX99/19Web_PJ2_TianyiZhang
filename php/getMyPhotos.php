<?php
session_start();
include '../php/database_connect.php';
$uid = $_SESSION['UID'];
$myimages = $pdo->query("SELECT * FROM travelimage WHERE UID='$uid'");
$ret = [];
$ret1 = [];
$ret2 = [];
$ret3 = [];
while ($row = $myimages->fetch()){
    array_push($ret1,$row['Title']);
    array_push($ret2,$row['Description']);
    array_push($ret3,$row['PATH']);
}
array_push($ret,$ret1);
array_push($ret,$ret2);
array_push($ret,$ret3);
echo json_encode($ret,JSON_UNESCAPED_UNICODE);