<?php
require_once 'config.php';

$deldId = $_POST['deleteId'];



// $delete = mysql_query("DELETE FROM form WHERE sno_id = '$deldId'") or die(mysql_error());
$delete = mysql_query("UPDATE student_details SET status = '0' WHERE sno_id = '$deldId'") or die(mysql_error());



?>


