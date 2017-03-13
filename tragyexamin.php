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

$resresc1 = mysql_query("SELECT MAX(triagyid) FROM patienttriagy");
while($rown = mysql_fetch_array($resresc1))
  	{
$countrec = $rown[0];
if($rown[0] ==0)
{
	$countrec = 1;
	}
 	}

if(isset($_POST["button"]))
{
//CHECKS login button is submitted or not`treid` ,
$dt=date("Y-m-d");
$sql="INSERT INTO  patienttriagy (triagyid,patid,empid,age,weight,temp,Bp,respiratory,pulserate,date,time,consutationfee,vitalsigncommets)
VALUES
('$maxtriagyid','$_POST[patid]','$_SESSION[empid]','$_POST[age]','$_POST[weight]','$_POST[temp]','$_POST[Bp]','$_POST[respiratory]','$_POST[pulserate]' ,'$dt','$_POST[time]','$_POST[consutationfee]','$_POST[vitalsigncommets]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


	
	

}
?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); 

?>

<!-- Patient Login Form####################################################################################################### -->
<div id="main">

  <section class="container">
  
     <div class="">

      
<form id="formID" class="formular" method="post" action="">
<font color="#FF0000"><b> <?php if(isset($_POST["button"]))
{
	echo "<h2>Updated Treatment Successfully...</h2>";
		echo "<h2><a href='appointment.php'>Click here to Continue...</a></h2>";
}
?></b></font><br>
<div align=""><strong><b><h1>TRIAGYPATIENTEXAMIN</h1> </b></strong></div></br>
    
    
    <strong>Tragyexamin ID 
<input name="testid" type="text" class="validate[required] text-input" id="textfield" value="<?php echo $countrec; ?>" readonly="readonly"/>
  </p>
  
    </strong>
    <p><strong>Patient ID 
    <input name="patid" type="text" class="validate[required]" id="textfield2" value="<?php echo $_GET["patid"]; ?>" readonly="readonly" />
                          
		<p><strong>Emp ID 
    <input name="empid" type="text" class="validate[required]" id="empid" value="<?php echo $_SESSION[empid] ; ?>" readonly="readonly" />				  
							
							Age:
             <label>
               <input  class="validate[required,custom[onlyNumberSp]] text-input"  type="text" name="age"  />
             </label>
				              weight:
             <label>
               <input    type="text" name=" weight"  />
             </label>
				              tempeture:
             <label>
               <input   type="text" name="temp"  />
             </label>
				              Bp:
             <label>
               <input   type="text" name="Bp"  />
             </label>
			 Respiratory:
             <label>
               <input    type="text" name="respiratory"  />
             </label>
	</strong></p>
	<p><strong>pulserate
      <input type="text" name="pulserate" />
  </strong></p>
  <p><strong>  Date  
    <input name="date" type="text" id="date" value="<?php echo date("d-M-Y"); ?>" readonly="readonly"/>
  </strong></p>
  <p><strong> Time 
    <input type="text" name="time" id="time"  readonly="readonly"value="<?php echo date("h:i:s"); ?>"/>
  </strong></p>

  <p><strong>consutationfee
      <input type="text" name="consutationfee"  />
  </strong></p>
  <p><strong>vitalsComment</strong>
     
      <textarea name="vitalsigncommets" cols="45" rows="5" ></textarea><br />
  </p>
  <p>
  
  
    <input type="submit" name="button" id="button" value="Update Triagy Report">
    <input type="reset" name="button2" id="button2" value="Reset">
</p>
</form>



    
</div>

</div>
</body>
</html>
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>