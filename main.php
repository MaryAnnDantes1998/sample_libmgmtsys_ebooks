<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actual PHP</title>
</head>

<body>
<form id="add" name="add" method="get" action="SAVE.php">
<label>NAME:
<input name="firstname" type="text" id="firstname" />
</label>
<p>
<label>MIDDLE NAME:
<input name="middlename" type="text" id="middlename" />
</label>
</p>
<label>SECTION:
<input name="section" type="text" id="section" />
</label>
</p>

<p>
<label>
<input type="submit" name="Submit" value="SAVE" />
</label>
</p>
</form>

<table width="1029" border="1">
<tr>

<td width="161">Name</td>
<td width="170">Section</td>
<td width="188"> ID </td>
<td width="172"> Middle Name </td>
</tr>

<?php
include ("connection.php");
$connect=mysql_connect($servername,$username,$password);
$select_db=mysql_select_db($databasename);

$strquery="SELECT * from records_table";
$results=mysql_query($strquery);
$num=mysql_numrows($results);

$i=0;
while ($i< $num)

{

$f1=mysql_result($results,$i,"firstname");
$f2=mysql_result($results,$i,"section");
$f3=mysql_result($results,$i,"id");
$f4=mysql_result($results,$i,"middlename");

?>

<tr>
<td><?php echo $f1 ; ?></td>
<td><?php echo $f2 ; ?></td>
<td><?php echo $f3 ; ?></td>
<td><?php echo $f4 ; ?></td>
<td width="304"><?php echo " <a href='edit.php?do=edit&id=" . $f3 . "'> edit </a> "; ?> | <?php echo " <a href='delete.php?id=" . $f3 . "'> delete </a> "; ?></td>
</tr>

<?php

  $i++;
  }
  ?>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
<form id="form1" name="form1" method="get" action="search.php">
<label>Search:
<input name="search" type="text" id="search" />
</label>
<p>
<label>
<input name="do" type="submit" id="do" value="Search" />
</label>
</p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>

</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
</body>
</html>
