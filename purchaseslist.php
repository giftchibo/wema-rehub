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
$sname=$_POST['transaction_id'];
$cat=$_POST['invoice_number'];
$des=$_POST['date'];
$sup=$_POST['supplier'];
$qua=$_POST['remarks'];
$sql=mysql_query("INSERT INTO purchases(transaction_id,invoice_number,date,supplier,remarks)
VALUES('$sname','$cat','$des','$sup','$qua',NOW())");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/purchaseslist.php");
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
			<li><a href="manager.php">Dashboard</a></li>
			<li><a href="view.php">Viewemployee</a></li>
			<li><a href="stock.php">Manage Stock</a></li>
			<li><a href="view.php">Viewpatientrecords</a></li>
			<li><a href="view.php">Viewpatientreports</a></li>
			<li><a href="view.php">managestock</a></li>
			<li><a href="view_prescription.php">ViewPrescription</a></li>
			<li><a href="supplier.php">supplier</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage purcheses</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View purcheses</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add purcheses</a></li>  
             
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
		
        $result = mysql_query("SELECT * FROM purchases") 
                or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='3'>";
         echo "<tr><th>TransactionID</th><th>InvoiceNo</th><th>Date</th><th>Supplier</th><th>remark</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['transaction_id'] . '</td>';               
                echo '<td>' . $row['invoice_number'] . '</td>';
				echo '<td>' . $row['date'] . '</td>';
				echo '<td>' . $row['suplier'] . '</td>';
				echo '<td>' . $row['remarks'] . '</td>';?>
				<td><a href="purcheses.php?transaction_id=<?php echo $row['transaction_id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
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
			<form name="myform" onsubmit="return validateForm(this);" action="purchaseslist.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="transaction_id" type="text" style="width:170px" placeholder="transaction_id" required="required" id="drug_name" /></td></tr>
				<tr><td align="center"><input name="invoice_number" type="text" style="width:170px" placeholder="invoice_number" required="required" id="category"/></td></tr>
				<tr><td align="center"><input name="date" type="text" style="width:170px" placeholder="date" required="required" id="description" /></td></tr>
				<tr><td align="center"><input name="supplier" type="text" style="width:170px" placeholder="supplier"  required="required" id="company" /></td></tr>  
				<tr><td align="center"><input name="remarks" type="text" style="width:170px" placeholder="remarks" required="required" id="supplier" /></td></tr>  
				 
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
