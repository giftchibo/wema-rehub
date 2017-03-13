<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['cashier_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - wema rehub system</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<style>
#left_column{
height: 470px;
}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a> wema rehub system</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="recordsofficer.php">Dashboard</a></li>
			<li><a href="tragyprofile.php">triagyexamin</a></li>
			<li><a href="admindoc.php">doctorprofile</a></li>
			<li><a href="patientrecords.php">patientrecords</a></li>
			<li><a href="appointment.php">appointment</a></li>
			<li><a href="appointmenttaken.php">appointmentlist</a></li>
			<li><a href="adminappview1.php">docappt</a></li>
			<li><a href="logout.php">Logout</a></li>
			
		</ul>	
</div>
</div>
<div id="main">
<!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="recordsofficer.php" class="dashboard-module">
                	<img src="images/1.jpg" width="100" height="100" alt="edit" />
                	<span>Dashboard</span>
                </a>
			     <a href="tragyprofile.php"target="_top" class="dashboard-module">
                	<img src="images/patient.jpg" width="100" height="100" alt="edit" />
                	<span>triagyexamination</span>
					</a>
				<a href="patientrecords.php"target="_top_right" class="dashboard-module">
                	<img src="images/patients-icon.gif" width="100" height="100" alt="edit" />
                	<span>patientrecords</span>
                </a>
				<a href="admindoc.php"target="_top_right" class="dashboard-module">
                	<img src="images/doctors.jpg" width="100" height="100" alt="edit" />
                	<span>doctorprofile</span>
                </a>
				<a href="adminappview1.php"target="_top_right" class="dashboard-module">
                	<img src="images/treat.jpg" width="100" height="100" alt="edit" />
                	<span>docappt</span>
                </a>
				<a href="appointments.php"target="_top_right" class="dashboard-module">
                	<img src="images/appoint.png" width="100" height="100" alt="edit" />
                	<span>appointment</span>
                </a>
				
				
              </div>
</div>
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>
