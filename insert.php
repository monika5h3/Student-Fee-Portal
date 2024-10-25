<?php
require_once 'config.php';

$hidId = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['userEmail'];
$contact = $_POST['userContact'];
$branch = $_POST['branch'];
$fee = $_POST['fee'];

if (empty($_POST['admin_id'])) {
    $admin_id = "2024" . rand(10000, 99999);
} else {
    $admin_id = $_POST['admin_id'];
}

// Determine the fee_status
$fee_status = ($fee >= 60000) ? 'Completed' : 'Pending';

if($hidId == "") {
    $insert = mysql_query("INSERT INTO student_details(name, email, contact, branch, admin_id, fee,fee_status) VALUES('$name', '$email', '$contact', '$branch', '$admin_id','$fee','$fee_status')") or die(mysql_error()); 
    echo "Data saved successfully";
} else {
    $update = mysql_query("UPDATE student_details SET name = '$name', email = '$email', contact = '$contact', branch = '$branch', admin_id = '$admin_id', fee = '$fee',  fee_status = '$fee_status'  WHERE sno_id = '$hidId'") or die(mysql_error());
    echo "Data updated successfully";
}

?>

