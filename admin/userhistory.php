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
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
<!--    <div class="col-xs-3">
        <form method="POST" action="sort_returned_book.php">
        <input type="date" class="form-control" name="sort" value="<?php //echo date('Y-m-d'); ?>">
        <button type="submit" class="btn btn-primary btn-outline" style="margin:-34px -195px 0px 0px; float:right;" name="ok"><i class="fa fa-calendar-o"></i> Sort By Date Returned</button>
        </form>
    </div>
-->
                        <h2><i class="fa fa-book"></i> Returned Books Monitoring</h2>
                        
                        <div class="clearfix"></div>
        <!--- sort -->
                        
                    </div>
                       <!--         <div class="pull-right">
                                    <div class="span">
                                            <form method="POST" target="_blank" action="print_returned_book.php">
                                                <button name="print" class="btn btn-danger">
                                                    <i class="fa fa-print"></i>
                                                    Print
                                                </button>
                                            </form>
                                    </div>
                                </div>
                            -->
                    <div class="x_content">
                        <!-- content starts here -->
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">                          
                            <?php
                            $return_query= mysqli_query($con,"select * from return_book 
                            LEFT JOIN book ON return_book.book_id = book.book_id 
                            LEFT JOIN user ON return_book.user_id = user.user_id 
                            where user.user_id = $id_session order by return_book.return_book_id DESC") or die (mysql_error());
                                $return_count = mysqli_num_rows($return_query);
                                
                            $count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book where user_id = $id_session ")or die(mysql_error());
                            $count_penalty_row = mysqli_fetch_array($count_penalty);
                            
                            ?>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
                                
                                <div style="width: 25%; text-align: center;">
                                    <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div>
                                
                            <thead style="background: #ccc">
                                <tr>
                                    <th>Accession No./Barcode</th>
                                    <th>Borrower Name</th>
                                    <th>Title</th>
                                <!---   <th>Author</th>
                                    <th>ISBN</th>   -->
                                    <th>Date Borrowed</th>
                                    <th>Due Date</th>
                                    <th>Date Returned</th>
                                    <th>Penalty</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                            while ($return_row= mysqli_fetch_array ($return_query) ){
                            $id=$return_row['return_book_id'];
?>
                            <tr>
                                <td><?php echo $return_row['accession_no']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $return_row['firstname']." ".$return_row['lastname']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $return_row['title']; ?></td>
                            <!---   <td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
                                <td><?php // echo $return_row['isbn']; ?></td>  -->
                                <td><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
                                <?php
                                 if ($return_row['book_penalty'] != 'No Penalty'){
                                     echo "<td class='' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
                                 }else {
                                     echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
                                 }
                                
                                ?>
                                <?php
                                 if ($return_row['book_penalty'] != 'No Penalty'){
                                     echo "<td class='' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
                                 }else {
                                     echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
                                 }
                                
                                ?>
                                <?php
                                 if ($return_row['book_penalty'] != 'No Penalty'){
                                     echo "<td class='alert alert-warning' style='width:100px;'>Php ".$return_row['book_penalty'].".00</td>";
                                 }else {
                                     echo "<td>".$return_row['book_penalty']."</td>";
                                 }
                                
                                ?>
                            </tr>
                            
                            <?php 
                            }
                            if ($return_count <= 0){
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