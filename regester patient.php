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
include("connect_db.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

if(isset($_POST["button"]))
{
//select max value from patient db

	$result = mysql_query("SELECT MAX(patid) FROM patient");
while($row = mysql_fetch_array($result))
  {
$maxpatid = $row[0];
$maxpatid++;
  }
  
  
// Insert records to patient table
$sql="INSERT INTO patient(patid,patfname,patlname,emailid,contactno, password,dob,address,addiction_type )
VALUES
('$maxpatid','$_POST[pfn]', '$_POST[pln]', '$_POST[email]','$_POST[contact]','$_POST[password]','$_POST[db]','$_POST[addres]','$_POST[add]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}

?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); ?>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div id="main">

  <section class="container">
  
     <div class="">

      <h1></h1>
      <p>&nbsp;</p>
 
      <?php
	  if(isset($_POST["button"]))
{
?>
 <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>Patient Registered Successfully</th>
          </tr>
        </thead>
        <tbody>
          <tr class="light">
            <td><b>Patient ID is : <?php echo $maxpatid; ?></b></td>
          </tr>
                </tbody>
      </table>
      <form method="post" action="regfee.php?patid=<?php echo $maxpatid; ?>" id="formID1" class="formular" >
        <input name="btnlogin" type="submit" id="submit" value="registration fee"  class="submit"/>

      <p>
&nbsp;<br />&nbsp;
<a href="recordsofficer.php"> << Back</a>
      </p>
      </form>
<?php
}
else
{
?>
<form id="formID" class="formular" method="post">
  <div align="center"><strong><b> Registration Page</b></strong></div>
  <label for="textfield">  First Name</label>
     <input type="text" name="pfn" id="textfield" class="validate[required,custom[onlyLetterSp]] text-input" />
     <label for="textfield">Last Name</label>
        <input type="text" name="pln" id="textfield2" class="validate[required,custom[onlyLetterSp]] text-input" />
      <label for="textfield4"> patient cashierlogin Password<font color="#009933" size="2"></font></label>
        <input type="password" name="password" id="password"  class="validate[[required],minSize[6]] text-input"/>
      
	   Confirm Password
      <input type="password" name="textfield" id="textfield" class="validate[required,equals[password],,minSize[6]] text-input" />
    
    
      date of birth  
	 
	  <input type="text" name="db" id="textfield" class="text-input" />
	  
	  
	  Email ID
      <input type="text" name="email" id="textfield" class=" " />
   

      Contact No
         <input type="text" name="contact" id="textfield" class="validate[required,custom[phone],maxSize[12],minSize[10]] text-input" />
	 
	 
	   address
	  <input type="text" name="addres" id="textfield" class="validate[required,custom[onlyLetterSp]] text-input" />
	  
	   
	   patientcatergories
	 <input type="text" name="add" id="textfield" class="validate[required,custom[onlyLetterSp]] text-input" />
          
    <div align="center">
        <input type="submit" name="button" id="button" value="Register"   class="submit"/>
        &nbsp;&nbsp;&nbsp;&nbsp;
       <input type="reset" name="button2" id="button2" value="Reset"  class="submit"/>
	   
</div>
 <p>
&nbsp;<br />&nbsp;
      </p>
</form>
<form method="post" action="makeappoint.php" id="formID1" class="formular" >
      <a href="recordsofficer.php"> << Back</a>
       <input name="btnlogin" type="submit" id="submit" value="Click here to Login"  class="submit"/>
      
      </form>
     <?php
}
?> 
</div>
   </div>   
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>




