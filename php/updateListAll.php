<?php
session_start();
include 'database_connect.php';
$sql = "SELECT * FROM geocountries";
function is_json($string) {
 json_decode($string);
 return (json_last_error() == JSON_ERROR_NONE);
}
$List = array();
$idMap = array();
$cityidMap = array();
$countries = $pdo->query($sql);
while ($row = $countries->fetch()){
    $idMap[$row['ISO']] = $row['CountryName'];
    if(is_json($row['CountryName'])){
    $List[$row['CountryName']] = array();}
}
//echo var_dump($idMap);

$sql = "SELECT * FROM geocities";
$cities = $pdo->query($sql);
while ($row = $cities->fetch()){
    if(is_json($row['AsciiName'])) {
    array_push($List[$idMap[$row['CountryCodeISO']]],$row['AsciiName']);
    }
}
//$countries1 = $pdo->query("SELECT * FROM geocountries");
//while ($row = $countries1->fetch()){
//    echo var_dump($row['CountryName'])."<br>";
//    echo var_dump($List[$row['CountryName']])."<br>";
//}
//echo var_dump($List);
echo json_encode($List,JSON_UNESCAPED_UNICODE);
?>
