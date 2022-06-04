<?php 
ob_start();
 include 'header.php';
if($_SESSION['role'] == "Student")
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
          <div class="row tile_count" style="margin-right:-245px;">
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                            $result = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(quantity) as total FROM `book`")) or die(mysql_error());
                            ?>
                                    <div class="huge"><?php echo $result['total']; ?></div>
                                    <div>Total<br> Books</div>
                                </div>
                            </div>
                        </div>
                        <a href="userbook.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


<div class="col-md-6 col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                            $result = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(quantity) as total FROM `ebooks`")) or die(mysql_error());
                            ?>
                                    <div class="huge"><?php echo $result['total']; ?></div>
                                    <div>Total<br> E-Books</div>
                                </div>
                            </div>
                        </div>
                        <a href="user_ebooks.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>



                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                            $result = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(quantity) as total FROM `special_collection`")) or die(mysql_error());
                            ?>
                                    <div class="huge"><?php echo $result['total']; ?></div>
                                    <div>Total<br>SpColl</div>
                                </div>
                            </div>
                        </div>
                        <a href="thesis.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                    <div class="col-md-6 col-lg-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                            $count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'borrowed' AND user_id = '$id_session'")) or die(mysql_error());
                            ?>
                                    <div class="huge"><?php echo $count1['total']; ?></div>
                                    <div>Total<br>Borrowed Books</div>
                                </div>
                            </div>
                        </div>
                        <a href="userborrow.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                            $result = mysqli_query($con,"SELECT * FROM archive");
                            $num_rows = mysqli_num_rows($result);
                            ?>
                                    <div class="huge"><?php echo $num_rows; ?></div>
                                    <div>Total<br>Archived Books</div>
                                </div>
                            </div>
                        </div>
                        <a href="archives.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                </div>
                <?php include('slide.php'); ?>
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