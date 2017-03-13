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
$dt= "$_POST[year]-$_POST[month]-$_POST[date]";
if(isset($_POST[Add]))
{
$dt= date("Y-m-d h:i:s");
$sql="INSERT INTO expenses(expensetype,quantity,expamt,date,comment) VALUES
 ( '$_POST[exptype]', '$_POST[qty]','$_POST[expamt]','$dt','$_POST[comment]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
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



     <p>
       <?php 

include("validation/header.php");
//retrieve country from database. Table: country
include("dbconnection.php");

?>

<a href="expens.php"> < < Back </a>
     </p>
     <p>
       
</p>
     
     <form id="formID" class="formular" method="post" action="">
        <div align="center"><strong><u>Add Expenses</u></strong></r><p><font color="#FF0000"><b><?php
	  if(isset($_POST[Add]))
{
	echo "Record inserted Successfully...";
}
	?></b></font></p></div><br />

 <p>
   <label for="textfield">Expense Type :</label>
   <label>
     <input name="exptype" type="text" class="validate[required] text-input" id="exptype" "/>
   </label>
 </p>
 <p>   Quantity:
   <label>
     <input  type="text" name="qty" id="qty" class="validate[required,custom[onlyNumberSp]] text-input"/>
   </label>
   <br />
   Expense Amount:
   <input  class="validate[required,custom[onlyNumberSp]] text-input" text-input" type="text" name="expamt" id="expamt" />
   <br />
   Date :
   
   <input type="text" name="date" id="date" class="validate[required] text-input" value="<?php echo date("d-m-Y h:i:s"); ?>" disabled/><br />
   Comment :
   <input type="text" name="comment" id="comment" class="validate[required] text-input"/><br />
   
   <input class="submit" type="submit" value="Add" name="Add"/>
 </p>
 <hr/>

      
      
</form>
      
  </div>

</div>
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>
