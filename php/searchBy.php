<?php
session_start();
include 'database_connect.php';
$post = json_decode(array_keys($_POST)[0]);
$sql;
if($post->by=="title") {
    $sql = "SELECT * FROM travelimage WHERE Title LIKE " . "'%" . ($post->key) . "%'";
}
else{
    $sql = "SELECT * FROM travelimage WHERE Description LIKE " . "'%" . ($post->key) . "%'";
}
$images = $pdo->query($sql);
$ret = [];
$ret1 = [];
$ret2 = [];
$ret3 = [];
while ($row = $images->fetch()){
    array_push($ret1,$row['Title']);
    array_push($ret2,$row['Description']);
    array_push($ret3,$row['PATH']);
}
array_push($ret,$ret1);
array_push($ret,$ret2);
array_push($ret,$ret3);
//echo var_dump($images);
echo json_encode($ret,JSON_UNESCAPED_UNICODE);
?>
