<?php 
ob_start();
 include 'header.php';
if($_SESSION['role'] == "Administrator")
{
?>

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
                        <h3><i class="fa fa-plus"></i> Add Subject</h3>
                        <ul class="nav navbar-right panel_toolbox">
                         <!-- If needed --> 
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li> -->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                        <!-- content starts here -->
                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label class="control-label" for="tbl_subjects">Subject <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="">
                                        <input type="text" name="subject" id="tbl_subjects" required="required" class="form-control" placeholder="--Input Subject--">
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
                                $subject = $_POST['tbl_subjects'];
                            
                                    
                            //      $admin_type = $_POST['admin_type'];
                    
                    $result=mysqli_query($con,"select * from tbl_subjects WHERE subject_name='$subject' ") or die (mySQL_error());
                    $row=mysqli_num_rows($result);
                    if ($row > 0)
                    {
                    echo "<script>alert('subject already Exist!'); window.location='subject.php'</script>";
                    }
                    else
                    {       
                        mysqli_query($con,"insert into tbl_subjects (subject_name)
                        values ('$subject')")or die(mysql_error());
                        echo "<script>alert('subject successfully added!'); window.location='subject.php'</script>";
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