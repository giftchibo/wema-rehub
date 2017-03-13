
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
include("connect_db.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");
$dt= "$_POST[year]-$_POST[month]-$_POST[date]";

mysql_query("DELETE FROM patient WHERE patid = '$_GET[paid]'");
if(isset($_POST["patidbtn"]))
{
$resultpatientrec = mysql_query("SELECT * FROM  prescription where presid='$_POST[textfield]'");
$_POST[textfield2] ="";
}
else if(isset($_POST["patcontbtn"]))
{
	$resultpatientrec = mysql_query("SELECT * FROM  prescription where patid='$_POST[textfield2]'");
		$_POST[textfield]="";
}
else
{
$resultpatientrec = mysql_query("SELECT * FROM  prescription ");	
}




  
  ?>
  




  
<div id="main1">

  <section class="container1">
  
     <div class="">
  <div align="center"><strong><u><h1>Precriptionrecords </h1> </u></strong></div>
<p>&nbsp;</p>

<form method="post" action="" id="formID">

     <strong>Search by Pres ID.</strong>
     
          <input type="text" name="textfield" id="textfield" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield]; ?>"/>  
          <input type="submit" name="patidbtn" id="button" value="Search" />
    <br />
          <strong>PatientID &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
   <input type="text" name="textfield2" id="textfield2" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield2]; ?>"/> 
           <input type="submit" name="patcontbtn" id="button2" value="Search" />

        </form>
      <table width="997" border="1">
     
	  
	 
       
        <tr>
          <th width="12" height="30" scope="col"><font color="#0000FF">presid</font></th>
          <th width="16" scope="col"><font color="#0000FF">patid</font></th>
		 
          <th width="10" scope="col"><font color="#0000FF">medicine</font></th>
		    <th width="10" scope="col"><font color="#0000FF">medicine</font></th>
          
          <th width="107" scope="col"><font color="#0000FF">day</font></th>
		  <th width="107" scope="col"><font color="#0000FF">dose</font></th>
		  <th width="107" scope="col"><font color="#0000FF">treid</font></th>
		  <th width="107" scope="col"><font color="#0000FF">precfee</font></th>
          <th width="107" scope="col"><font color="#0000FF">date</font></th>
          <th width="107" scope="col"><font color="#0000FF">time</font></th>
          
          <th colspan="107" scope="col">Action</th>
          
          
        </tr>
		 <?php
		  
          while($row= mysql_fetch_array($resultpatientrec))
  {
	 
	  ?> 
         <tr>
          <td height="40"><?php echo $row["presid"]; ?></td>
          <td><?php echo $row["patid"]; ?></td>
		  
		 <td><?php echo $row["medicine"]; ?></td>
		 
          <td><?php echo $row["treid"]; ?></td>
		  <td><?php echo $row["precfee"]; ?></td>
          <td><?php echo $row["date"]; ?></td>
          <td><?php echo $row["time"]; ?></td>
          
          <td><a href="patientmorereport1.php?paid=<? ?>" ><img src="images/more.jpg"  /></a></td>
           <td width="36"><a href="patientrecords.php?paid=<?php echo $row1[patid]; ?>" ><img src="images/icons/remove.png" alt="" width="32" height="32" /></a></td>
        </tr>
  
		 <?php
          }
		  ?>
      </table>
	   </div>

		</div>
    <div id="footer1" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>

</body>
</html>

