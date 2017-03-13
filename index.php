<?php
include_once 'connect_db.php';
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position){
case 'Admin':
$result=mysql_query("SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['admin_id']=$row[0];
$_SESSION['username']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";

}
break;






case 'recordsofficer':
$result=mysql_query("SELECT rofficer_id ,first_name,last_name,staff_id,username,password FROM  recordofficer WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['rofficer_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
$_SESSION['password']=$row[5];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/recordsofficer.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Triagy':
$result=mysql_query("SELECT empid ,password,empname,address,username,password FROM triagy WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['empid']=$row[0];
$_SESSION['password']=$row[1];
$_SESSION['empname']=$row[2];
$_SESSION['address']=$row[3];
$_SESSION['username']=$row[4];
$_SESSION['password']=$row[5];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/trg.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;

case 'LabAssistance':
$result=mysql_query("SELECT empid ,password,empname,address,username,password FROM  lab WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['empid']=$row[0];
$_SESSION['password']=$row[1];
$_SESSION['empname']=$row[2];
$_SESSION['address']=$row[3];
$_SESSION['username']=$row[4];
$_SESSION['password']=$row[5];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/lab.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;


case 'doctor':
$result=mysql_query("SELECT docid,doctorname,quali,specialistin , username FROM doctor WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['docid']=$row[0];
$_SESSION['doctorname']=$row[1];
$_SESSION['quali']=$row[2];
$_SESSION['specialistin']=$row[3];
$_SESSION['username']=$row[4];

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/doctor.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'cashier':
$result=mysql_query("SELECT empid, password,empname,address,contactno,emailid,username FROM cashier WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['empid']=$row[0];
$_SESSION['password']=$row[1];
$_SESSION['empname']=$row[2];
$_SESSION['address']=$row[3];
$_SESSION['contactno']=$row[4];
$_SESSION['emailid']=$row[5];
$_SESSION['username']=$row[6];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'pharmacy':
$result=mysql_query("SELECT empid ,password,empname,address,username,password FROM  pharmacy WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['empid']=$row[0];
$_SESSION['password']=$row[1];
$_SESSION['empname']=$row[2];
$_SESSION['address']=$row[3];
$_SESSION['username']=$row[4];
$_SESSION['password']=$row[5];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Manager':
$result=mysql_query("SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['manager_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}}

echo <<<LOGIN
<!DOCTYPE html>
<html>
<head>
<title>wema rehub system</title>
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<style>
#content {
height: auto;
}
#main{
height: auto;}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><img src="images/hd_logo.jpg">wema rehab system</h1>
</div>
<div id="main">

  <section class="container">
  
     <div class="login">
	 <img src="images/hd_logo.jpg">
      <h1>Login here</h1>
	  $message
      <form method="post" action="index.php">
		 <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
		<p><select name="position">
		<option>--Select position--</option>
			<option>Admin</option>
			<option>recordsofficer</option>
			<option>Triagy</option>
			<option>doctor</option>
			<option>LabAssistance</option>
			<option>cashier</option>
			<option>pharmacy</option>
			<option>Manager</option>
			
			</select></p>
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>
    </section>
</div>
<div id="footer" align="Center"> wema rehab system. Copyright All Rights Reserved</div>
</div>
</body>
</html>
LOGIN;
?>
