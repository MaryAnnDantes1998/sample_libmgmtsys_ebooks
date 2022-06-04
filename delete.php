<?php
include ("connection.php");
$connect=mysql_connect($servername,$username,$password);
$select_db=mysql_select_db($databasename);

$strquery=" DELETE from records_table where id = '" . $_GET['id'] . "' ";
$results=mysql_query ($strquery);
echo 'Delete Successfull!!';
header ('location: MAIN.php ');
?>
