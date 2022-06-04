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
                        <h3 class="col-md-5" style="font-weight: bold;"> Add Mode of Acquisition</h3>
                        <h3 class="col-md-7" style="font-weight: bold;"> Mode of Acquisition List</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="box">
                                    <div class="box-body">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label class="control-label" for="tbl_subjects">Mode of Acquisition <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="">
                                        <input type="text" name="moa" id="tbl_subjects" required="required" class="form-control" placeholder="--Input MOA--">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div>
                                        <!-- <a href="index.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a> -->
                                        <button style="float: right;" type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Add MOA</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                            <?php   
                            include ('../include/dbcon.php');
                            if (isset($_POST['submit'])) {
                                $subject = mysqli_real_escape_string($con,$_POST['moa']);
                            
                                    
                            //      $admin_type = $_POST['admin_type'];
                    
                    $result=mysqli_query($con,"select * from tbl_moa WHERE moa='$subject' ") or die (mySQL_error());
                    $row=mysqli_num_rows($result);
                    if ($row > 0)
                    {
                    echo "<script>alert('Mode of Acquisition already Exist!'); window.location='moa.php'</script>";
                    }
                    else
                    {       
                        mysqli_query($con,"insert into tbl_moa (moa)
                        values ('$subject')")or die(mysql_error());
                        echo "<script>alert('Mode of Acquisition successfully added!'); window.location='moa.php'</script>";
                    }
                            }       
                                ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="box">
                            <div class="box-body">
                        <!-- content starts here -->

                                <div class="table-responsive">
                            <table s id="example1" class="table table-striped table-bordered" >
                            <thead style="background: #ccc">
                                <tr>
                                    <th>MOA</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php include '../include/dbcon.php';
                                $query = mysqli_query($con, "SELECT * FROM tbl_moa");
                                while ($row= mysqli_fetch_array ($query)){
                                    $id=$row['moa_id'];
                                    ?><tr>
                                    <td><?php echo $row['moa']; ?></td>
                                    <td><a class="btn btn-danger" style="float:right" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                        <i class="glyphicon glyphicon-trash icon-white"></i> Delete
                                    </a>
                                    <a class="btn btn-primary" style="float:right" for="ViewAdmin" href="add_moa.php<?php echo '?moa_id='.$id; ?>">
                                    <i class="fa fa-edit"></i> Update</a>

                                    <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Delete MOA</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    Are you sure you want to delete <?php echo $row['moa'] ?>?
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                <a href="delete_moa.php<?php echo '?moa_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                   </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                            </table>
                        </div>
                                
                        <!-- content ends here -->
                            </div>
                        </div>
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