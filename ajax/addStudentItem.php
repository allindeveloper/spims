<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
?>
<?php
    if(isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['department']) && isset($_POST['purpose'])&& 
    isset($_POST['items']))
	{
		// include Database connection file 
		include("dbConnect.php");

        // get values 
       
        $t = date('Y-m-d H:i:s');
        $student_firstname = $_POST['firstname'];
		$student_lastname = $_POST['lastname'];
		$student_department = $_POST['department'];
		$student_purpose = $_POST['purpose'];
		$student_items = $_POST['items'];
		$clock_in = "YES";
		$clock_out = "NO";
		$stud_id =  strtolower($student_firstname).'_stud_'.strtolower($student_lastname);
		$query = "INSERT INTO student(stud_id,student_firstname, student_lastname, student_department, student_items, student_purpose,date_stamp_in, clock_in, clock_out) 
		
		VALUES('$stud_id','$student_firstname', '$student_lastname', '$student_department', '$student_items', '$student_purpose', '$t', '$clock_in','$clock_out')";
		
		if (!$result = mysqli_query($con,$query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>