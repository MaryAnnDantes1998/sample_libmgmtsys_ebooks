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
                                    <center><h3><strong>Search Inactive Special Collection</strong></h3></center>
                                    <div class="form-group col-md-12">
                                        <input placeholder="Search for Title, Code #, Student Name..." type="text" name="search" class="form-control">
                                    </div>
                                    <center><button name="submit" class="btn btn-lg btn-primary">Search</button></center>
                                </form>
                </div>
            </div>
            <hr>
            <div class="box-body">
                            <div class="table-responsive">
                                <table s id="example1" class="table table-bordered" >
                                
                            <thead style="background: #ccc">
                                <tr>
                                    <th>Code #/Bcode</th>
                                    <th>Name of Student/s</th>
                                    <th>Course</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Remarks</th>
                                    <th>Date Archived</th>
                                    <?php if($_SESSION['role'] == "Administrator"){ 
                                       echo ' <th>Action</th>';
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
    <?php
        if (isset($_GET['submit'])) {


        $return_query= mysqli_query($con,"SELECT * from arc_special_collection 
        LEFT JOIN categories ON categories.category_id = arc_special_collection.category_id
        LEFT JOIN courses ON courses.course_id = arc_special_collection.course_id
        where accession_no LIKE '%$_GET[search]%' or title LIKE '%$_GET[search]%' or nameofstudent LIKE '%$_GET[search]%' or course_name LIKE '%$_GET[search]%' ") or die (mysqli_error($con));
        while ($row= mysqli_fetch_array ($return_query) ){
        $id=$row['thesis_id'];
    ?>
                            <tr>
                                  <!--- either this <td><a target="_blank" href="view_book_barcode.php?code=<?php // echo $row['book_barcode']; ?>"><?php // echo $row['book_barcode']; ?></a></td> -->
                                <td><?php echo $row['accession_no'];?></td>
                               
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['nameofstudent']; ?></td>
                                <td><?php echo $row['course_name']; ?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['title']; ?></td>
                                <td><?php echo $row['categories']; ?></td>
                                <td><?php echo $row['deyt']; ?></td>
                                <td><?php echo $row['remarks']; ?></td>
                                <td><?php echo $row['oras']; ?></td>
                            <?php if($_SESSION['role'] == "Administrator"){ ?>   
                                <td>
                                    <a class="btn btn-success" for="ViewAdmin" href="restore_thesis.php<?php echo '?thesis_id='.$id; ?>">
                                    <i class="fa fa-send"></i> Restore
                                    </a>
                                   <a class="btn btn-danger" for="DeleteBook" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                        <i class="glyphicon glyphicon-trash icon-white"></i> Delete
                                    </a>
                               
            
                                    <!-- delete modal book -->
                                    <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Delete Special Collection</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    Are you sure you want to delete <?php echo $row['title']; ?>?
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                <a href="del_arc_thesis.php<?php echo '?thesis_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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