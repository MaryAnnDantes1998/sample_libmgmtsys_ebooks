<?php
include ("connection.php");
$connect=mysql_connect($servername,$username,$password);
$select_db=mysql_select_db($databasename);

$strquery="UPDATE records_table SET name= '" . $_GET['name'] . "', section= '". $_GET['section'] ."' WHERE id='". $_GET['id'] ."' ";
$results=mysql_query ($strquery);

header("location: Main.php")

?>
