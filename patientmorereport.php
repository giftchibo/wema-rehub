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
$menu= 2;
include("connect_db.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

//CHECKS login button is submitted or not

?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); 
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="main">

  <section class="container">
  
     <div class="">

<a href="patientrecords.php"> < < Back </a>
      <h1>Patient Report      </h1>
<?php

      $resapp = mysql_query("SELECT * FROM patient where patid='$_GET[paid]'");
	    while($row11a = mysql_fetch_array($resapp))
  {
  $patientfname = $row11a["patfname"];
	$patlname = $row11a["patlname"];
  }
	  ?>
   
      <p> Patient ID : <?php echo $_GET["paid"];?></p>
       <p> First Name : <?php echo $patientfname;?></p>
        <p> Last Name : <?php echo $patlname;?></p>
       
      <p><strong>Treatment :</strong></p>
      <table width="533" border="1">
    <tr>
            <th width="38" height="42" scope="col">Treatment No.</th>
            <th width="107" scope="col">Doctor</th>
            <th width="113" scope="col">Treatment Fee</th>
            <th width="77" scope="col">Date            </th>
            <th width="89" scope="col"> Time</th>
            <th width="69" scope="col">Appointment ID</th>
        </tr>
          <?php
		   $resapprec = mysql_query("SELECT * FROM appointment where patid='$_GET[paid]'");
		       $ik=0;
			     while($row11b = mysql_fetch_array($resapprec))
 				 	{
		 $appids[$ik] =  $row11b["appointid"];
						 $ik++;
  					}
					for($kk=0; $kk<$ik; $kk++ )
					{
$restrek = mysql_query("SELECT * FROM treatment where appointid ='$appids[$kk]'");			
          while($row1b = mysql_fetch_array($restrek))
  {
	
	  ?>
          <tr>
            <td height="44">&nbsp;<?php echo $row1b["treid"]; ?></td>
            
            <td><?php echo $row1b["docid"]; 
			 $respacdoc = mysql_query("SELECT * FROM doctor where docid='$row1b[docid]'");
			          while($row26a = mysql_fetch_array($respacdoc))
  						{
	 					 echo " : ". $row26a["doctorname"];
	   					} 
			?> </td>
           
  			<td><?php 
			echo $row1b["treatfee"]; 
	  			?></td>
          
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($row1b["date"])); ?></td>
            <td>&nbsp;<?php echo $row1b["time"]; ?></td>
            <td>&nbsp;<?php echo $row1b["appointid"]; ?></td>
          </tr>
          <?php
          }
					}
		  ?>
      </table>
       
          <?php
		   $kabrec= mysql_query("SELECT * FROM labtest where patid='$_GET[paid]'");
          while($rowlab = mysql_fetch_array($kabrec))
  {
	 
	  ?>
          
          <?php
          }
		  ?>
      </table>
<br />
              </div>
</div>
<!-- ####################################################################################################### -->
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html> 