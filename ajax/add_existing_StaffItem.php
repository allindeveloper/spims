<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
?>
<?php
    if(isset($_POST['emp_id'])&&isset($_POST['purpose'])&& isset($_POST['items']))
	{
		// include Database connection file 
		include("dbConnect.php");

        // get values 
	
        $t = date('Y-m-d H:i:s');
        
		$staff_purpose = $_POST['purpose'];
		$staff_items = $_POST['items'];
		$clock_in = "YES";
		$clock_out = "NO";
		$emp_id =  $_POST['emp_id'];
		

		// 
		$result = mysqli_query($con, "SELECT staff_firstname, staff_lastname, staff_department FROM staff WHERE emp_id = '" . $emp_id. "'")or die(mysqli_error($con));

		if ($row = mysqli_fetch_array($result)) {
			
		$staff_firstname = $row['staff_firstname'];
		$staff_lastname = $row['staff_lastname'];
		$staff_department = $row['staff_department'];
			
		$query = "INSERT INTO staff(emp_id, staff_firstname, staff_lastname, staff_department, staff_items, staff_purpose,date_stamp_in,clock_in, clock_out) 
		
		VALUES('$emp_id','$staff_firstname', '$staff_lastname', '$staff_department', '$staff_items', '$staff_purpose', '$t', '$clock_in','$clock_out')";
		
		if (!$result = mysqli_query($con,$query)) {
	        exit(mysqli_error($con));
	    }
		echo "1 Record Added!";
		
		} else {
			$errormsg = "Erro here";
		}
		// 
		
	}
?>