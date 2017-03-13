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
$resapp = mysql_query("SELECT * FROM billing where billid='$_POST[textfield]'");
$_POST[textfield2] ="";
}
else if(isset($_POST["patcontbtn"]))
{
	$resapp = mysql_query("SELECT * FROM billing  where patid='$_POST[textfield2]'");
		$_POST[textfield]="";
}
else
{
	$resapp = mysql_query("SELECT * FROM billing");
}
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="main1">

  <section class="container1">
  
     <div class="">
      <h1>Billing      </h1>
    
       <form method="post" action="" id="formID">

     <strong>Search billing ID.</strong>
      &nbsp; 
          <input type="text" name="textfield" id="textfield" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield]; ?>"/> &nbsp; 
          <input type="submit" name="patidbtn" id="button" value="Search" />
    <br />
          <strong>Search by patid</strong>
  &nbsp; <input type="text" name="textfield2" id="textfield2" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield2]; ?>"/> &nbsp;
           <input type="submit" name="patcontbtn" id="button2" value="Search" />

        </form>
 
      <p>&nbsp;</p>
      <table width="940" border="1">
        <tr>
          <th width="12" height="30" scope="col"><font color="#0000FF">billid ID</font></th>
          <th width="16" scope="col"><font color="#0000FF">patid</font></th>
		  <th width="8" scope="col"><font color="#0000FF">totamt</font></th>
          <th width="10" scope="col"><font color="#0000FF">Date Carried</font></th>
          <th width="13" scope="col"><font color="#0000FF">treid</font></th>
          <th width="15" scope="col"><font color="#0000FF">Doctor ID</font></th>
         
          
         
        </tr>
        <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?> 	 
        <tr>
          <td height="40"><?php echo $row1["billid"]; ?></td>
         
		 <td><?php echo $row1["patid"]; ?></td>
          <td><?php echo $row1["totamt"]; ?></td>
          <td><?php echo $row1["date"]; ?></td>
          <td><?php echo $row1["treid"]; ?></td>
          <td>&nbsp;<?php echo $row1["docid"]; ?></td>
         
        </tr>
        <?php
          }
		  ?>
      </table>
      <p align="left">&nbsp;</p>
   
      <p ><a href="manager.php">< < Back</a> </p>
 
    
 </div>
</div>
<!-- ####################################################################################################### -->
<div id="footer1" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html> 