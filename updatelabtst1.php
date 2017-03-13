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

 $resultpatientrec = mysql_query("SELECT * FROM  prescription where presid='$_GET[presid]'");

while($row = mysql_fetch_array($resultpatientrec)) 
 
  {
 $presid = $row["presid"];
 $patid = $row["patid"];
 $medicine= $row["medicine"];
$empid = $row["empid"];
 $treid = $row["treid"];
 $precfee= $row["precfee"];
 $date = $row["date"];
 $time = $row["time"];
 }
 if(isset($_POST["submit"]))
{
	
$dt= date("Y-m-d");
$resrec= mysql_query("UPDATE prescription SET patid='$_GET[patid]', precfee ='$_POST[precfee]', date ='$dt',time='$_POST[time]' where presid='$_GET[presid]'");
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
	echo "<h2>Updated preciption Successfully...</h2>";
		echo "<h2><a href='pharmacist.php'>Click here to Continue...</a></h2>";
}
?></b></font>
 <div align="center"><strong><u>pharmacy </u></strong></div>
<label for="textfield">presID:</label>
      <label>
	<input name="presid" type="text" class="validate[required,custom[onlyNumberSp]] text-input" readonly="readonly" id="" value="<?php echo $presid; ?>"/>
	    </label>
            <br />
            medicine :
            <label>
              <input  class="validate[required] text-input" readonly="readonly" type="text" name="" id=""  value="<?php echo  $medicine ; ?>" />
			</label>
<br />
             Patient ID:
             <label>
              <input  class="validate[required,custom[onlyNumberSp]] text-input" readonly="readonly" type="text" name="" id=""  value="<?php echo $patid; ?>" />
			</label>
<br />
             Employee ID:
             <label>
              <input  class="validate[required,custom[onlyNumberSp]] text-input" type="text" name="" id="" readonly="readonly"  value="<?php echo $_SESSION[empid]; ?>" />
            </label>
<br />
             Treatment ID:
             <label>&quot;
               <input  class="validate[required,custom[onlyNumberSp]] text-input" readonly="readonly" type="text" name="" id=""  value="<?php echo $treid; ?>" />
             </label>
        <br />
prec Fee:
<label>
  <input   type="text" name="prec fee"  />
</label>
<br />
            Date:
            <label for="select" ></label><input  " type="text" readonly="readonly" name="Date"   value="<?php echo date("d-m-Y"); ?>" /><br />
Time :
<input type="text" name="Time" value="<?php echo date("h:i:s A"); ?>"/><br />
<br />
      Comment :   
      <textarea name="comment" id="comment" cols="45" rows="5" ><?php echo $date; ?></textarea><br />
      <input name="submit" type="submit" class="submit" id="submit" value="Update precription"/><hr/>

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