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
include("connect_db.php"); 

include("validation/header.php"); 
include("functions/emp.php");

//CHECKS login button is submitted or not

?>
<!-- ####################################################################################################### -->
<?php 

mysql_query("DELETE FROM appointment where appointid='$_GET[appiddel]'");
$resapp = mysql_query("SELECT * FROM appointment where patid='$_SESSION[patid]'");
?>

<!-- Patient Login Form####################################################################################################### -->


<div id="main">

  <section class="container">
  
     <div class="">



      <h1>Appointments</h1>
      <table width="620" border="1">
      <tr>
            <th width="40" height="58" scope="col">App No.</th>
            <th width="53" scope="col">Date<br />
Time</th>
            <th width="85" scope="col"><p>Appointment<br />
Date</p></th>
            <th width="89" scope="col">Appointment Time</th>
            <th width="51" scope="col"><p>Doctor Name</p></th>
            <th width="148" scope="col">Comment</th>
            <th width="42" scope="col">Status</th>
            <th width="45" scope="col">Delete</th>
          </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	  ?>
          <tr>
            <td>&nbsp;<?php echo $row1["appointid"]; ?></td>
            <td>&nbsp;<?php echo date("d-m-Y h:i:s", strtotime($row1[datetime])) ; ?></td>
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($row1[adate])); ?></td>
            <td>&nbsp;<?php echo $row1["atime"]; ?></td>
            <td>&nbsp;<?php 
			 $respacdoc = mysql_query("SELECT * FROM doctor where docid='$row1[docid]'");
 while($row26ab = mysql_fetch_array($respacdoc))
{
echo $docname = $row26ab["doctorname"];
}
			?></td>
            <td>&nbsp;<?php echo $row1["comment"]; ?></td>
            <td><?php echo $row1["status"]; ?></td>
            <td><div align="center">
            <?php 
			if($row1["status"] == "Pending") {?>
            <a href="appointmenttaken.php?appiddel=<?php echo $row1["appointid"] ; ?>"><img src="images/delete-icon.jpg"width="1" height="1" /></a></div></td>
             <?php } ?>
          </tr>
          <?php
          }
		  ?>
        </table>
        <p>&nbsp;</p>
        <a href="recordsofficer.php"> < < Back </a>
        
 <a href="logout1.php"><p>&nbsp;</p>   < < logoutpatient </a>
      <p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
 


    
    
     </div>
</div>
<!-- ####################################################################################################### -->
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html> 
    

