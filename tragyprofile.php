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
<?php 
include("menu.php"); 
$tst="";

if($_POST["testst"] == "Finished")
{
 $tst="Finished";
}
else
{
	$tst="Pending";
}

if($tst == "Finished")
{
$resapp = mysql_query("SELECT * FROM patient where date <> '0000-00-00'");
}
else
{
	$resapp = mysql_query("SELECT * FROM patient where date = '0000-00-00'");
}
?>
<div id="main">

  <section class="container">
  
     <div class="">




    <a href="trg.php"> < < Back </a>
      <h1>triagy examination</h1>
  <h6>
    <form method="post" action="">
      <select name="testst">
          <option value="Pending" <?php
		if($tst == "Pending")
		{
		echo "selected";
		}
		?>>Pending</option>
          <option value="Finished"    <?php
		if($tst == "Finished")
		{
		echo "selected";
		}
		?>>Finished</option>
        </select><input name="" type="submit" value="Submit" />
      </form>
       <?php
		if($tst == "Pending")
		{
		?>
 </h6>
       <p> &nbsp; Test Status: <?php echo $tst;?></p>
  <table width="533" border="1">
         <tr>
           <th width="86" scope="col">empid</th>
           <th width="86" scope="col">Patient</th>
           <th width="107" scope="col">patientcartegqey</th>
           <th width="69" scope="col">Examin  patient</th>
         </tr>
         <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
      
         <tr>
           <td height="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION[empid]; ?></td>
           <td><?php echo $row1["patid"]; 
			 $respac = mysql_query("SELECT * FROM patient where patid='$row1[patid]'");
			          while($row26 = mysql_fetch_array($respac))
  						{
	 					 echo " : ". $row26["patfname"];
	   					} 
	  			?></td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php
			 $respacdoc = mysql_query("SELECT * FROM patient where addiction_type ='$row1[addiction_type]'");
			          while($row26a = mysql_fetch_array($respacdoc))
  						{
	 					 echo  $row26a["addiction_type"];
	   					} 
	  			?></td>
           <td>&nbsp;<strong><a href="tragyexamin.php?patid=<?php echo $row1[patid]; ?>">Click Here</a></strong></td>
         </tr>
         <?php
          }
		  ?>
        </table>
		<?php
}
else
{
?>
       </h6>
       <p> &nbsp; Test Status: <?php echo $_POST["testst"];?></p>
 <table width="533" border="1">
<tr>
           <th width="86" scope="col">empid</th>
           <th width="86" scope="col">Patient</th>
           <th width="107" scope="col">patientcartegqey</th>
           <th width="37" scope="col">Date            </th>
            <th width="34" scope="col"> Time</th>
            
        </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
          <tr>
            
            <td height="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION[empid]; ?></td>
            <td><?php echo $row1["patid"]; 
			 $respac = mysql_query("SELECT * FROM patient where patid='$row1[patid]'");
			          while($row26 = mysql_fetch_array($respac))
  						{
	 					 echo " : ". $row26["patfname"];
	   					} 
	  			?></td>
           
  			<td><?php
			$respacdoc = mysql_query("SELECT * FROM patient where addiction_type ='$row1[addiction_type]'");
			          while($row26a = mysql_fetch_array($respacdoc))
  						{
	 					 echo  $row26a["addiction_type"];
	   					} 
			
	  			?></td>
          
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($row1[date])); ?></td>
            <td>&nbsp;<?php echo $row1["time"]; ?></td>
            
          </tr>
          <?php
          }
		  ?>
  </table>
<?php
}
?>
     
     
 

	   </div>
<!-- ####################################################################################################### -->
</div>
<div id="footer" align="Center"> wema rehab system. Copyright All Rights Reserved</div>
</div>
</body>
</html>