<?php
session_start();
include 'database_connect.php';
echo var_dump($_FILES);
echo var_dump($_POST);

$file = $_FILES['imagefile']['tmp_name'];//上传的文件
$fileName = $_FILES['imagefile']['name'];//文件的名称(用来做文件名)
$path = "../travel-images/large/";//文件保存位置

$theme = $_POST['theme'];
$country = $_POST['country'];
$city = $_POST['city'];
$Title = $_POST['Title'];
$Description = $_POST['Description'];
$UID = $_SESSION['UID'];

$searchCountry = $pdo->query("SELECT * FROM geocountries WHERE CountryName='$country'");
$searchCity = $pdo->query("SELECT * FROM geocities WHERE AsciiName='$city'");

$selectCountry = $searchCountry->fetch();
$selectCity = $searchCity->fetch();
$isCountryCityValid = 0;

if(($selectCountry != null)&&($selectCity != null)){
    $Code = $selectCity['CountryCodeISO'];
    $CountryCode = $selectCountry['ISO'];
    if($Code==$CountryCode){
        $isCountryCityValid = 1;
    }
}

if($isCountryCityValid==0){
//    echo '<script>alert("invaild country and city pair!");window.location.href="../src/Upload.php"</script>';
    $_SESSION["invaild"] = "true";
}
else {
    $CityCode = $selectCity['GeoNameID'];
    $CountryCode = $selectCountry['ISO'];
    $pdo->exec("INSERT INTO travelimage (Title,Description,CityCode,CountryCodeISO,UID,PATH,Theme,CityName,CountryName)" .
        "VALUE ('$Title','$Description','$CityCode','$CountryCode','$UID','$fileName','$theme','$city','$country')");


if( move_uploaded_file($file, $path . $fileName) ) {
    echo "文件上传成功";
}else{
    echo "文件移动失败";
}
}