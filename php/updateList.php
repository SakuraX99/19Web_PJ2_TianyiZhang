<?php
session_start();
include 'database_connect.php';
$sql = "SELECT * FROM geocountries";
$List = array();
$idMap = array();
$cityidMap = array();
$countries = $pdo->query($sql);
while ($row = $countries->fetch()){
    $idMap[$row['ISO']] = $row['CountryName'];
}
//echo var_dump($idMap);

$sql = "SELECT * FROM geocities";
$cities = $pdo->query($sql);
while ($row = $cities->fetch()){
    $cityidMap[$row['GeoNameID']] = $row['AsciiName'];
}
//echo var_dump($cityidMap);

$sql = "SELECT * FROM travelimage";
$images = $pdo->query($sql);
while ($row = $images->fetch()){
    $countryname = $idMap[$row['CountryCodeISO']];
    if($row['CityCode']!=null) {
        $cityname = $cityidMap[$row['CityCode']];

        if (array_key_exists($countryname, $List)) {
            if (!in_array($cityname, $List[$countryname])) {
                array_push($List[$countryname], $cityname);
            }
        } else {
            $List[$countryname] = array();
        }
    }

}
echo json_encode($List,JSON_UNESCAPED_UNICODE);
?>
