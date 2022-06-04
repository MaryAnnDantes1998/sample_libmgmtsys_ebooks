<?php 
ob_start();
 include 'header.php';
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
                <div class="col-md-6 col-md-offset-3">
                                <form method="GET" class="form-horizontal">
                                    <center><h3><strong>User's Information</strong></h3></center>
                                    <div class="form-group col-md-12">
                                        <input placeholder="Search for User FN / MN / LN, Type, Level, Section/Course" type="text" name="search" class="form-control">
                                    </div>
                                    <center><button name="submit" class="btn btn-lg btn-primary">Search</button></center>
                                </form>
                </div>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="col-xs-2">
                            <a href="add_user.php" style="background:none;">
                            <button class="btn btn-lg btn-primary"><i class="fa fa-plus"></i><strong> Add User<strong></button>
                            </a>
                        </li>
                    </ul>
            </div>
            <hr>
            <div class="box-body">
                            <div class="table-responsive">
                                <table s id="example1" class="table table-bordered" >
                                
                            <thead style="background: #ccc">
                                <tr>
                            <!---       <th>Image</th>  -->
                                    <th>School ID</th>
                                    <th>Member Full Name</th>
                                    <th>Type</th>
                                    <th>Level</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Section/Course</th>
                                    <th>Date Added</th>
                                    <?php if($_SESSION['role'] == "Administrator"){ 
                                       echo ' <th>Action</th>';
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
    <?php
        if (isset($_GET['submit'])) {

        $return_query= mysqli_query($con,
            "SELECT * from user 
            where firstname LIKE '%$_GET[search]%' 
            or middlename LIKE '%$_GET[search]%' 
            or lastname LIKE '%$_GET[search]%'
            or type LIKE '%$_GET[search]%'
            or level LIKE '%$_GET[search]%'
            or section LIKE '%$_GET[search]%' ") 
            or die (mysqli_error($con));
            while ($row= mysqli_fetch_array ($return_query) ){
            $id=$row['user_id'];
    ?>
                            <tr>
                                <td><?php echo $row['student_number']; ?></td> 
                                <td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td> 
                                <td><?php echo $row['type']; ?></td> 
                                <td><?php echo $row['level']; ?></td> 
                                <td><?php echo $row['contact']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['section']; ?></td>
                                <td><?php echo $row['user_added']; ?></td> 
                            <?php if($_SESSION['role'] == "Administrator"){ ?>   
                                <td>
                    <a class="btn btn-primary" for="ViewAdmin" href="edit_user.php<?php echo '?user_id='.$id; ?>">
                                    <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                        <i class="glyphicon glyphicon-trash icon-white"></i> Delete
                                    </a>
            
                                    <!-- delete modal user -->
                                    <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    Are you sure you want to delete <?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?>?
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                <a href="delete_user.php<?php echo '?user_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </td> 
                            <?php } ?>
                            </tr>
                            <?php } }?>
                            
                            </tbody>
                            </table>
                            </div>
                        </div>


            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>


<?php include 'script.php'; ?>