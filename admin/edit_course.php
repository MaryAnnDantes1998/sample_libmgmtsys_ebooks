<?php 
ob_start();
 include 'header.php';
if($_SESSION['role'] == "Administrator")
{
?>

<?php $ID=$_GET['course_id']; ?>


	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          
                  <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3><i class="fa fa-edit"></i> Update Course</h3>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="col-xs-2">
                            <a href="course.php" style="background:none;">
                            <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                            </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
<?php
  $query=mysqli_query($con,"select * from courses where course_id='$ID'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>  
                        <div class="box">
                            <div class="box-body">
                        <!-- content starts here -->
                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label class="control-label" for="tbl_subjects">Course Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="">
                                    <?php echo '
                                        <input type="text" name="moa" id="tbl_subjects" required="required" class="form-control" value="'.htmlspecialchars($row['course_name']).'">';
                                        ?>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div>
                                        <!-- <a href="index.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a> -->
                                        <button style="float: right;" type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Save</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                            
                            
                            <?php   
                            include ('../include/dbcon.php');
                            if (isset($_POST['submit'])) {
                                $subject = mysqli_real_escape_string($con,$_POST['moa']);
                            
                                    
                            //      $admin_type = $_POST['admin_type'];
                    
                    $result=mysqli_query($con,"select * from courses WHERE course_name='$subject' ") or die (mySQL_error());
                    $row=mysqli_num_rows($result);
                    if ($row > 0)
                    {
                    echo "<script>alert('Course already Exist!'); window.location='course.php'</script>";
                    }
                    else
                    {       
                        mysqli_query($con,"UPDATE courses SET course_name = '$subject' where course_id = $ID")or die(mysql_error());
                        echo "<script>alert('Course successfully updated!'); window.location='course.php'</script>";
                    }
                            }       
                                ?>
                        
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
              </div>
          </div>
        </section>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

<?php }else{
    header("Location: 404.php");
} ?>
<?php include 'script.php'; ?>