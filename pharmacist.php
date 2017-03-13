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
<title><?php echo $user;?> - WEMA REHUB SYSTEM</title>
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
<h1><a href="#"><img src="images/hd_logo.jpg"></a>Wema rehub System </h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="pharmacist.php">Dashboard</a></li>
			<li><a href="prescriptionadd1.php">precription</a></li>
			<li><a href="adminprescription.php">stock</a></li>
			<li><a href="doctimingsview.php">timing</a></li>
			<li><a href="expens.php">expenses</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="pharmacist.php" class="dashboard-module">
                	<img src="images/pharmacist_icon.jpg" width="100" height="100" alt="edit" />
                	<span>Dashboard</span>
                </a>
                             
                <a href="prescriptionadd1.php" class="dashboard-module">
                	<img src="images/prescri.jpg"  width="100" height="100" alt="edit" />
                	<span>Prescription</span>
                </a>
	            <a href="adminprescription.php" class="dashboard-module">
                	<img src="images/stock_icon.jpg" width="100" height="100" alt="edit" />
                	<span>Stock</span>
                </a>
				<a href="doctimingsview.php" class="dashboard-module">
                	<img src="images/clock.gif" width="100" height="100" alt="edit" />
                	<span>timings</span>
                </a>
				<a href="expens.php" class="dashboard-module">
                	<img src="images/edit.jpg" width="100" height="100" alt="edit" />
                	<span>expens</span>
                </a>
				</div>
</div>
<div id="footer" align="Center"> Wema Rehub System . Copyright All Rights Reserved</div>
</div>
</body>
</html>
