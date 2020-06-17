<?php
session_start();
include 'database_connect.php';
//echo '<script>alert("Jump!");</script>';
$post = json_decode(array_keys($_POST)[0]);
$imagesrc = $post->src;

$arr = explode("_",$imagesrc);
//echo var_dump($arr);
$type = $arr[count($arr)-1];
$arr = array_slice($arr,0,count($arr)-1);
$imagesrc = join("_",$arr).".".$type;
//echo $imagesrc;
//$imagesrc = "6596048341.jpg";
$images = $pdo->query("SELECT * FROM travelimage WHERE PATH='$imagesrc'");
$row = $images->fetch();
//echo json_encode($row['CountryName']);

//$ret = array();
//$ret['country'] = $row['CountryName'];
//$ret['city'] = $row['CityName'];
//$ret['title'] = $row['Title'];
//$ret['description'] = $row['Description'];
//$ret['theme'] = $row['Theme'];
//$ret['favors'] = $row['FAVOR'];
//echo json_encode($ret,JSON_UNESCAPED_UNICODE);
//
$_SESSION['IMAGEJUMP'] = 'true';
$_SESSION['imagesrc'] = $imagesrc;
$_SESSION['country'] = $row['CountryName'];
$_SESSION['city'] = $row['CityName'];
$_SESSION['title'] = $row['Title'];
$_SESSION['description'] = $row['Description'];
$_SESSION['theme'] = $row['Theme'];
$_SESSION['favors'] = $row['FAVOR'];
$_SESSION['imageid'] = $row['ImageID'];
echo '<script>window.location.href="../src/Details.php";</script>';



