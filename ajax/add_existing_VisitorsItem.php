<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
?>
<?php
    if(isset($_POST['visit_id'])&& isset($_POST['identity']) && isset($_POST['purpose'])&& isset($_POST['items']))
	{
		// include Database connection file 
		include("dbConnect.php");

        // get values 
       
        $t = date('Y-m-d H:i:s');
		$visitor_purpose = $_POST['purpose'];
		$visitor_items = $_POST['items'];
		$clock_in = "YES";
		$clock_out = "NO";
		$visit_id =  $_POST['visit_id'];

		$result = mysqli_query($con, "SELECT visitor_firstname, visitor_lastname, visitor_identity FROM visitors WHERE visit_id = '" . $visit_id. "'")or die(mysqli_error($con));

		if ($row = mysqli_fetch_array($result)) {
		$visitor_firstname = $row['visitor_firstname'];
		$visitor_lastname = $row['visitor_lastname'];
		$visitor_identity = $row['visitor_identity'];
		$query = "INSERT INTO visitors(visit_id,visitor_firstname, visitor_lastname, visitor_identity, visitor_items, visitor_purpose,date_stamp_in, clock_in, clock_out) 
		
		VALUES('$visit_id','$visitor_firstname', '$visitor_lastname', '$visitor_identity', '$visitor_items', '$visitor_purpose', '$t', '$clock_in','$clock_out')";
		
		if (!$result = mysqli_query($con,$query) or die(mysqli_error($con))) {
	        exit(mysqli_error($con));
	    }
		echo "1 Record Added!";
	} else {
		$errormsg = "Error here";
	}
	}
?>