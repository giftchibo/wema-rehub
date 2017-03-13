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
mysql_query("DELETE FROM doctor WHERE docid = '$_GET[docid]'");
$resapp = mysql_query("SELECT * FROM doctor");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="main1">

  <section class="container1">
  
     <div class="">
      <h1>Doctor Records</h1>
      <p align="left"><a href="doctors.php"><font color="#FF0000" face="Arial Black, Gadget, sans-serif" size="3"><b><u>Add New Doctor</u></b></font></a></p>
      <table width="1009" border="1">
        <tr>
          <th width="103" height="42" scope="col"><font color="#0000FF">Doc ID</font>.</th>
          <th width="75" scope="col"><font color="#0000FF">Password</font></th>
          <th width="181" scope="col"><font color="#0000FF">Doctor Name</font></th>
          <th width="64" scope="col"><font color="#0000FF">Specialist</font></th>
          <th width="91" scope="col"><font color="#0000FF">Qualification</font></th>
          <th width="129" scope="col"><font color="#0000FF">Conatact No</font></th>
          <th width="122" scope="col"><font color="#0000FF">Email ID</font></th>
          <th width="63" scope="col"><font color="#0000FF">Bio-data</font></th>
          <th colspan="2" scope="col"><font color="#0000FF">Action</font></th>
        </tr>
        <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
        <tr>
          <td height="44"><?php echo $row1["docid"]; ?></td>
          <td><?php echo $row1["password"]; ?></td>
          <td><?php echo $row1["doctorname"]; ?></td>
          <td><?php echo $row1["specialistin"]; ?></td>
          <td><?php echo $row1["quali"]; ?></td>
          <td>&nbsp;<?php echo $row1["contactno"]; ?></td>
          <td><?php echo $row1["emailid"]; ?></td>
          <td align="center"><strong><a href="admindocbiodata.php?docid=<?php echo $row1["docid"]; ?>">View</a></strong></td>
          <td width="57"><a href="admindocprofile.php?docids=<?php echo $row1[docid]; ?>"><img src="images/update-icon.png" alt="" width="32" height="32"></a></td>
          <td width="60"><a href="admindoc.php?docid=<?php echo $row1[docid]; ?>" ><img src="images/icons/remove.png" alt="" width="32" height="32"></a></td>
        </tr>
        <?php
          }
		  ?>
      </table>
      <p align="left">&nbsp;</p>
   
      <p ><a href="admin.php">< < Back</a> </p>
 
      <p>&nbsp;</p>
<!-- Patient Login Form Ends Here####################################################################################################### -->
 
  </div>
</div>
<div id="footer1" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>
