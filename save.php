<?php
include ("connection.php");
$connect=mysql_connect($servername,$username,$password);
$select_db=mysql_select_db($databasename);

$strquery="INSERT INTO records_table SET firstname= '" . $_GET['firstname'] . "',middlename= '" . $_GET['middlename'] . "', section= '". $_GET['section'] ."' ";
$results=mysql_query ($strquery);
header( 'Location: MAIN.php' ) ;
?>
