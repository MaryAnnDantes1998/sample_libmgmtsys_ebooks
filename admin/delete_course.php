<?php 

include('../include/dbcon.php');

$get_id=$_GET['course_id'];

mysqli_query($con,"delete from courses where course_id = '$get_id' ")or die(mysqli_error($con));

header('location:course.php');
?>