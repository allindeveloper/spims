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
    
    $t = date('Y-m-d H:i:s');
    $student_id = $_POST['student_id'];
        
    $clock_out = "YES";
    
    $query = "UPDATE student SET date_stamp_out = '$t', clock_out = '$clock_out' WHERE student_id = '$student_id'";
    if (!$result = mysqli_query($con,$query)) {
        exit(mysqli_error($con));
    }
}