<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
?>
<?php
// include Database connection file
include("dbConnect.php");

// check request
if(isset($_POST))
{
    // get values
    $t = date('Y-m-d H:i:s');
    $staff_id = $_POST['staff_id'];
        
    $clock_out = "YES";
    // Updaste User details
    $query = "UPDATE staff SET date_stamp_out = '$t', clock_out = '$clock_out' WHERE staff_id = '$staff_id'";
    if (!$result = mysqli_query($con,$query)) {
        exit(mysqli_error($con));
    }
}