<?php  
session_start();
if(isset($_SESSION['admin_id'])=="") {
    header("Location: signin.php");
}
?>
<?php
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clarification: cheers :);
*/
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Security Post Item Management System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="sweetalert/sweetalert.css" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
            <a href="http://localhost/spims/dashboard.php" class="simple-text">
                Security Post Item Management System
                </a>
            </div>

             <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- <li>
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li> -->
                <li>
                    <a href="staff_table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Staff Item List</p>
                    </a>
                </li>
                <li class="active">
                    <a href="students_table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Students Item List</p>
                    </a>
                </li><li>
                    <a href="visitors_table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Visitors Item List</p>
                    </a>
                </li>
               
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Table List</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                    <?php  if (isset($_SESSION['admin_id'])){?>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   
                                    <p>Welcome <?php echo $_SESSION['admin_lastname'].' | Admin';?></p>
										<b class=""></b>
									</p>
                                </a>
                              <ul class="dropdown-menu">
                                <li><a href="logout.php">Logout</a></li>
                                
                                <li class="divider"></li>
                                <li><a href="#">More...</a></li>
                              </ul>
                    </li><?php }else{?>
                        <li>
                            <a href="signin.php">
                                <p>Sign in</p>
                            </a>
                        <?php }?>
                       
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
 <div class="col-md-12">
                <div class="row">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_new_student_item_modal">New Item(Clock-In)</button> 
                
                <br><br>       
                <div class="card">
                            <div class="header">
                                <h4 class="title">All Student Data</h4>
                                <p class="category">Here is a table showing all students, items brought and other informations.</p>
                            </div>
                            <div class="student_records_content"></div>
                           
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.ilongene.com">by Precious</a>
                </p>
            </div>
        </footer>


    </div>
</div>

                        <!-- Add Staff Item -->
                        <!-- Real Add Admin -->

<div class="modal fade" id="add_new_student_item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Item (Student)</h4>
            </div>
            <div class="modal-body magazine-form">

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="lastname"name="lastname" placeholder="Last Name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="last_name">Department</label>
                    <input type="text" id="department" name="department" placeholder="Department" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="last_name">Purpose</label>
                    <input type="text" id="purpose" name="purpose" placeholder="Purpose" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="last_name">Items</label>
                    <input type="text" id="items" name="items"  placeholder="Laptop, kettle, knife. etc" class="form-control"/>
                </div>
               
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addstudentRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- Real Add Admin -->

                            <!-- Student Checkout Update -->
                            <div class="modal fade" id="update_student_item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_first_name">First Name</label>
                    <input type="text" id="update_firstname" placeholder="First Name" class="form-control"readonly/>
                </div>

                <div class="form-group">
                    <label for="update_last_name">Last Name</label>
                    <input type="text" id="update_lastname" placeholder="Last Name" class="form-control"readonly/>
                </div>
                <div class="form-group">
                    <label for="update_last_name">Items</label>
                    <input type="text" id="update_items" placeholder="Items" class="form-control"readonly/>
                </div>
                <div class="form-group">
                    <label for="clock_out">Clock Out</label>
                    <select class="form-control"id="update_clock_out">
                    <option value="YES">Yes</option>
                    <option value="NO">No</option>
                    </select>
                    <!-- <input type="text" id="rights" placeholder="Rights" class="form-control"/> -->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateStudentDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
    <!-- Student Checkout Update -->
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
    <script src="js/studentlogic.js"></script>
    <script src="sweetalert/sweetalert.min.js"></script>

</html>
