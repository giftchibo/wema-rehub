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
include("connect_db.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");
$dt= "$_POST[year]-$_POST[month]-$_POST[date]";

$resultpatientrec = mysql_query("SELECT * FROM patient where patid='$_GET[patid]'");
while($row = mysql_fetch_array($resultpatientrec)) 
  {
 $patid= $row["patid"];
 $patfname= $row["patfname"];
 $rofficer_id= $row["rofficer_id"];
 $regfee=$row["regfee"];
 $date = $row["date"];
 $time = $row["time"];
 }
   
  
  if(isset($_POST["submit"]))
{
	
$dt= date("Y-m-d");
$resrec= mysql_query("UPDATE patient SET regfee='$_POST[regfee]', date ='$dt',time='$_POST[time]' where patid='$_GET[patid]'  ");
} 
   
  
  
  
include("menu.php"); 
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="main">

  <section class="container">
  
     <div class="">
     <?php 

{
include("validation/header.php");
//retrieve country from database. Table: country
include("connect_db.php");

?>
      <form action="" method="post" enctype="multipart/form-data" class="formular" id="formID">
<font color="#FF0000"><b> <?php       if(isset($_POST["submit"]))
{
	echo "<h2>Updated regfee Successfully...</h2>";
		echo "<h2><a href='recordsofficer.php'>Click here to Continue...</a></h2>";
}
?></b></font>
 <div align="center"><strong><u>regpayment</u></strong></div>

            
             Patient ID:
             <label>
              <input  class="validate[required] text-input" readonly="readonly" type="text" name="ttypeid" id="ttypeid"  value="<?php echo $patid ; ?>" />
			</label>
<br />
patfname :
                        <label>
              <input  class="validate[required] text-input" readonly="readonly" type="text" name="ttypeid" id="ttypeid"  value="<?php echo $patfname ; ?>" />
			</label> 
<br />
             Employee ID:
             <label>
              <input  class="validate[required,custom[onlyNumberSp]] text-input" type="text" name="patid" id="patid" readonly="readonly"  value="<?php echo $_SESSION[rofficer_id]; ?>" />
            </label>
<br />
            
pres Fee:
<label>
  <input  class="validate[required,custom[onlyNumberSp]] text-input" type="text" name="regfee" id="regfee" />
</label>
<br />
            Date:
            <label for="select" class="validate[required]"></label><input  class="validate[required] text-input" type="text" readonly="readonly" name="treiddate" id="treiddate"  value="<?php echo date("d-m-Y"); ?>" /><br />
Time :
<input type="text" name="time" id="time" class="validate[required] text-input" readonly="readonly" value="<?php echo date("h:i:s A"); ?>"/><br />
<br />
      
      <input name="submit" type="submit" class="submit" id="submit" value="Update payment"/><hr/>

      </td>
    </tr>

     </table>
      
</form>
    
 <?php
}
 ?>
 
    <?php
	?>
    
  </div>
</div>
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>