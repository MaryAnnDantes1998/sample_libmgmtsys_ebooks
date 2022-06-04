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
                        <h2 class="col-xs-10"><i class="fa fa-book"></i>Books Monitoring</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="col-xs-2">
                            <a href="book_print.php" target="_blank" style="background:none;">
                            <button name="print" type="submit" class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
                            </a>
                            </li>
                        </ul>
                        
                        <div class="clearfix"></div>
                        
                        <form method="POST" class="form-inline">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="text" style="color:black;" name="date" class="form-control has-feedback-left" placeholder="Sort by Author/Subject/Title/Date of Publication" required />
                                            <span class="form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-calendar-o"></i> Sort</button>
                            </form>
                        <div class="clearfix"></div>
                        
                    </div>
                    <br>
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
<?php
$_SESSION['date'] = $_POST['date'];
?>
                            <?php
                            if (isset($_POST['search'])) {
                                $date = $_POST['date'];
                            $return_query= mysqli_query($con,"SELECT * from book 
                            LEFT JOIN tbl_moa ON tbl_moa.moa_id = book.moa_id
        LEFT JOIN tbl_publishers ON tbl_publishers.publisher_id = book.publisher_id
        LEFT JOIN tbl_placeofpublications ON tbl_placeofpublications.pop_id = book.pop_id
                            where date_of_publ = '".$date."' OR author = '".$date."' OR subject = '".$date."' OR title = '".$date."' ") or die (mysqli_error($con));
                            $return_count = mysqli_num_rows($return_query);
                            }
        
                                
                            ?>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
                                
                        <span style="float:left;">
                    <?php 
                    // $count = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM `report` where report.date_transaction BETWEEN '$datefrom 00:00:01' and '$dateto 23:59:59' and report.detail_action like '%$status%'")) or die(mysql_error());
                    // $count1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Borrowed Book'")) or die(mysql_error());
                    // $count2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Returned Book'")) or die(mysql_error());
                    ?>
                            
                    <!---       <a href="borrowed_report.php"><button class="btn btn-success btn-outline"><i class="fa fa-info"></i> Borrowed Reports (<?php // echo  $count1['total']; ?>)</button></a>
                            <a href="returned_report.php"><button class="btn btn-danger btn-outline"><i class="fa fa-info"></i> Returned Reports (<?php // echo $count2['total']; ?>)</button></a>
                    -->
                        </span>
                                
                            <thead>
                                <tr>
                                    <th>Accession No./Barcode</th>
                                    <th>Title</th>
                                    <th>Subject/s</th>
                                    <th>Author</th>
                                    <th>Editor</th>
                                    <th>Edition</th>
                                    <th>Place of Publ</th>
                                    <th>Publisher</th>
                                    <th>Date_of_Publ</th>
                                    <th>Series</th>
                                    <th>ISBN_No</th>
                                    <th>Status</th>
                                    <th>ISSN_No</th>
                                    <th>Notation1</th>
                                    <th>Notation2</th>
                                    <th>Abstract</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                            while ($return_row= mysqli_fetch_array ($return_query) ){
?>
                            <tr>
                                <td><?php echo $return_row['accession_no']; ?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $return_row['title']; ?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $return_row['subject']; ?></td>
                                <td><?php echo $return_row['author']; ?></td>
                                <td><?php echo $return_row['editor']; ?></td>
                                <td><?php echo $return_row['edition']; ?></td>
                                <td><?php echo $return_row['placeofpublication']; ?></td> 
                                <td><?php echo $return_row['publisher']; ?></td> 
                                <td><?php echo $return_row['date_of_publ']; ?></td> 
                                <td><?php echo $return_row['series']; ?></td>
                                <td><?php echo $return_row['isbn_no']; ?></td>
                                <td><?php echo $return_row['moa']; ?></td>
                                <td><?php echo $return_row['issn_no']; ?></td>
                                <td><?php echo $return_row['notation1']; ?></td>
                                <td><?php echo $return_row['notation2']; ?></td>
                                <td><?php echo $return_row['abstract']; ?></td>
                                <td><?php echo $return_row['remarks']; ?></td>
                            </tr>
                            <?php } ?>
                            
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