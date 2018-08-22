<?php
session_start();

/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clarification: cheers :);
*/

if(isset($_SESSION['admin_id'])!="") {
    header("Location: dashboard.php");
}


include_once 'dbConnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, trim($_POST['password']));
    $result = mysqli_query($con, "SELECT * FROM admin WHERE admin_email = '" . $email. "'")or die(mysqli_error($con));

    if ($row = mysqli_fetch_array($result)) {
		if(password_verify($password,$row['admin_password'])){
        $_SESSION['admin_id'] = $row['admin_id'];
		$_SESSION['admin_firstname'] = $row['admin_firstname'];
		$_SESSION['admin_lastname'] = $row['admin_lastname'];
		$_SESSION['admin_email'] = $row['admin_email'];
		
		header("Location: dashboard.php");
	}else{
		$errormsg = "Incorrect Email or Password!!!";
	}
    } else {
        $errormsg = "No Administrators Found";
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
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
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
					SPIMS | Admin <br>Login
				</span>
			

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
					<input class="input100" type="text" name="email" placeholder=" email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn"name="login">
						Sign In
					</button>
					<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
				</div><br>

				<div class="text-center">
					<a href="register.php" class="txt2 hov1">
						Add Administrator
					</a>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>