<?php
session_start();
include 'database_connect.php';
//echo var_dump($_POST);
$post = json_decode(array_keys($_POST)[0]);
$imagesrc = $post->src;

$arr = explode("_",$imagesrc);
//echo var_dump($arr);
$type = $arr[count($arr)-1];
$arr = array_slice($arr,0,count($arr)-1);
$imagesrc = join("_",$arr).".".$type;
//echo $imagesrc;

$imageres = $pdo->query("SELECT * FROM travelimage WHERE PATH='$imagesrc'");
$image = $imageres->fetch();
$imageid = $image['ImageID'];
$uid = $_SESSION['UID'];
$pdo->exec("DELETE FROM travelimagefavor WHERE ImageID='$imageid'");
$pdo->exec("DELETE FROM travelimage WHERE ImageID='$imageid'");

