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
<div id="content1">
<div id="header1">
<h1><img src="images/hd_logo.jpg">wema rehab system</h1>
</div>

<?php 
session_start();
$menu= 2;
include("connect_db.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

//CHECKS login button is submitted or not

?>

<!-- ####################################################################################################### -->
<?php include("menu.php"); 
mysql_query("DELETE FROM patient WHERE patid = '$_GET[paid]'");
if(isset($_POST["patidbtn"]))
{
$resapp = mysql_query("SELECT * FROM patient where patid='$_POST[textfield]'");
$_POST[textfield2] ="";
}
else if(isset($_POST["patcontbtn"]))
{
	$resapp = mysql_query("SELECT * FROM patient where contactno='$_POST[textfield2]'");
		$_POST[textfield]="";
}
else
{
	$resapp = mysql_query("SELECT * FROM patient");
}
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="main1">

  <section class="container1">
  
     <div class="">
      <h1>Patient Records      </h1>
    
       <form method="post" action="" id="formID">

     <strong>Search by Patient ID.</strong>
      &nbsp; 
          <input type="text" name="textfield" id="textfield" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield]; ?>"/> &nbsp; 
          <input type="submit" name="patidbtn" id="button" value="Search" />
    <br />
          <strong>Search by Contact No.</strong>
  &nbsp; <input type="text" name="textfield2" id="textfield2" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield2]; ?>"/> &nbsp;
           <input type="submit" name="patcontbtn" id="button2" value="Search" />

        </form>
 
      <p>&nbsp;</p>
      <table width="40" border="1">
        <tr>
          <th width="12" height="30" scope="col"><font color="#0000FF">Patient ID</font></th>
          <th width="16" scope="col"><font color="#0000FF">Patient Name</font></th>
		  <th width="8" scope="col"><font color="#0000FF">addictiontype</font></th>
          <th width="10" scope="col"><font color="#0000FF">Date of Birth</font></th>
          <th width="13" scope="col"><font color="#0000FF">Gender</font></th>
          <th width="15" scope="col"><font color="#0000FF">Email ID</font></th>
          <th width="11" scope="col"><font color="#0000FF">Contact No</font></th>
          <th width="10" scope="col"><font color="#0000FF">Address</font></th>
          
          <th colspan="25" scope="col">Action</th>
        </tr>
        <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?> 	 
        <tr>
          <td height="40"><?php echo $row1["patid"]; ?></td>
          <td><?php echo $row1["patfname"]. " ".$row1["patlname"]; ?></td>
		 <td><?php echo $row1["addiction_type"]; ?></td>
          <td><?php echo $row1["dob"]; ?></td>
          <td><?php echo $row1["gender"]; ?></td>
          <td><?php echo $row1["emailid"]; ?></td>
          <td>&nbsp;<?php echo $row1["contactno"]; ?></td>
          <td><?php echo $row1["address"]. "". $row1["city"]. "". $row1["country"]; ?></td>
          <td width="36"><a href="patientrecords.php?paid=<?php echo $row1[patid]; ?>" ><img src="images/icons/remove.png" alt="" width="32" height="32" /></a></td>
          <td width="44"><a href="patientmorereport.php?paid=<?php echo $row1[patid]; ?>" ><img src="images/more.jpg" width="4" height="3" /></a></td>
          
        </tr>
        <?php
          }
		  ?>
      </table>
      <p align="left">&nbsp;</p>
   
      <p ><a href="admin.php">< < Back</a> </p>
 
    
 </div>
</div>
<!-- ####################################################################################################### -->
<div id="footer1" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html> 