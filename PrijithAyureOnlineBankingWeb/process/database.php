<?php
//Development Connection
$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "nSjlr5tmy1";

//Remote Database Connection
//$servername = "remotemysql.com";
//$dBUsername = "nSjlr5tmy1";
//$dbPassword = "IzaKNNRJ0M";
//$dBName = "nSjlr5tmy1";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Database Connection Failed";
}

?>