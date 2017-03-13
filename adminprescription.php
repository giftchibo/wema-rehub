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
$menu= 1;
include('connect_db.php');
include("validation/header.php"); 
include("functions/admin.php");
if(isset($_GET["presdelid"]))
{
	mysql_query("DELETE FROM medicine WHERE medicine = '$_GET[presdelid]'");
}
if(isset($_POST["button"]))
{
$sql="INSERT INTO medicine (medicine ,description) VALUES ( '$_POST[abc1]', '$_POST[abc3]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}
//CHECKS login button is submitted or not
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$loginvalidation =  loginfuntion($_POST["loginid"],$_POST["password"]);
}
?>
<!-- ####################################################################################################### -->



<!-- Patient Login Form####################################################################################################### -->
<div id="main">

  <section class="container">
  
     <div class="">

<a href="admin.php"> << Back</a>
<form id="formID" class="formular" method="post" action=''>
  <div align="center"><strong><b> <u>ADD Medicine</u></b></strong></div>
 <p> Medicine
  <label for="textfield"></label>
<input type="text" name="abc1" id="abc1" class="validate[required] text-input">



Description 
  <label for="textarea"></label>
  <textarea name="abc3" id="textarea" cols="4" rows="5"></textarea>

  <p>
    <input type="submit" name="button" id="button" value="Add">
    
   <a href="adminaccount.php"> <input type="reset" name="button3" id="button3" value="Reset"></a>
  </form><br />
<table width="100" border="1">
  <tr bgcolor="#FFFFFF">
    <td width="350"><font color="#0033FF"><b>Medicine</b></font></td>
    
    <td width="500"><font color="#0033FF"><b>Description</b></font></td>
    <td width="500"><font color="#0033FF"><b>Delete</b></font></td>
  </tr>
  <?php
  $resresc = mysql_query("SELECT * FROM medicine");
while($row = mysql_fetch_array($resresc))
  	{	 
echo " <tr>";
echo "    <td> $row[medicine]</td>";
echo "    <td> $row[description]</td>";
echo "    <td><a href='adminprescription.php?presdelid=$row[medicine]'><img src='images/delete-icon.png' width='1' height='1' /></a></td>";
echo "  </tr>";
	}
	?>
</table>

</div>
</div>
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>
