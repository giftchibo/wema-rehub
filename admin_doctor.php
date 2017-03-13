<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$username=$_SESSION['username'];
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
$sql1=mysql_query("SELECT * FROM doctor WHERE username='$user'")or die(mysql_error());
 $result=mysql_fetch_array($sql1);
if($result>0){
$message="<font color=blue>sorry the username entered already exists</font>";
 }else{
$sql=mysql_query("INSERT INTO doctor(docid, doctorname, quali, specialistin,contactno,emailid,biodata,username,password)
VALUES('$docd','$dname','$aid','$spece','$cont','$emd','$bio','$user','$pas',NOW())");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_doctor.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $username;?> -  wema rehub System</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<script>
function validateForm()
{

//for alphabet characters only
var str=document.form1.docname.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("First Name Cannot Contain Numerical Values");
	document.form1.docname.value="";
	document.form1.docname.focus();
	return false;
	}}
	
if(document.form1.docname.value=="")
{
alert("Name Field is Empty");
return false;
}

//for alphabet characters only
var str=document.form1.docname.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Last Name Cannot Contain Numerical Values");
	document.form1.docname.value="";
	document.form1.docname.focus();
	return false;
	}}
	

if(document.form1.docname.value=="")
{
alert("Name Field is Empty");
return false;
}

}

</script>



   <style>#left-column {height: 477px;}
 #main {height: 477px;}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a>wema rehub System </h1></div>
<div id="left_column">
<div id="button">
		<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_doctor.php">doctor</a></li>
			<li><a href="admin1.php">adminprofile</a></li>
			<li><a href="admin_manager.php">Manager</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			<li><a href="adminprescription.php">precription</a></li>
			<li><a href="patientrecords.php">managepatrecords</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Doctor</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View User</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add User</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php echo $message;
			  echo $message1;
		/* 
		View
        Displays all data from 'doctor' table
		*/
        // connect to the database
        include_once('connect_db.php');
       // get results from database
       $result = mysql_query("SELECT * FROM doctor")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr> <th>ID</th><th>Firstname </th> <th>password </th> <th>Username </th><th>Update </th><th>Delete</th></tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['docid'] . '</td>';
                echo '<td>' . $row['doctorname'] . '</td>';
				echo '<td>' . $row['password'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				?>
				<td><a href="update_doctor.php?username=<?php echo $row['username']?>"><img src="images/update-icon.png" width="35" height="35" border="0" /></a></td>
				<td><a href="delete_doctor.php?doctor_id=<?php echo $row['doctor_id']?>"><img src="images/delete-icon.jpg" width="35" height="35" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
		           <!--doctor-->
				   <?php echo $message;
			  echo $message1;
			  ?>
		<form name="form1" onsubmit="return validateForm(this);" action="admin_doctor.php" method="post" >
			<table width="220" height="106" border="0" >	
				<tr><td align="center"><input name="" type="text" style="width:170px" placeholder="docid" required="required"  /></td></tr>
				<tr><td align="center"><input name="" type="text" style="width:170px" placeholder="docname" required="required" " /></td></tr>
				<tr><td align="center"><input name="" type="text" style="width:170px" placeholder="qualification" required="required" /></td></tr>  
				<tr><td align="center"><input name="" type="text" style="width:170px" placeholder="Specialistion" required="required" "/></td></tr>  
				<tr><td align="center"><input name="" type="text" style="width:170px" placeholder="contactno" required="required"  /></td></tr> 
				<tr><td align="center"><input name="" type="email" style="width:170px" placeholder="emailid" required="required"  /></td></tr>
				<tr><td align="center"><input name="" type="text" style="width:170px"placeholder="biodata"  required="required"  /></td></tr>  
   
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td align="center"><input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password"/></td></tr>
				<tr><td align="right"><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form>
        </div>  
    </div>  
</div>
</div>
<div id="footer" align="Center">wema rehub System . Copyright All Rights Reserved</div>
</div>
</body>
</html>
