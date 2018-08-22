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
    $visitor_id = $_POST['visitor_id'];
        
    $clock_out = "YES";
   
    $query = "UPDATE visitors SET date_stamp_out = '$t', clock_out = '$clock_out' WHERE visitor_id = '$visitor_id'";
    if (!$result = mysqli_query($con,$query)) {
        exit(mysqli_error($con));
    }
}