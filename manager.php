<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
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
			<li><a href="manager.php">Dashboard</a></li>
			<li><a href="view.php">Viewemployee</a></li>
			<li><a href="earnings.php">earningexpenreport</a></li>
			<li><a href="ptreatment.php">ptreatmentrecords</a></li>
			<li><a href="plab.php">plabrecords</a></li>
			<li><a href="prcpt.php">precriptionrecords</a></li>
			<li><a href="pharmar.php">parmacyrecords</a></li>
			<li><a href="view.php"> viewmanagestock</a></li>
			<li><a href="billa.php">viewbillingperfomed</a></li>
			<li><a href="supplier.php">viewsuppliers</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="manager.php" class="dashboard-module">
                	<img src="images/manager_icon.png" width="80" height="80" alt="edit" />
                	<span>Dashboard</span>
                </a>
				<a href="view.php" class="dashboard-module">
                	<img src="images/patients_1.png"  width="80" height="80" alt="edit" />
                	<span>Viewemployee</span>
                </a>
               	<a href="patientrecords.php" class="dashboard-module">
                	<img src="images/patients-icon.gif"  width="80" height="80" alt="edit" />
                	<span>patientrecords</span>
                </a>
				     <a href="earnings.php" class="dashboard-module">
                	<img src="images/invoic_ 1.jpg"  width="80" height="80" alt="edit" />
                	<span>earningexpenreport</span>
                </a>
				     <a href="billa,php" class="dashboard-module">
                	<img src="images/payment.png"  width="80" height="80" alt="edit" />
                	<span>viewbillingperfomed</span>
                </a>
				<a href="stock.php" class="dashboard-module">
                	<img src="images/stock_icon.jpg" width="80" height="80" alt="edit" />
                	<span>viewmanagestock</span>
                </a>
				<a href="supplier.php" class="dashboard-module">
                	<img src="images/pharmacist_icon.jpg" width="80" height="80" alt="edit" />
                	<span>viewsuppliers</span>
                </a>
				
        </div>
</div>
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>
