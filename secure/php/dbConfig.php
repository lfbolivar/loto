<?php
//  This establishes the database variables and initiates the db connection
$host     = "localhost";			// Host name 
$username = "root";	// Mysql username 
$passpass = "maruja00";	// Mysql password 
$db_name  = "bolitec_loto";	// Database name 
$tbl_name = "MassCashWinners";				// member Table name
$tbl_name2 = "MyMassCashPicks";				// user Table name
$tbl_name3 = "tbd";				// user Table name

// Connects to the Database in dbConfig.php
$link = mysqli_connect($host, $username, $passpass,$db_name) or die('MySQL DB '.$db_name.' Connection error: '.mysql_error().' '); 
mysqli_select_db($link, $db_name) or die('DB '.$db_name.' mysql_select_db error: '.mysql_error().' '); 
?>