<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
?>
<?php
    if(isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['identity']) && isset($_POST['purpose'])&& 
    isset($_POST['items']))
	{
		// include Database connection file 
		include("dbConnect.php");

        // get values 
       
        $t = date('Y-m-d H:i:s');
        $visitor_firstname = $_POST['firstname'];
		$visitor_lastname = $_POST['lastname'];
		$visitor_identity = $_POST['identity'];
		$visitor_purpose = $_POST['purpose'];
		$visitor_items = $_POST['items'];
		$clock_in = "YES";
		$clock_out = "NO";
		$visit_id =  strtolower($visitor_lastname).'_visit_'.strtolower($visitor_firstname);
		$query = "INSERT INTO visitors(visit_id,visitor_firstname, visitor_lastname, visitor_identity, visitor_items, visitor_purpose,date_stamp_in, clock_in, clock_out) 
		
		VALUES('$visit_id','$visitor_firstname', '$visitor_lastname', '$visitor_identity', '$visitor_items', '$visitor_purpose', '$t', '$clock_in','$clock_out')";
		
		if (!$result = mysqli_query($con,$query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>