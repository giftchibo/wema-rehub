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
include("menu.php"); 
mysql_query("DELETE FROM patient WHERE patid = '$_GET[paid]'");
if(isset($_POST["patidbtn"]))
{
$resultpatientrec = mysql_query("SELECT * FROM labtest where testid='$_POST[textfield]'");
$_POST[textfield2] ="";
}
else if(isset($_POST["patcontbtn"]))
{
	$resultpatientrec = mysql_query("SELECT * FROM labtest where patid='$_POST[textfield2]'");
		$_POST[textfield]="";
}
else
{
$resultpatientrec = mysql_query("SELECT * FROM labtest ");	
}




  
  ?>
  
  <div id="main1">

  <section class="container1">
  
     <div class="">
  <div align="center"><strong><u><h1>Labrecords </h1> </u></strong></div>
<p>&nbsp;</p>
<form method="post" action="" id="formID">

     <strong>Search by Test ID.</strong>
     
          <input type="text" name="textfield" id="textfield" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield]; ?>"/>  
          <input type="submit" name="patidbtn" id="button" value="Search" />
    <br />
          <strong>PatientID &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
   <input type="text" name="textfield2" id="textfield2" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield2]; ?>"/> 
           <input type="submit" name="patcontbtn" id="button2" value="Search" />

        </form>
      <table width="974" border="1">
	  
	 
        <tr>
          <th width="107" height="30" scope="col"><font color="#0000FF">testid</font></th>
          <th width="107" scope="col"><font color="#0000FF">ttypeid</font></th>
		  <th width="107" scope="col"><font color="#0000FF">patid</font></th>
		  <th width="107" scope="col"><font color="#0000FF">empid</font></th>
          <th width="107" scope="col"><font color="#0000FF">labfee</font></th>
		   <th width="107" scope="col"><font color="#0000FF">date</font></th>
          <th width="107" scope="col"><font color="#0000FF">time</font></th>
		  <th width="107" scope="col"><font color="#0000FF">treid</font></th>
          <th colspan="107" scope="col">Action</th>
          
          
        </tr>
		 <?php
		  
          while($row= mysql_fetch_array($resultpatientrec))
  {
	 
	  ?> 
         <tr>
          <td height="40"><?php echo $row["testid"]; ?></td>
		   <td height="40"><?php echo $row["ttypeid"]; ?></td>
          <td><?php echo $row["patid"]; ?></td>
		  <td><?php echo $row["empid"]; ?></td>
		<td><?php echo $row["labfee"]; ?></td>
		  <td><?php echo $row["date"]; ?></td>
          <td><?php echo $row["time"]; ?></td>
		   <td height="40"><?php echo $row["treid"]; ?></td>
          <td><?php echo $row["commets"]; ?></td>
		  
		  <td width="36"><a href="patientrecords.php?paid=<?php echo $row1[patid]; ?>" ><img src="images/icons/remove.png" alt="" width="32" height="32" /></a></td>
          <td><a href="patientmorereport.php?paid=<? ?>" ><img src="images/more.jpg"  /></a></td>
          
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

