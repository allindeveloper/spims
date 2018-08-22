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
if(isset($_POST['student_id']) && isset($_POST['student_id']) != "")
{
    // get User ID
    $student_id = $_POST['student_id'];

    // Get Staff Details
    $query = "SELECT * FROM student WHERE student_id = '$student_id'";
    if (!$result = mysqli_query($con,$query)) {
        exit(mysqli_error($con));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
?>