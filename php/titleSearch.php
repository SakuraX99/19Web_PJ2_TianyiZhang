<?php
session_start();
include 'database_connect.php';
$post = json_decode(array_keys($_POST)[0]);
$sql = "SELECT * FROM travelimage WHERE Title LIKE "."'%".($post->title)."%'";
$images = $pdo->query($sql);
$imagearr = [];
$i = 0;
while ($row = $images->fetch()){
    $imagearr[$i++]=$row['PATH'];
}
echo json_encode($imagearr,JSON_UNESCAPED_UNICODE);
?>
