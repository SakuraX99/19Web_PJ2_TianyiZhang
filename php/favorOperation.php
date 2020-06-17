<?php
session_start();
include 'database_connect.php';
$post = json_decode(array_keys($_POST)[0]);
$favorid = $post->favorid;
$uid = $_SESSION['UID'];
$imageid = $_SESSION['imageid'];

$image = $pdo->query("SELECT * FROM travelimage WHERE ImageID='$imageid'");
$imagerow = $image->fetch();
$CountryId = $imagerow['CountryCodeISO'];
$CityId = $imagerow['CityCode'];
$theme = $imagerow['Theme'];

echo $favorid;
if($favorid!='-1') {
    $pdo->exec("DELETE FROM travelimagefavor WHERE FavorID='$favorid'");
    $pdo->exec("UPDATE travelimage SET FAVOR=FAVOR-1 WHERE ImageID='$imageid'");
}
else{
    $pdo->exec("INSERT INTO travelimagefavor (UID,ImageID) VALUE ('$uid','$imageid')");
    $pdo->exec("UPDATE travelimage SET FAVOR=FAVOR+1 WHERE ImageID='$imageid'");
    $pdo->exec("UPDATE geocountries SET Heat=Heat+1 WHERE ISO='$CountryId'");
    $pdo->exec("UPDATE geocities SET Heat=Heat+1 WHERE GeoNameID='$CityId'");
    $pdo->exec("UPDATE Theme SET Heat=Heat+1 WHERE theme='$theme'");

}
//echo '<script>window.location.href="../src/Details.php";</script>';