<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['pharmacist_id'];
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
<title><?php echo $user;?> - Wema rehub System</title>
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
<h1><a href="#"><img src="images/hd_logo.jpg"></a> Wema rehub sytem </h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="doctor.php">Dashboard</a></li>
			<li><a href="appointmentrecords.php">appointment</a></li>
			<li><a href="patientrecords.php">patientrecords</a></li>
			<li><a href="prescription.php">medicinerecords</a></li>
			<li><a href="docpattreatment.php">ptreatmereports</a></li>
			<li><a href="trgyreports.php">trgyreports</a></li>
			<li><a href="timing.php">timing</a></li>
			<li><a href="docprofile.php">doctorprofile</a></li>

			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="doctor.php" class="dashboard-module">
                	<img src="images/doctors.jpg" width="100" height="100" alt="edit" />
                	<span>Dashboard</span>
                </a>
                             
                <a href="adminprescription.php" class="dashboard-module">
                	<img src="images/prescri.jpg"  width="100" height="100" alt="edit" />
                	<span>medicinerecords</span>
                </a>
				<a href="docpattreatment.php" class="dashboard-module">
                	<img src="images/note.png" width="100" height="100" alt="edit" />
                	<span>ptrementsreport</span>
                </a>
				<a href="timing.php" class="dashboard-module">
                	<img src="images/clock.gif" width="100" height="100" alt="edit" />
                	<span>timing</span>
                </a>
	            <a href="appointmentrecords.php" class="dashboard-module">
                	<img src="images/next.gif " width="100" height="100" alt="edit" />
                	<span>appointment</span>
                </a>
				<a href="patientrecords.php" class="dashboard-module">
                	<img src="images/patients-icon.gif" width="100" height="100" alt="edit" />
                	<span>patientrecords</span>
                </a>
				
              </div>
</div>
<div id="footer" align="Center"> wema rehub  system . Copyright All Rights Reserved</div>
</div>
</body>
</html>
