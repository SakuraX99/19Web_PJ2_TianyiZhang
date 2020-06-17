<?php
session_start();
include '../php/database_connect.php';
$uid = $_SESSION['UID'];
$myimagefavors = $pdo->query("SELECT * FROM travelimagefavor WHERE UID='$uid'");
$ret = [];
$ret1 = [];
$ret2 = [];
$ret3 = [];
while ($row = $myimagefavors->fetch()){
    $imageid = $row['ImageID'];
    $images = $pdo->query("SELECT * FROM travelimage WHERE ImageID='$imageid'");
    $image = $images->fetch();
    array_push($ret1,$image['Title']);
    array_push($ret2,$image['Description']);
    array_push($ret3,$image['PATH']);
}
array_push($ret,$ret1);
array_push($ret,$ret2);
array_push($ret,$ret3);
echo json_encode($ret,JSON_UNESCAPED_UNICODE);