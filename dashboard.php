
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
<style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:100%;position: inherit;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}

.frmSearch_student {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list_student{float:left;list-style:none;margin-top:-3px;padding:0;width:100%;position: inherit;}
#country-list_student li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list_student li:hover{background:#ece3d2;cursor: pointer;}
#search-box_student{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}

.frmSearch_visitor {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list_visitor{float:left;list-style:none;margin-top:-3px;padding:0;width:100%;position: inherit;}
#country-list_visitor li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list_visitor li:hover{background:#ece3d2;cursor: pointer;}
#search-box_visitor{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
	<meta charset="utf-8" />
	<!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Security Post Item Management System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <link href="sweetalert/sweetalert.css" rel="stylesheet">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <link href="jquery-ui.min.css" type="text/css" rel="stylesheet"/>
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="jquery-ui.min.js" type="text/javascript"></script>

	<!-- <link rel="stylesheet" type="text/css" href="css/util.css"> -->

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readStaff.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});

    //student
    $("#search-box_student").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readStudent.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box_student").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_student").show();
			$("#suggesstion-box_student").html(data);
			$("#search-box_student").css("background","#FFF");
		}
		});
	});
    //visitors
    $("#search-box_visitor").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readVisitor.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box_visitor").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_visitor").show();
			$("#suggesstion-box_visitor").html(data);
			$("#search-box_visitor").css("background","#FFF");
		}
		});
	});


});

function selectStaff(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
function selectStudent(val) {
$("#search-box_student").val(val);
$("#suggesstion-box_student").hide();
}
function selectVisitor(val) {
$("#search-box_visitor").val(val);
$("#suggesstion-box_visitor").hide();
}
</script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/bg1.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
            <a href="http://localhost/spims/dashboard.php" class="simple-text">
                Security Post Item Management System
                </a>
            </div>

            <ul class="nav">
                <li class="active">
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
                        <p>Staff Table List</p>
                    </a>
                </li>
                <li>
                    <a href="students_table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Students Table List</p>
                    </a>
                </li><li>
                    <a href="visitors_table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Visitors Table List</p>
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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
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
                       
                        
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Staff Items Statistics</h4>
                                <p class="category">All the items brought by students so far</p>
                            </div>
                            <div class="content">
 <?php
    include("dbConnect.php");
    $query = "SELECT count(staff_items) AS 'staff_numbers' FROM staff";
    if (!$result = mysqli_query($con,$query)) {
        exit(mysqli_error($con));}
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }?> <center><span class="numbers"> <?php  echo $response['staff_numbers'];?></span></center><?php }
    else{
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }?>
                              
                                <div class="footer">
                                    <div class="legend">
<i class="fa fa-circle text-info"> <a href="http://localhost/spims/staff_table.php" class="simple-text"> Open</a></i> - 
<i class="fa fa-circle text-info"><a href="#" data-toggle="modal" data-target="#existing_staff_item_modal" class="simple-text"> Existing Staff</a> </i> 

                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Monday 12th 2018.
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Student Items Statistics</h4>
                                <p class="category">All the items brought by students so far</p>
                            </div>
                            <div class="content">
                                <?php
    include("dbConnect.php");
    $query = "SELECT count(student_items) AS 'student_numbers' FROM student";
    if (!$result = mysqli_query($con,$query)) {
        exit(mysqli_error($con));}
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }?> <center><span class="numbers"> <?php  echo $response['student_numbers'];?></span></center><?php }
    else{
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }?>
                                <div class="footer">
                                    <div class="legend">
   <i class="fa fa-circle text-info"> <a href="http://localhost/spims/students_table.php" class="simple-text">Open</a></i> - 
   <i class="fa fa-circle text-info"><a href="#" data-toggle="modal" data-target="#existing_student_item_modal" class="simple-text"> Existing Students</a> </i> 
                             
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Monday 12th 2018.
                                    </div>
                                </div>
                            </div>
                        </div>

                 </div> 
                <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Visitors Items Statistics</h4>
                                <p class="category">All the items brought by visitors  so far</p>
                            </div>
                            <div class="content">
                            <?php
    include("dbConnect.php");
    $query = "SELECT count(visitor_items) AS 'visitor_numbers' FROM visitors";
    if (!$result = mysqli_query($con,$query)) {
        exit(mysqli_error($con));}
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }?> <center><span class="numbers"> <?php  echo $response['visitor_numbers'];?></span></center><?php }
    else{
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }?>
                                <div class="footer">
                                    <div class="legend">
<i class="fa fa-circle text-info"> <a href="http://localhost/spims/visitors_table.php" class="simple-text">Open</a></i> - 
<i class="fa fa-circle text-info"><a href="#" data-toggle="modal" data-target="#existing_visitors_item_modal" class="simple-text"> Existing Visitors</a> </i> 
 
                                       
                                        </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Monday 12th 2018.
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>

                    </div>
                </div>
                <?php 
                //db connection


//query
// $sql=mysqli_query($con,"SELECT * FROM staff");
// if(mysqli_num_rows($sql)){
// $select= '<select name="select" id="fast">';
// while($rs=mysqli_fetch_array($sql)){
//       $select.='<option value="'.$rs['staff_id'].'">'.$rs['staff_lastname'].' '.$rs['staff_firstname'].' -FROM- '.$rs['staff_department'].'</option>';
      
//   }
// }
// $select.='</select>';
// echo $select;


//     ?>
      
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
<!-- Existing Staff -->
<div class="modal fade" id="existing_staff_item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Existing Staff Only</h4>
            </div>
            <div class="modal-body magazine-form">

                <div class="form-group">
                    <label for="first_name">Employee ID</label><br>
                    <input type="text" id="search-box" placeholder="Employee ID" class="form-control" />
                    <div id="suggesstion-box"></div>
                </div>

                <div class="form-group">
                    <label for="purpose">Purpose</label>
                    <select class="form-control"id="purpose">
                    <option value="To Teach a Class and Go">To Teach a Class and Go</option>
                    <option value="Normal Resumption">Normal Resumption</option>
                    <option value="To Pick up Something/Someone">To Pick up Something/Someone</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="last_name">Items</label>
                    <input type="text" id="items" name="items"  placeholder="Laptop, kettle, knife. etc" class="form-control"/>
                </div>
               
                <input type="hidden" id="hidden_firstname" placeholder="Employee ID" class="form-control" />
                <input type="hidden" id="hidden_lastname" placeholder="Employee ID" class="form-control" />
                <input type="hidden" id="hidden_department" placeholder="Employee ID" class="form-control" />
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="add_existing_staffRecord()">Check in </button>
            </div>
        </div>
    </div>
</div>
<!-- Existing Staff -->

<!-- Existing Student -->
<div class="modal fade" id="existing_student_item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Existing Students Only</h4>
            </div>
            <div class="modal-body magazine-form">

                <div class="form-group">
                    <label for="first_name">Student ID</label><br>
                    <input type="text" id="search-box_student"class="form-control" placeholder="Student ID" />
                    <div id="suggesstion-box_student"></div>
                </div>

                <div class="form-group">
                    <label for="purpose">Purpose</label>
                    <select class="form-control"id="purpose_student">
                    <option value="To Teach a Class and Go">To Attend Class and Go</option>
                    <option value="Normal Resumption">Normal Resumption</option>
                    <option value="To Pick up Something/Someone">To Pick up Something/Someone</option>
                    <option value="To Pick up Something/Someone">To Visit Someone</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="last_name">Items</label>
                    <input type="text" id="items_student" name="items"  placeholder="Laptop, kettle, knife. etc" class="form-control"/>
                </div>
               
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="add_existing_studentRecord()">Check in</button>
            </div>
        </div>
    </div>
</div>
<!-- Existing Student -->
<!-- Existing Visitors -->
<div class="modal fade" id="existing_visitors_item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Existing Visitors Only</h4>
            </div>
            <div class="modal-body magazine-form">

               <div class="form-group">
                    <label for="first_name">Visitors ID</label><br>
                    <input type="text" id="search-box_visitor"class="form-control" placeholder="Visitor ID" />
                    <div id="suggesstion-box_visitor"></div>
                </div>
               
                <div class="form-group">
                    <label for="purpose">Purpose</label>
                    <select class="form-control"name = "purpose_visitor"id="purpose_visitor">
                    <option value="To Teach a Class and Go">To Attend Class and Go</option>
                    <option value="Normal Resumption">Normal Resumption</option>
                    <option value="To Pick up Something/Someone">To Pick up Something/Someone</option>
                    <option value="To Pick up Something/Someone">To Visit Someone</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="identity">Identification</label>
                    <select class="form-control"id="identity_visitor"name="identity">
                    <option value="National Identity Card">National Identity Card</option>
                    <option value="ATM Card">ATM Card</option>
                    <option value="Business Card">Business Card</option>
                    <option value="Voter's Card">Voter's Card</option>
                    </select>
                    <!-- <input type="text" id="rights" placeholder="Rights" class="form-control"/> -->
                </div>
                
                <div class="form-group">
                    <label for="last_name">Items</label>
                    <input type="text" id="items_visitor" name="items"  placeholder="Laptop, kettle, knife. etc" class="form-control"/>
                </div>
               
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="add_existing_visitorRecord()">Check_in</button>
            </div>
        </div>
    </div>
</div>
<!-- Existing Visitors -->

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
    <script src="js/dashboardlogic.js"></script>
    <script src="sweetalert/sweetalert.min.js"></script>
    
	<script type="text/javascript">
    
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-display1',
            	message: "A <b>Security Post Item Management System!</b>"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
