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
include('connect_db.php');
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


<a href="cashier.php"> < < Back </a>
      <h1>Patient Report      </h1>
<?php
      $resapp = mysql_query("SELECT * FROM patient where patid='$_POST[patid]'");
	    while($row11a = mysql_fetch_array($resapp))
  {
  $patientfname = $row11a["patfname"];
	$patlname = $row11a["patlname"];
  }
	  ?>
      <form method="post" action="" id="formID"  />
      Enter Patient ID :
        <label for="textfield"></label>
        <input type="text" name="patid" id="patid" class="validate[custom[onlyNumberSp]] text-input">
        <input name="" type="submit" value="Submit" />
      </form>
      <p> Patient ID : <?php echo $_POST["patid"];?></p>
       <p> First Name : <?php echo $patientfname;?></p>
        <p> Last Name : <?php echo $patlname;?></p>
       
      <p><strong>Treatment :</strong></p>
      <table width="533" border="1">
    <tr>
            <th width="74" height="42" scope="col">Treatment No.</th>
            <th width="91" scope="col">Appointment ID</th>
            <th width="111" scope="col">Doctor</th>
            <th width="76" scope="col">Treatment Fee</th>
            <th width="78" scope="col">Date </th>
            <th width="63" scope="col">Time</th>
        </tr>
          <?php
		   $resapprec = mysql_query("SELECT * FROM appointment where patid='$_POST[patid]'");
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
            
            <td><?php echo $row1b["appointid"]; ?></td>
           
  			<td><?php echo $row1b["docid"]; 
			 $respacdoc = mysql_query("SELECT * FROM doctor where docid='$row1b[docid]'");
			          while($row26a = mysql_fetch_array($respacdoc))
  						{
	 					 echo " : ". $row26a["doctorname"];
	   					} 
			?></td>
          
            <td><?php 
			echo $row1b["treatfee"]; 
	  			?></td>
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($row1b["date"])); ?></td>
            <td>&nbsp;<?php echo $row1b["time"]; ?></td>
          </tr>
          <?php
          }
					}
		  ?>
      </table>
        <p><strong>Laboratory Test :</strong></p>
        <table width="533" border="1">
          <tr>
            <th width="38" height="42" scope="col">Test ID.</th>
            <th width="107" scope="col">Treatment ID</th>
            <th width="113" scope="col">Test Type</th>
            <th width="77" scope="col">Lab Fee</th>
            <th width="89" scope="col">Date</th>
            <th width="69" scope="col">Time</th>
          </tr>
          <?php
		   $kabrec= mysql_query("SELECT * FROM labtest where patid='$_POST[patid]'");
          while($rowlab = mysql_fetch_array($kabrec))
  {
	 
	  ?>
          <tr>
            <td height="44">&nbsp;<?php echo $rowlab["testid"]; ?></td>
            <td><?php echo $rowlab["treid"]; ?></td>
            <td><?php 
			 $respac = mysql_query("SELECT * FROM testtype where ttypeid ='$rowlab[ttypeid]'");
			          while($row26 = mysql_fetch_array($respac))
  						{
	 					 echo  $row26["testtype"];
	   					} 
	  			?></td>
            <td><?php
	 					 echo $rowlab["labfee"];
	  			?></td>
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($rowlab["date"])); ?></td>
            <td>&nbsp;<?php echo $rowlab["time"]; ?></td>
          </tr>
          <?php
          }
		  ?>
		  
      </table>
	  <p><strong>Registration :</strong></p>
        <table width="533" border="1">
          <tr>
            
            <th width="113" scope="col">Addiction_type</th>
            <th width="77" scope="col">Reg Fee</th>
            <th width="89" scope="col">Date</th>
            <th width="69" scope="col">Time</th>
          </tr>
          <?php
		   $kabrec1= mysql_query("SELECT * FROM patient where patid='$_POST[patid]'");
          while($rowlab1 = mysql_fetch_array($kabrec1))
  {
	 
	  ?>
          <tr>
            <td height="44">&nbsp;&nbsp;<?php echo $rowlab1["addiction_type"]; ?></td>
            <td><?php echo $rowlab1["regfee"]; ?></td>
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($rowlab1["date"])); ?></td>
            <td>&nbsp;<?php echo $rowlab1["time"]; ?></td>
          </tr>
          <?php
          }
		  ?>
		  
      </table>
	  <p><strong>Triagyexamin :</strong></p>
        <table width="533" border="1">
          <tr>
            <th width="74" height="42" scope="col">Triagyid.</th>
            <th width="91" scope="col">Emp ID</th>
           <th width="77" scope="col">consutationfee</th>
            <th width="89" scope="col">Date</th>
            <th width="69" scope="col">Time</th>
          </tr>
          <?php
		   $kabrec2= mysql_query("SELECT * FROM patienttriagy where patid='$_POST[patid]'");
          while($rowlab2 = mysql_fetch_array($kabrec2))
  {
	 
	  ?>
          <tr>
            <td height="44">&nbsp;&nbsp;<?php echo $rowlab2["triagyid"]; ?></td>
			<td height="44">&nbsp;<?php echo $rowlab2["empid"]; ?></td>
            <td><?php echo $rowlab2["consutationfee"]; ?></td>
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($rowlab2["date"])); ?></td>
            <td>&nbsp;<?php echo $rowlab2["time"]; ?></td>
          </tr>
          <?php
          }
		  ?>
		  
      </table>
	  	  <p><strong>Pharmacy:</strong></p>
        <table width="533" border="1">
          <tr>
            <th width="74" height="42" scope="col">	Presid</th>
            <th width="91" scope="col">Treid</th>
           <th width="77" scope="col">PrecFee</th>
            <th width="89" scope="col">Date</th>
            <th width="69" scope="col">Time</th>
          </tr>
          <?php
		   $kabrec2= mysql_query("SELECT * FROM  prescription where patid='$_POST[patid]'");
          while($rowlab2 = mysql_fetch_array($kabrec2))
  {
	 
	  ?>
          <tr>
            <td height="44">&nbsp;&nbsp;<?php echo $rowlab2["presid"]; ?></td>
			<td height="44">&nbsp;<?php echo $rowlab2["treid"]; ?></td>
            <td><?php echo $rowlab2["precfee"]; ?></td>
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($rowlab2["date"])); ?></td>
            <td>&nbsp;<?php echo $rowlab2["time"]; ?></td>
          </tr>
          <?php
          }
		  ?>
		  
      </table>
	  
	  
<center>
  <a href="billgenerate.php?patid=<?php echo $_POST[patid]; ?>" target="_blank"><input type="button" value="Generate Bill" /></a>
</center><br />
      </div>  

<!-- ####################################################################################################### -->
</div>
<div id="footer" align="Center"> wema rehab system. Copyright All Rights Reserved</div>

</body>
</html>    