<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
?>
<?php
    if(isset($_POST['stud_id'])&& isset($_POST['purpose'])&& isset($_POST['items']))
	{
		// include Database connection file 
		include("dbConnect.php");

        // get values 
       
        $t = date('Y-m-d H:i:s');
        
		$student_purpose = $_POST['purpose'];
		$student_items = $_POST['items'];
		$clock_in = "YES";
		$clock_out = "NO";
		$stud_id =  $_POST['stud_id'];
		$result = mysqli_query($con, "SELECT student_firstname, student_lastname, student_department FROM student WHERE stud_id = '" . $stud_id. "'")or die(mysqli_error($con));

		if ($row = mysqli_fetch_array($result)) {
			
		$student_firstname = $row['student_firstname'];
		$student_lastname = $row['student_lastname'];
		$student_department = $row['student_department'];
		$query = "INSERT INTO student(stud_id,student_firstname, student_lastname, student_department, student_items, student_purpose,date_stamp_in, clock_in, clock_out) 
		
		VALUES('$stud_id','$student_firstname', '$student_lastname', '$student_department', '$student_items', '$student_purpose', '$t', '$clock_in','$clock_out')";
		
		if (!$result = mysqli_query($con,$query)) {
	        exit(mysqli_error($con));
	    }
		echo "1 Record Added!";
	} else {
		$errormsg = "Error here";
	}
	}
?>