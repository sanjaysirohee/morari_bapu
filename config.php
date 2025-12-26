<?php
$baseurl = $_SERVER['SERVER_NAME'];
//echo $baseurl;
if($baseurl=='localhost')
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moraridb";
}else{
 $servername = "localhost";
 $username = "crmwala_mbdbun";
 $password = "rkt.ftp@121";
 $dbname = "crmwala_moraribapudb";
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

