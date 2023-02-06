<?php
include 'parser-php-version.php';
$hostdb='localhost';
$userdb='root';
$passworddb='';
$database='';

$db=mysql_connect("$hostdb","$userdb","$passworddb") or die ("belum berhasil connect");
mysql_select_db("$database",$db);
?>
