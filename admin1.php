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
<?php 
session_start(); 
error_reporting(E_ERROR | E_PARSE);
include("connect_db.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");
$dt= "$_POST[year]-$_POST[month]-$_POST[date]";

 if(isset($_POST["submitupd"]))
{ 	 	 	 	
	//$datad = date("Y-m-d", strtotime($_POST[dob]));
$resrec= mysql_query("UPDATE admin SET adminname='$_POST[adminname]', contactno='$_POST[contactno]',emailid='$_POST[emailid]',password ='$_POST[password]'  WHERE admin_id = '$_POST[admin_id]' ");

}


$resultpatientrec = mysql_query("SELECT * FROM admin");
while($row = mysql_fetch_array($resultpatientrec))
  {
$adminid = $row[admin_id]; 
$nam = $row[adminname];
$contid = $row[contactno];
$emailid  =$row[emailid];
$password = $row[password];
  }
  

//CHECKS login button is submitted or not
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$loginvalidation =  loginfuntion($_POST["loginid"],$_POST["password"]);
}
include("menu.php"); 
?>

<!-- Patient Login Form####################################################################################################### -->



<div id="main">

  <section class="container">
  
     <div class="">

 <?php 
	 
	 // if(isset($_SESSION["patid"]))
{
include("validation/header.php");
//retrieve country from database. Table: country
include("connect_db.php");

?>
      <form id="formID" class="formular" method="post" action="">
 <div align="center">
   <p><strong><u>Admin Profile</u></strong><br />
 <font color="#FF0000"><b><?php
    if(isset($_POST["submitupd"]))
{
	echo "Admin record updated successfully..."; 
}
?></b></font> </p>
</div>
<label for="textfield">Admin ID :</label>
      <label>
	<input name="adminid" type="text"  class="validate[required,custom[onlyNumberSp]] text-input" id="req" value="<?php echo $adminid; ?>"/>
	    </label>
            <br />
        Name
<label>
	<input  class="validate[required,custom[onlyLetterSp]] text-input" type="text" name="adminname" id="req1"  value="<?php echo $nam; ?>" />
		</label>
<br />
            Contact No. 
            <label for="select" class="validate[required]"></label>    <script src="datetimepicker_css.js"></script>
        <input type="Text" id="demo1" maxlength="25" size="25" value="<?php echo $contid; ?>" name="contactno"  class="validate[required,custom[phone],minSize[10],maxSize[12]] text-input">
        <br />
    Email ID :<input type="text" name="emailid" id="textfield3" class="validate[required,custom[email]] text-input" value="<?php echo $emailid; ?>"/><br />
    Password:
    <input type="password" name="password" id="textfield7" value="<?php echo $password; ?>"  class="validate[[required],minSize[6]] text-input"/><br /><br />
      <input class="submit" type="submit" value="Update Profile" name="submitupd"/><hr/>

      </td>
    </tr>

     </table>
      <a href="admin.php">BACK</a>
</form>
    
 <?php
}
 ?>
       </div>  


</div>
<div id="footer" align="Center"> wema rehab system. Copyright All Rights Reserved</div>

</body>
</html>    