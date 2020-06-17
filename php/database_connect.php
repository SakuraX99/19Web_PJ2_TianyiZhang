
<?php
require_once('config.php');
$pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$travelusers = $pdo->query("SELECT * FROM traveluser");
?>