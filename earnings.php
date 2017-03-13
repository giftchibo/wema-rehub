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
	
	 $stdate =$_POST['name3'] ."-". $_POST['name2']."-01";
	 $enddate = $_POST['name3'] ."-". $_POST['name2']."-31";
if(isset($_POST[demo2]))
{
	$datad1 = date("Y-m-d", strtotime($_POST[demo2]));
		$datad2 = date("Y-m-d", strtotime($_POST[demo1]));
}
else
{
	$datad1 = date("y-m-d");
		$datad2 = date("Y-m-d");
}
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="main">

  <section class="container">
  
     <div class="">


<a href="manager.php"> < < Back </a>
      <h1><font color="#FF0000">Doctors Earnings</font></h1>
      <p><script src="datetimepicker_css.js"></script></p>
      <table width="586" border="0">
      <form method="post" action="">
        <tr>
          <td width="196">From :
            <script src="datetimepicker_css.js"></script>
          <input type="Text" id="demo2" maxlength="25" readonly="readonly" size="25" name="demo2"/></td>
          <td width="38"><img src="images2/cal.gif" alt="" width="19" height="21" style="cursor:pointer"  onclick="javascript:NewCssCal ('demo2','ddMMyyyy','','','','','')" /></td>
          <td width="197">To :
          <input type="text" id="demo1" readonly="readonly" maxlength="25" size="25" name="demo1"/></td>
          <td width="62"><img src="images2/cal.gif" width="21" height="22" style="cursor:pointer"  onclick="javascript:NewCssCal ('demo1','ddMMyyyy','','','','','')" /></td>
          <td width="63"><input type="submit" name="button" id="button" value="Submit" /></td>
        </tr>
        <tr>
          <td height="27">&nbsp;From : <?php  echo date("d-M-Y", strtotime($datad1)); ?></td>
          <td>&nbsp;</td>
          <td>To : &nbsp;<?php  echo date("d-M-Y", strtotime($datad2)); ?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </form>
      </table>
      <p>&nbsp;</p>
      <table width="534" border="1">
      <tr>
            <th width="116" height="58" scope="col">Appointment ID</th>
            <th width="73" scope="col">Patient ID</th>
            <th width="113" scope="col">Date</th>
            <th width="113" scope="col">Treatment</th>
            <th width="85" scope="col"><p>Fee</p></th>
        </tr>
          <?php
		  //echo $_POST["startdate"];


		  $resapp = mysql_query("SELECT * FROM treatment where docid='$_SESSION[docid]' AND date BETWEEN '$datad1' AND '$datad2'");
          while($row1 = mysql_fetch_array($resapp))
  {
	  ?>
          <tr>
            <td>&nbsp;<?php echo $row1[appointid]; ?></td>
            <td><?php 

			$respatrec = mysql_query("SELECT * FROM appointment where appointid='$row1[appointid]'");
			while($row12 = mysql_fetch_array($respatrec))
 			 {
			echo $row12["patid"]; 
			 }

			?></td>
            <td><?php echo date("d-m-Y", strtotime($row1["date"])); ?></td>
            <td><?php echo $row1["treatment"]; ?></td>
            <td>&nbsp;<?php echo $row1["treatfee"]; ?></td>
          </tr>
          <?php
          }
		  ?>
</table>
        <p><strong>Earnings:
<?php
        $restot = mysql_query("SELECT SUM(treatfee)FROM treatment where docid='$_SESSION[docid]' AND date BETWEEN '$datad1' AND '$datad2'");
			while($rowtot = mysql_fetch_array($restot))
 			 {
			echo $rowtot[0]; 
			 }
			$dt11 = $datad1 ." 00:00:00";
$dt22 = $datad2." 23:59:59";
		?></strong><br />
          &nbsp;
      </p>
      <h1><font color="#FF0000">Expenses and Salary</font></h1>
      <form method="post" action="" name="abcd">
        <table width="524" border="1">
          <tr>
            <td width="245"><?php
			//include this to check future date
			$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y"));
 			$tdate= date("31/m/Y", $tomorrow);
			//future date ends here
			?>
              <input type="hidden" name="todate" id="todate" value="<?php echo $tdate; ?>" />
              <script src="datetimepicker_css.js"></script>
              <strong>Month  :
                <select name="name2" id="name2"  onchange="CheckDate()">
                  <option value="01" 
            <?php
			if($_POST['name2'] == 01)
			{
				echo "selected";
			}
			?>
            >Jan</option>
                  <option value="02"  <?php
			if($_POST['name2'] == 02)
			{
				echo "selected";
			}
			?>>Feb</option>
                  <option value="03"  <?php
			if($_POST['name2'] == 03)
			{
				echo "selected";
			}
			?>>Mar</option>
                  <option value="04"  <?php
			if($_POST['name2'] == 04)
			{
				echo "selected";
			}
			?>>Apr</option>
                  <option value="05"  <?php
			if($_POST['name2'] == 05)
			{
				echo "selected";
			}
			?>>May</option>
                  <option value="06"  <?php
			if($_POST['name2'] == 06)
			{
				echo "selected";
			}
			?>>Jun</option>
                  <option value="07"  <?php
			if($_POST['name2'] == 07)
			{
				echo "selected";
			}
			?>>Jul</option>
                  <option value="08"  <?php
			if($_POST['name2'] == 08)
			{
				echo "selected";
			}
			?>>Aug</option>
                  <option value="09"  <?php
			if($_POST['name2'] == 09)
			{
				echo "selected";
			}
			?>>Sep</option>
                  <option value="10"  <?php
			if($_POST['name2'] == 10)
			{
				echo "selected";
			}
			?>>Oct</option>
                  <option value="11"  <?php
			if($_POST['name2'] == 11)
			{
				echo "selected";
			}
			?>>Nov</option>
                  <option value="12"  <?php
			if($_POST['name2'] == 12)
			{
				echo "selected";
			}
			?>>Dec</option>
                </select>
                Year :
                <select name="name3" id="name3" onchange="CheckDate()">
                  <?php
        for($jdt=2010; $jdt<2015; $jdt++)
		{
           echo  "<option value='$jdt' ";
		   if($jdt == 2012)
		   {
			   echo "selected";
			}
			echo ">$jdt</option>";
		}    
 ?>
                </select>
              </strong></td>
            <td width="102"><input type="submit" name="button2" id="button2" value="Search" disabled="disabled" /></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>

      <table width="415" border="1">
          <tr>
            <th height="39" scope="col" align="left">Total Expenses</th>
            <th width="125" scope="col"> 
		<?php

        $restot = mysql_query("SELECT SUM(expamt) FROM expenses WHERE date BETWEEN '$stdate' AND '$enddate'");
		$exptot =0;
			while($rowtot = mysql_fetch_array($restot))
 			 {
			$exptot = $rowtot[0]; 
			 }
			 echo $exptot;
		?></th>
        </tr>
    
          <tr>
            <td height="37"><strong>&nbsp;Total Salary Paid to Employee</strong></td>
            <td align="center"><?php
        $restot11a = mysql_query("SELECT SUM(salaryamt)FROM salary  where date BETWEEN '$stdate 00:00:00' AND '$enddate 00:00:00'");
			while($rowtots = mysql_fetch_array($restot11a))
 			 {
			echo $expsal =$rowtots[0]; 
			 }
		?></td>
        </tr>
        <?php
		$datea = date("31-m-Y");
		if( $datea == date("d-m-Y"))
		{
		?>
          <tr>
            <td height="37"><strong>Paid By each doctor</strong></td>
            <td align="center">&nbsp;
            <?php
        $restot11b = mysql_query("SELECT * FROM doctor");
			$numdoc = mysql_num_rows($restot11b);
			
			$totalamt = $exptot + $expsal;
			
		$totamt= $totalamt/$numdoc;
		echo number_format($totamt, 2, '.', '');
		?>
        </td>
          </tr>
     <?php
		}
		?>
      </table>
      <p>&nbsp;</p>
<!-- Patient Login Form Ends Here####################################################################################################### -->
 
<h2>&nbsp;</h2>
  </div>
</div>
<div id="footer" align="Center"> wema rehub system. Copyright All Rights Reserved</div>
</div>
</body>
</html>
<Script Language=Javascript>
	 function CheckDate()
  {
var str1  = document.getElementById("name2");
var str2  = document.getElementById("todate");
var str3  = document.getElementById("name3");
var string1 = str1.value;
var string2 = str2.value;
var string3 = str3.value;

var fdate = 31;
var fmonth = string1;
var fyear = string3; 

var arrtodate = string2.split("/");
var tdate = 31;
var tmonth= arrtodate[1];
var tyear = arrtodate[2];

var date1 = new Date(fyear, fmonth, fdate); 
var date2 = new Date(tyear, tmonth, tdate);
var dayNames = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");


var dmonth = fmonth-1;

var date3 = new Date(fyear, dmonth, fdate); 
var dayname  = dayNames[date3.getDay()];

 if(date1 > date2)
 {
  alert("you cant search record from this date..");
		document.getElementById("button2").disabled = true;
 return false;
 }
 else
 {
	 	document.getElementById("button2").disabled = false;
 }

 }
    </Script>