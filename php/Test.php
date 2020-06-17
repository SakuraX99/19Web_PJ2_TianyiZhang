 <?php

 include 'database_connect.php';
 while ($row = $travelusers->fetch())
 {
     $id = $row['UID'];
     $oldpass = $row['Pass'];
     $newpass = md5($oldpass."Sakura");
     $pdo->exec("UPDATE traveluser SET Pass='$newpass' WHERE UID='$id'");
 }


// $themearray = ['Scenery','City','People','Animal','Building','Wonder','Other'];
//echo var_dump($themearray);
// $UID = 32;
// $ImageID = 83;

// $pdo->exec("INSERT INTO travelimagefavor (Title,Description,CityCode,CountryCodeISO,UID,PATH,Content,Theme,CityName,CountryName) VALUE ('$Title','$Description','$CityCode','$CountryCodeISO','$UID','$PATH','$Content','$Theme','$CityName','$CountryName')");
// $pdo->exec("INSERT INTO travelimagefavor (ImageID,UID) VALUE ('$ImageID','$UID')");

// for($x = 1;$x<=33;$x++){
//    if(in_array($x,[1,2,10,15,31,12,15,32])){
//        continue;
//    }
//     $tmp = array ();
//     while ( count ( $tmp ) < 10 ) {
//         $tmp [] = mt_rand ( 1, 82 );
//         $tmp = array_unique ( $tmp );
//     }
//     for($i = 0;$i<10;$i++){
//         $imageid = $tmp[$i];
//         $pdo->exec("INSERT INTO travelimagefavor (ImageID,UID) VALUE ('$imageid','$x')");
//     }
// }
// $images = $pdo->query("SELECT * FROM travelimage");
// $i = 0;
// while ($row = $images->fetch())
// {
//     $theme = $themearray[mt_rand(0,6)];
//     $imageid = $row['ImageID'];
//     $pdo->exec("UPDATE travelimage SET Theme='$theme' WHERE ImageID='$imageid'");
// }



