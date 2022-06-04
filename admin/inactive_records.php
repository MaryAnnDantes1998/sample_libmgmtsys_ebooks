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
                    <div class="col-xs-6"><h3><span class="fa fa-book"></span> Utilization Inactive Records</h3></div>
                    
                        
                        <div class="clearfix"></div>

                        <form method="POST" action="utilization_search.php" class="form-inline">
                            <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                        <select name="remarks" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Transferred">Transferred</option>
                                            <option value="Donated">Donated</option>
                                            <option value="Weeded">Weeded</option>
                                            <option value="Archived">Archived</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4" required />
                                            <span class="form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4" required />
                                            <span class="form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-calendar-o"></i> Search</button>
                                
                        </form>
                        <br>
                    </div>
                    
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
                                
                            <thead style="background: #ccc">
                                <tr>
                                    <th>Accession NO./Barcode</th>
                                    <th>Call Number</th>
                                    <th><center>Title of Book / Author / Date</center></th>
                                    <th>Remarks</th>
                                    <th>Date Archived</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                                $borrow_query = mysqli_query($con,"SELECT * FROM archive
                                    ORDER BY deyt DESC") or die(mysql_error());
                                $borrow_count = mysqli_num_rows($borrow_query);
                                while($borrow_row = mysqli_fetch_array($borrow_query)){
                                    $id = $borrow_row ['archive_id'];
                            ?>
                            <tr>
                                <td><?php echo $borrow_row['accession_no']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['call_no']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['title'].' / '.$borrow_row['author'].' / '.$borrow_row['date_of_publ']; ?></td>
                                <td><?php echo $borrow_row['remarks']; ?></td>
                                <td><?php echo $borrow_row['deyt']; ?></td>
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