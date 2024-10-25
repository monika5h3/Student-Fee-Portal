<?php
require_once 'config.php';

$qry = mysql_query("SELECT * FROM student_details WHERE status = '1'") or die(mysql_error());
$i = 1;
?>
<table border="1px solid black" align="center" style="border-collapse: collapse; width:600px">
    <tr>
        <td>S.No</td>
        <td>Name</td>
        <td>Email</td>
        <td>Contact</td>
        <td>Branch</td>
        <td>admin_id</td>
        <td>fee</td>
        <td>fee_status</td>
        
        <td colspan="2">Action</td>
    </tr>

    <?php
        while($getdata = mysql_fetch_object($qry)) {
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $getdata->name ?></td>
                <td><?php echo $getdata->email ?></td>
                <td><?php echo $getdata->contact ?></td>
                <td><?php echo $getdata->branch ?></td>
                <td><?php echo $getdata->admin_id ?></td>   
                <td><?php echo $getdata->fee ?></td>
                <td><?php echo $getdata->fee_status ?></td>

                
                <td><button type="button" onclick="updateData('<?php echo $getdata->sno_id ?>', '<?php echo $getdata->name ?>', '<?php echo $getdata->email ?>', '<?php echo $getdata->contact ?>', '<?php echo $getdata->branch ?>','<?php echo $getdata->admin_id ?>','<?php echo $getdata->fee ?>','<td><?php echo $getdata->fee_status ?></td>')">Update</button></td>
                <td><button type="button" onclick="deleteData('<?php echo $getdata->sno_id ?>')">Delete</button></td>
            </tr>  
            
            <?php
        }
    ?>
</table>