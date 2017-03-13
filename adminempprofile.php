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
include("functions/emp.php");
  
  if(isset($_POST["submit"]))
{
	$dname = $_POST[empfname] ." ". $_POST[empmname] ." ". $_POST[emplname];
 if(isset($_SESSION["adminid"]))
{
	$resrec= mysql_query("UPDATE employee SET 
empname='$dname', designation='$_POST[designation]',address='$_POST[address]',contactno ='$_POST[contactno]',emailid='$_POST[emailid]' WHERE empid = '$_POST[empids]' ");
	}
else
{
$resrec= mysql_query("UPDATE employee SET 
empname='$dname', designation='$_POST[designation]',address='$_POST[address]',contactno ='$_POST[contactno]',emailid='$_POST[emailid]' WHERE empid = '$_SESSION[empids]' ");
}
$updrec = "Record Updated Successfully..";
}

if(isset($_GET["empids"]))
{
$resultpatientrec = mysql_query("SELECT * FROM employee WHERE empid ='$_GET[empids]'");
}
else
{
$resultpatientrec = mysql_query("SELECT * FROM employee WHERE empid ='$_SESSION[empid]'");
}
while($row = mysql_fetch_array($resultpatientrec))
  {
	  
$wordChunks = explode(" ", $row[empname]);
for($i = 0; $i < count($wordChunks); $i++)
{
$name[$i] = $wordChunks[$i] ;
}

 //$doctorname2 =  array($doctorname1);
  $designation = $row["designation"];
 $address = $row["address"];
  $contactno = $row["contactno"];
  $emailid = $row["emailid"];
 $biodata = $row["biodata"];

  }

//CHECKS login button is submitted or not
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$loginvalidation =  loginfuntion($_POST["loginid"],$_POST["password"]);
}
include("menu.php"); 
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="main">

  <section class="container">
  
     <div class="">
     <?php 
 if(isset($_SESSION["adminid"]))
{
include("validation/header.php");
//retrieve country from database. Table: country
include("dbconnection.php");

?>
      <form id="formID" class="formular" method="post" action="">
 <div align="center"><strong><u> Edit Employee Profile Page</u></strong></div><br />
<font color="#FF0000"><b><?php echo  $updrec; ?></b></font>
<input name="empids" type="hidden" id="empids" value="<?php echo $_GET[empids]; ?>"/>
<p>
  <label for="textfield">First Name :</label>
   <label>
     <input name="empfname" type="text"class="validate[required,custom[onlyLetterSp]] text-input" id="req" value="<?php echo $name[0]; ?>"/> 
     
   </label>
 </p>
 <p>Middle Name
   <label>
     <input  class="validate[required,custom[onlyLetterSp]] text-input" type="text" name="empmname" id="req2"  value="<?php echo $name[1]; ?>" />
   </label>
   </p>
 <p>Last Name
  <label>
    <input  class="validate[required,custom[onlyLetterSp]] text-input" type="text" name="emplname" id="req1"  value="<?php echo $name[2]; ?>" />
  </label>
  <br />
  Designation 
<input type="text" name="designation" id="designation" class="validate[required] text-input" value="<?php echo $designation; ?>"/>
  <br />
  Address :
<input type="text" name="address" id="address" class="validate[required] text-input" value="<?php echo $address; ?>"/><br />
Contact No :<input type="text" name="contactno" id="contactno" class="validate[required,custom[phone],minSize[10],maxSize[12]] text-input" value="<?php echo $contactno; ?>" /><br />
Email ID :
<input type="text" name="emailid" id="emailid" class="validate[required,custom[email]] text-input" value="<?php echo $emailid; ?>"/><br />
   
          <input class="submit" type="submit" value="Update Profile" name="submit"/><hr/>

      
      
</form>
<a href="adminemp.php">< < Back</a>    
 <?php
}
 ?>
 </div>
 </div>
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>