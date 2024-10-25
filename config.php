<?php
//error reporting(E_ERROR | E_PARSE);
$server="localhost";
$db_user="root";
$db_pass="";
$database="few";

$connection = mysql_connect($server,$db_user,$db_pass) or die(mysql_error());
mysql_select_db($database,$connection) or die(mysql_error());
if($connection){
    // echo "connected successfully";
}
?>