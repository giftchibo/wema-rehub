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
$resapp = mysql_query("SELECT * FROM  prescription  where date <> '0000-00-00'");
}
else
{
	$resapp = mysql_query("SELECT * FROM  prescription where date = '0000-00-00'");
}
?>
<div id="main1">

  <section class="container1">
  
     <div class="container1">




    <a href="trg.php"> < < Back </a>
      <h1>pharmacy</h1>
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
  <table width="650" border="1">
         <tr>
           
		   <th width="107" scope="col">Prec Id</th>
           <th width="107" scope="col">PatientId</th>
		   <th width="107" scope="col">empid</th>
           <th width="107" scope="col">Medicine</th>
		   <th width="107" scope="col">Medicine</th>
           <th width="107" scope="col">Day</th>
		   <th width="107" scope="col">dosage</th>
		   <th width="107" scope="col">treid</th>
		    <th width="200" scope="col">Update payment</th
         </tr>
         <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
      
         <tr>
		 <td height="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row1[presid]; ?></td>
            
		 
          
            
			<td><?php echo $row1["patid"]; 
			 
	  			?></td>
				
           <td><?php
			
	 					 echo $_SESSION[empid];
	   					 
			
	  			?></td>
  			<td><?php
			
	 					 echo  $row1["medicine"];
	   					                                                                                                                                                                                          
			
	  			?></td>
				
          <td><?php
			
	 					 echo  $row1["treid"];
	   					
			
	  			?></td>
           <td>&nbsp;<strong><a href="updatelabtst1.php?presid=<?php echo $row1[presid]; ?> patid=<?php echo $row1[patid]; ?>">Click Here</a></strong></td>
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
		   <th width="86" scope="col">presid</th>
           <th width="86" scope="col">patid</th>
		   <th width="86" scope="col">empid</th>
		   <th width="107" scope="col">medicine</th>
		   <th width="107" scope="col">medicine</th>
           <th width="107" scope="col">Day</th>
            <th width="107" scope="col"> Dosage</th>
			<th width="107" scope="col"> treid</th>
            <th width="107" scope="col"> date</th>
			<th width="107" scope="col"> time</th>
        </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
          <tr>
            

            <td><?php
			
	 					 echo  $row1["presid"];
	   					
			
	  			?></td>
			
			<td><?php echo $row1["patid"]; 
			 
	  			?></td>
              <td height="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION[empid]; ?></td>
  			<td><?php
			
	 					 echo  $row1["medicine"];
	   					
			
	  			?></td>
				
          <td><?php
			
	 					 echo  $row1["treid"];
	   					
			
	  			?></td>
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($row1[date])); ?></td>
            <td>&nbsp;<?php echo $row1["time"]; ?></td>
            
          </tr>
          <?php
          }
		  ?>
		   <?php
          }
		  ?>
  </table>
   
     
 

	   </div>
<!-- ####################################################################################################### -->
</div>
<div id="footer1" align="Center"> wema rehab system. Copyright All Rights Reserved</div>
</div>
</body>
</html>