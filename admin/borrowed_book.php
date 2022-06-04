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
        <!-- <div class="col-xs-3">
            <form method="POST" action="sort_borrowed_book.php">
            <input type="date" class="form-control" name="sort" value="<?php echo date('Y-m-d'); ?>">
            <button type="submit" class="btn btn-primary btn-outline" style="margin:-34px -195px 0px 0px; float:right;" name="ok"><i class="fa fa-calendar-o"></i> Sort By Date Borrowed</button>
            </form>
        </div> -->  
                    <div class="col-xs-6"><h3><span class="fa fa-book"></span> Borrowed Books</h3></div>
                    
                    <?php 
                    $count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book`")) or die(mysql_error());
                    $count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'borrowed'")) or die(mysql_error());
                    $count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'returned'")) or die(mysql_error());
                    ?>
                    <div class="col-xs-6">
                        <span style="float:right; ">
                        <!---   <a href="borrowed_book.php"><button class="btn btn-primary"><i class="fa fa-info"></i> All Records (<?php /// echo $count['total']; ?>)</button></a> -->
                            <a href="borrowed_book.php"><button class="btn btn-success"><i class="fa fa-info"></i> Borrowed Books (<?php echo $count1['total']; ?>)</button></a>
                            <a href="returned_book.php"><button class="btn btn-danger"><i class="fa fa-info"></i> Returned Books (<?php echo $count2['total']; ?>)</button></a>
                        </span>
                    </div>
                        
                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
                                
                            <thead style="background: #ccc">
                                <tr>
                                    <th>Accession NO./Barcode</th>
                                    <th>Borrower Name</th>
                                    <th>Title</th>
                                    <th>Date Borrowed</th>
                                    <th>Due Date</th>
                                    <th>Date Returned</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                                $borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
                                    LEFT JOIN book ON borrow_book.book_id = book.book_id 
                                    LEFT JOIN user ON borrow_book.user_id = user.user_id 
                                    WHERE borrowed_status = 'borrowed'
                                    ORDER BY borrow_book.borrow_book_id DESC") or die(mysql_error());
                                $borrow_count = mysqli_num_rows($borrow_query);
                                while($borrow_row = mysqli_fetch_array($borrow_query)){
                                    $id = $borrow_row ['borrow_book_id'];
                                    $book_id = $borrow_row ['book_id'];
                                    $user_id = $borrow_row ['user_id'];
                            ?>
                            <tr>
                                <td><?php echo $borrow_row['accession_no']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['firstname']." ".$borrow_row['lastname']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['title']; ?></td>
                                <td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
                                <td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>
                                <td><?php  if($borrow_row['date_returned'] == "0000-00-00 00:00:00"){
                                    echo "Pending";} else{ echo date("M d, Y h:m:s a",strtotime($borrow_row['date_returned']));} ?></td>
                                <?php
                                    if ($borrow_row['borrowed_status'] != 'returned') {
                                        echo "<td class='alert alert-danger'>".$borrow_row['borrowed_status']."</td>";
                                    } else {
                                        echo "<td  class='alert alert-danger'>".$borrow_row['borrowed_status']."</td>";
                                    }
                                ?>
                            </tr>
                            <?php } 
                            if ($borrow_count <= 0){
                                echo '
                                    <table style="float:right;">
                                        <tr>
                                            <td style="padding:10px;" class="alert alert-danger">No Books returned at this moment</td>
                                        </tr>
                                    </table>
                                ';
                            }                           
                            ?>
                            </tbody>
                            </table>
                        </div>
                            </div>
                        </div>
                        <!-- content starts here -->

                        
                        
                        <!-- content ends here -->
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