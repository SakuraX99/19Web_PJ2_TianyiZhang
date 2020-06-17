<?php
//include 'database_connect.php';
//init
$cities = $pdo->query('SELECT * FROM geocities');
$countries = $pdo->query('SELECT * FROM geocountries');
$themes = $pdo->query('SELECT * FROM Theme');


while($row = $cities->fetch()){
    $id = $row['GeoNameID'];
    $pdo->exec("UPDATE geocities SET Heat=0 WHERE GeoNameID='$id'");

}

while($row = $countries->fetch()){
    $id = $row['ISO'];
    $pdo->exec("UPDATE geocountries SET Heat=0 WHERE ISO='$id'");

}

while($row = $themes->fetch()){
    $id = $row['ID'];
    $pdo->exec("UPDATE Theme SET Heat=0 WHERE ID='$id'");
}


$favors = $pdo->query("SELECT * FROM travelimagefavor");

while ($row = $favors->fetch())
{
    $imageid = $row['ImageID'];
    $images = $pdo->query("SELECT * FROM travelimage WHERE ImageID='$imageid'");

    $row1 = $images->fetch();
    $CityId = $row1["CityCode"];
    $CountryId = $row1["CountryCodeISO"];
    $theme = $row1["Theme"];
    $pdo->exec("UPDATE geocountries SET Heat=Heat+1 WHERE ISO='$CountryId'");
    $pdo->exec("UPDATE geocities SET Heat=Heat+1 WHERE GeoNameID='$CityId'");
    $pdo->exec("UPDATE Theme SET Heat=Heat+1 WHERE theme='$theme'");
}

?>
