<?php

error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
$con=mysql_connect('localhost','root','password')or die("cannot connect to server");
mysql_select_db('chiboproject')or die("cannot connect to database");

?>