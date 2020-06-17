<?php
session_start();
$post = json_decode(array_keys($_POST)[0]);
$post = json_decode(array_keys($_POST)[0]);
$imagesrc = $post->src;

$arr = explode("_",$imagesrc);
//echo var_dump($arr);
$type = $arr[count($arr)-1];
$arr = array_slice($arr,0,count($arr)-1);
$imagesrc = join("_",$arr).".".$type;
$_SESSION['Update'] = $imagesrc;