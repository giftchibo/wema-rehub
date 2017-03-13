<?phpempid 	password 	empname 	address 	contactno 	emailid 	designation
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$empid=$_SESSION['emailid'];
$pass=$_SESSION['password'];
$addres=$_SESSION['address'];
$empn=$_SESSION['empname'];
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
    

			<li><a href="reception.php">Dashboard</a></li>
			<li><a href="empprofile.php"> employeeprofile</a></li>
			<li><a href="empappview.php">appointment</a></li>
			<li><a href="emplab.php">laboratory</a></li>
			<li><a href="patientreports.php">patient Bill</a></li>
			<li><a href="doctimingsview.php">timing</a></li>
			<li><a href="expens.php">expenses</a></li>
			<li><a href="logout.php">Logout</a></li>
			
		</ul>	
</div>
</div>
<div id="main">
<!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="cashier.php" class="dashboard-module">
                	<img src="images/cashier_icon.jpg" width="100" height="100" alt="edit" />
                	<span>Dashboard</span>
                </a>
			     <a href="empprofile.php"target="_top" class="dashboard-module">
                	<img src="images/payment.png" width="100" height="100" alt="edit" />
                	<span>employeeprofile</span>
					</a>
				<a href="empappview.php"target="_top_right" class="dashboard-module">
                	<img src="images/payment.png" width="100" height="100" alt="edit" />
                	<span>appointment</span>
                </a>
				<a href="emplab.php"target="_top_right" class="dashboard-module">
                	<img src="images/payment.png" width="100" height="100" alt="edit" />
                	<span>laboratory</span>
                </a>
				<a href="patientreports.php"target="_top_right" class="dashboard-module">
                	<img src="images/payment.png" width="100" height="100" alt="edit" />
                	<span>patient Bill</span>
                </a>
				<a href="doctimingsview.php"target="_top_right" class="dashboard-module">
                	<img src="images/payment.png" width="100" height="100" alt="edit" />
                	<span>timing</span>
                </a>
				<a href="expens.php"target="_top_right" class="dashboard-module">
                	<img src="images/payment.png" width="100" height="100" alt="edit" />
                	<span>expenses</span>
                </a>
				
				
				
              </div>
</div>
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>
