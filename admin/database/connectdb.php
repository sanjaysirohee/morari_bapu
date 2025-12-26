<?php

$baseurl = $_SERVER['SERVER_NAME'];
if($baseurl=='localhost')
{
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","moraridb");
}else{
define("HOSTNAME","localhost");
define("USERNAME","morari_bapu1db");
define("PASSWORD","rkt.ftp@121");
define("DATABASE","crmwala_moraribapudb");
}

$con=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("Unable to connect");
?>
