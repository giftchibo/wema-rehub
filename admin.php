<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
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
<h1><a href="#"><img src="images/hd_logo.jpg"></a> wema rehub system</</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin1.php">adminprofile</a></li>
			<li><a href="admindoc.php">doctor</a></li>
			<li><a href="adminemp.php">employee</a></li>
			<li><a href="admin_manager.php">manager</a></li>
			<li><a href="adminprescription.php">admprecri</a></li>
			<li><a href="patientrecords.php">patrecords</a></li>
			<li><a href="employeesalary.php">salary</a></li>
			<li><a href="addexpenses.php">expenses</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
    
 <!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="admin.php" class="dashboard-module">
                	<img src="images/admin_icon.jpg" width="75" height="75" alt="edit" />
                	<span>Dashboard</span>
                </a>
				     <a href="admin1.php" class="dashboard-module">
                	<img src="images/Administrator Security Key.jpg"  width="75" height="75" alt="edit" />
                	<span>adminprofile</span>
                </a>
                <a href="admindoc.php" class="dashboard-module">
                	<img src="images/doctors.jpg"  width="75" height="75" alt="edit" />
                	<span>doctor</span>
                </a>
                
                <a href="admin_manager.php" class="dashboard-module">
                	<img src="images/manager_icon.png"  width="75" height="75" alt="edit" />
                	<span>Manager</span>
                </a>
				
                  <a href="adminemp.php" class="dashboard-module">
                	<img src="images/cashier_icon.jpg" width="75" height="75" alt="edit" />
                	<span>employees</span>
                </a>	
                   <a href="adminprescription.php" class="dashboard-module">
                	<img src="images/pharmacist_icon.jpg"  width="75" height="75" alt="edit" />
                	<span>admnprescri</span>
                </a>
				     <a href="patientrecords.php" class="dashboard-module">
                	<img src="images/patients-icon.gif"  width="75" height="75" alt="edit" />
                	<span>patrecords</span>
					
					</a>
					 <a href="employeesalary.php" class="dashboard-module">
                	<img src="images/invoic_ 1.jpg" width="75" height="75" alt="edit" />
                	<span>salary</span>
                </a>
				 <a href="addexpenses.php" class="dashboard-module">
                	<img src="images/edit.jpg" width="75" height="75" alt="edit" />
                	<span>expenses</span>
                </a>
					
                </a>
				
			</div>
</div>
<div id="footer" align="Center"> wema rehub system</. Copyright All Rights Reserved</div>
</div>
</body>
</html>
