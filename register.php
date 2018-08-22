<?php
session_start();

if(isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
}

include_once 'dbConnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
	$password = mysqli_real_escape_string($con, $_POST['password1']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
    //name can contain only alpha characters and space
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        $options = array("cost"=>4);
		$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        if(mysqli_query($con, "INSERT INTO admin(admin_firstname, admin_lastname,admin_password, admin_email) VALUES('" . $firstname . "','" . $lastname . "', '" . $hashPassword . "', '" . $email . "')")) {
            $successmsg = "Successfully Registered!";
            
            
        } else {
						$errormsg = "Error in registering...Please try again later!";
						
        }
    }
}
?>


<html lang="en">
<head>
	<title>Security Post Item Management System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg2.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30" style="">
			<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<span class="login100-form-title p-b-37">
					SPIMS | Admin <br>Register
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter firstname">
					<input class="input100" type="text" name="firstname"placeholder="firstname" required value="<?php if($error) echo $firstname; ?>">
					<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter lastname">
					<input class="input100" type="text" name="lastname" placeholder="lastname" required value="<?php if($error) echo $firstname; ?>">
					<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
					<input class="input100" type="text" name="email" placeholder="email" required value="<?php if($error) echo $email; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password1" placeholder="enter password" required>
					<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password again">
					<input class="input100" type="password" name="cpassword" placeholder="enter password again">
					<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					<span class="focus-input100"></span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="signup">
						Register
					</button>
					<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
				</div><br>
				<div class="text-center">
					<a href="signin.php" class="txt2 hov1">
						Sign in
					</a>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>