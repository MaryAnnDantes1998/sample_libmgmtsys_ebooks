<?php
include ("connection.php");
$connect=mysql_connect($servername,$username,$password);
$select_db=mysql_select_db($databasename);

$strquery = "SELECT * from records_table where id= '" . $_GET["id"] . "' ";
$results = mysql_query ($strquery);
$row = mysql_fetch_array($results);

?>
<body>

<form id="form1" name="form1" method="get" action="update.php">
<label>Name:
<input name="name" type="text" id="name" value="<?php echo $row["name"]; ?>" />
</label>
<p>
<label>Section:
<input name="section" type="text" id="section" value="<?php echo $row["section"]; ?>" />
</label>
<input name="id" type="hidden" id="section2"  value="<?php echo $row["id"]; ?>" />
</p>
<p>
<label></label>
</p>
<p>
<label>
<input type="submit" name="Submit" value="Update" />
</label>
</p>
</form>
