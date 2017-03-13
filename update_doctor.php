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

 if(isset($_POST['submit'])){
$docd=$_POST['docid'];
$dname=$_POST['doctorname'];
$aid=$_POST['quali'];
$spece=$_POST['specialistin'];
$cont=$_POST['contactno']; 	
$emd=$_POST['emailid'];
$bio=$_POST['biodata'];
$user=$_POST['username'];
$pas=$_POST['password'];
// get value of id that sent from address bar
$user=$_POST['user'];

// Retrieve data from database 
$sql="UPDATE doctor SET docid='$docid', doctorname='$dname',
quali='$aid',specialistin='$spece',contactno='$cont',emailid='$emd', bio='$biodata',username='$use',password='$pas' WHERE username='$user'";
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message1="<font color=red>Update Failed, Try again</font>";
}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $username?> wema rehub system</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
 <style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a> wema rehub System</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_doctor.php">doctor</a></li>
			<li><a href="admin_manager.php">Manager</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Users</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Update User</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php echo $message1;?>
          <form name="myform" onsubmit="return validateForm(this);" action="update_cashier.php" method="post" >
			<table width="500" height="120" border="0" >	
				<tr><td align="center"><input name="docid" type="text" style="width:170px" placeholder="docid" required="required" id="docid" /></td></tr>
				<tr><td align="center"><input name="docname" type="text" style="width:170px" placeholder="docname" required="required" id="docname" /></td></tr>
				<tr><td align="center"><input name="qualification" type="text" style="width:170px" placeholder="qualification" required="required" id="qualification"/></td></tr>  
				<tr><td align="center"><input name="specialistin" type="text" style="width:170px" placeholder="Specialistion" required="required" id="specelisation"/></td></tr>  
				<tr><td align="center"><input name="contactno" type="text" style="width:170px" placeholder="contactno" required="required" id="contactno" /></td></tr> 
				<tr><td align="center"><input name="emailid" type="email" style="width:170px" placeholder="emailid" required="required" id="emailid" /></td></tr>
				<tr><td align="center"><input name="biodata" type="text" style="width:170px"placeholder="biodata"  required="required" id="biodata" /></td></tr>  
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td align="center"><input name="password" placeholder="Password" id="password"value="<?php include_once('connect_db.php'); echo $_GET['password']?>"type="password" style="width:170px"/></td></tr>
				<tr><td align="center"><input name="submit" type="submit" value="Update"/></td></tr>
            </table>
		</form>
		</div>  
    </div>  
</div>
</div>
<div id="footer" align="Center"> Pharmacy Sys 2013. Copyright All Rights Reserved</div>
</div>
</body>
</html>
