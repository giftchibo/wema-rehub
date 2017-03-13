<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
                       $id = $row['suplier_id'];
					$suplier_name  = $row['suplier_name'];
					$suplier_address  = $row['suplier_address'];
					$suplier_contact  = $row['suplier_contact'];
					$contact_person  = $row['contact_person'];
					$tel  = $row['tel'];
$sql=mysql_query("INSERT INTO supliers
VALUES('$id','$suplier_name','$suplier_address','$suplier_contact','$contact_person','$tel',NOW())");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/supplier.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> wema rehub system</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a> wema rehub System</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="supplier.php">Dashboard</a></li>
			<li><a href="view.php">Viewemployee</a></li>
			<li><a href="earnings.php">earningexpenreport</a></li>
			<li><a href="ptreatment.php">ptreatmentrecords</a></li>
			<li><a href="plab.php">plabrecords</a></li>
			<li><a href="prcpt.php">precriptionrecords</a></li>
			<li><a href="pharmar.php">parmacyrecords</a></li>
			<li><a href="view.php"> viewmanagestock</a></li>
			<li><a href="billa.php">viewbillingperfomed</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage supplier</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View supplier</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add supplier</a></li>  
             
        </ul>  
          
        <div id="content_1" class="content">  
		 <?php echo $message;
			  echo $message1;
			  ?>
      
		<?php
		/* 
		View
        Displays all data from  table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM supliers") 
                or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='3'>";
         echo "<tr><th>S/No</th><th>sName</th><th>SAddress </th><th>Contact_person</th><th>SContact</th><th>ContPerson No</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td>' . $row['suplier_id'] . '</td>';
                 echo '<td>' . $row['suplier_name'] . '</td>';               
                echo '<td>' . $row['suplier_address'] . '</td>';
				echo '<td>' . $row['suplier_contact'] . '</td>';
				echo '<td>' . $row['contact_person'] . '</td>';
				echo '<td>' . $row['tel'] . '</td>';?>
				<td><a href="supplier.php?suplier_id=<?php echo $row['id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
				</tr>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
         <!--Add Drug-->
		 <?php echo $message;
			  echo $message1;
			  ?>
			<form name="myform" onsubmit="return validateForm(this);" action="supplier.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="supplier_id" type="text" style="width:170px" placeholder="supplier_id" required="required" id="supplier_id" /></td></tr>
				<tr><td align="center"><input name="suplier_name" type="text" style="width:170px" placeholder="suplier_name" required="required" id="suplier_name"/></td></tr>
				<tr><td align="center"><input name="supplier_address" type="text" style="width:170px" placeholder="supplier_address" required="required" id="supplier_address" /></td></tr>
				<tr><td align="center"><input name="supplier_contact" type="text" style="width:170px" placeholder="supplier_contact"  required="required" id="supplier_contact" /></td></tr> 
				<tr><td align="center"><input name="contact_person" type="text" style="width:170px" placeholder="contact_person"  required="required" id="contact_person" /></td>
				<tr><td align="center"><input name="tel" type="text" style="width:170px" placeholder="tel" required="required" id="tel" /></td></tr>  
				 
				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>
        </div>  
              
    </div>  
  
</div>
 
</div>
<div id="footer" align="Center"> Wema rehub sytem . Copyright All Rights Reserved</div>
</div>
</body>
</html>
