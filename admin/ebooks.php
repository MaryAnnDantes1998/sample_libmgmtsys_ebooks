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
                            <!-- <a href="book_print.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books List</button>
                            </a> -->
                            <!-- <a href="print_barcode1.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books Barcode</button>
                            </a> -->
                            
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h3 class="col-xs-10" style="font-weight: bold"><i class="fa fa-plus"></i> Add E-Books</h3>
                            </div>
                        </div>
                        

                        <!-- <ul class="nav navbar-right panel_toolbox">
                            <li class="col-xs-2">
                            <a href="add_book.php" style="background:none;">
                            <button class="btn btn-primary"><i class="fa fa-plus"></i> Add Book</button>
                            </a>
                            </li>
                        </ul> -->
                        <div class="clearfix"></div>
                            
                        <div class="clearfix"></div>
                        <!-- <form method="POST" action="book_search.php" class="form-inline">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="text" style="color:black;" name="date" class="form-control has-feedback-left" placeholder="Sort by Author/Subject/Title/Date of Plublication" required />
                                            <span class="form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i> Sort</button>
                            </form> -->
                    </div>
            
                        <br>
                    <div class="x_content">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
           
                        <div class="box">
                            <div class="box-body">
                                <form method="post" autocomplete="on" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            <input type="hidden" name="new_barcode" value="<?php echo $new_barcode; ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Call No.<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="call_no" id="call_no" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" id="first-name2" required="required" class="form-control col-md-7 col-xs-12" autocomplete="on">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Author <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="author" id="author" required="required" class="form-control col-md-7 col-xs-12" autocomplete="on">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Editor
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="editor" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Edition
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="edition" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Place Of Publ. 
                                    </label>
                                    <div class="col-md-8">
                                        <select name="place_of_publ"  class="select2_single form-control" tabindex="-1">
                                            <option selected disabled>-- Select Place Of Publ. --</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_placeofpublications") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['pop_id'];
                                        ?>
                                            <option value="<?php echo $row['pop_id']; ?>"><?php echo $row['placeofpublication']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Publisher
                                    </label>
                                    <div class="col-md-8">
                                        <select name="publisher" class="select2_single form-control" tabindex="-1">
                                            <option selected disabled>-- Select Publisher --</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_publishers") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['publisher_id'];
                                        ?>
                                            <option value="<?php echo $row['publisher_id']; ?>"><?php echo $row['publisher']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    </label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="quantity" step="1" min="0" max="1000" value="1"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Date Of Publ
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="date_of_publ" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Series
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="series" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISBN
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="isbn_no" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Acc No. <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="accession_no" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISSN
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="issn_no" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Notation1
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="notation1" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Notation2
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="notation2" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Abstract
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="abstract" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">No. of Pages
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="page_no" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">MOA</label>
                                    <div class="col-md-8">
                                        <select name="moa" class="select2_single form-control" tabindex="-1" required="required"><option selected disabled>-- Select MOA --</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_moa") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['moa_id'];
                                        ?>
                                            <option value="<?php echo $row['moa_id']; ?>"><?php echo $row['moa']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Subject <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="subject" id="subject" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Add E-Books</button>
                                    </div>
                                </div>
                            </form>

                            <?php

            include ('../include/dbcon.php');
            if (isset($_POST['submit'])) {
                # code...
            // if (!isset($_FILES['image']['tmp_name'])) {
            // echo "";
            // }else{
            // $file=$_FILES['image']['tmp_name'];
            // $image = $_FILES["image"] ["name"];
            // $image_name= addslashes($_FILES['image']['name']);
            // $size = $_FILES["image"] ["size"];
            // $error = $_FILES["image"] ["error"];
            // {
            //          if($size > 10000000) //conditions for the file
            //          {
            //          die("Format is not allowed or file size is too big!");
            //          }
                        
            //      else
            //          {

            //      move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);          
            //      $book_image=$_FILES["image"]["name"];
                    $call_no=mysqli_real_escape_string($con,$_POST['call_no']);
                    $title=mysqli_real_escape_string($con,$_POST['title']);
                    $subject=mysqli_real_escape_string($con,$_POST['subject']);
                    $author=mysqli_real_escape_string($con,$_POST['author']);
                    $editor=mysqli_real_escape_string($con,$_POST['editor']);
                    $edition=mysqli_real_escape_string($con,$_POST['edition']);
                    $place_of_publ=mysqli_real_escape_string($con,$_POST['place_of_publ']);
                    $publisher=mysqli_real_escape_string($con,$_POST['publisher']);
                    $quantity=mysqli_real_escape_string($con,$_POST['quantity']);
                    $date_of_publ=mysqli_real_escape_string($con,$_POST['date_of_publ']);
                    $series=mysqli_real_escape_string($con,$_POST['series']);
                    $isbn_no=mysqli_real_escape_string($con,$_POST['isbn_no']);
                    $accession_no=mysqli_real_escape_string($con,$_POST['accession_no']);
                    $moa=mysqli_real_escape_string($con,$_POST['moa']);
                    $issn_no=mysqli_real_escape_string($con,$_POST['issn_no']);
                    $notation1=mysqli_real_escape_string($con,$_POST['notation1']);
                    $notation2=mysqli_real_escape_string($con,$_POST['notation2']);
                    $abstract=mysqli_real_escape_string($con,$_POST['abstract']);
                    $page_no=mysqli_real_escape_string($con,$_POST['page_no']);
                    
                    
                    $pre = "SFAC";
                    $mid = mysqli_real_escape_string($con,$_POST['new_barcode']);
                    $suf = "LMS";
                    $gen = $pre.$mid.$suf;
                    
                    if ($quantity == 0 ) {
                        $remark = 'Not Available';
                    }else{
                        $remark = 'Available';
                    }
                    $chk = mysqli_query($con,"SELECT * FROM ebooks WHERE accession_no = '".$accession_no."' ");
                    $ct = mysqli_num_rows($chk);
 
                    if($ct == 0){
                    
                    mysqli_query($con,"INSERT INTO ebooks (call_no,title,subject,author,editor,edition,pop_id,publisher_id,quantity,date_of_publ,series,isbn_no,accession_no,moa_id,issn_no,notation1,notation2,abstract,remarks,page_no)
                    VALUES('$call_no','$title','$subject','$author','$editor','$edition','$place_of_publ','$publisher','$quantity','$date_of_publ','$series','$isbn_no','$accession_no','$moa','$issn_no','$notation1','$notation2','$abstract','$remark','$page_no')")OR die(mysqli_error($con));
                    echo "<script>alert('Successfully Added!'); window.location='ebooks.php'</script>";
                    
                    mysqli_query($con,"INSERT INTO barcode (pre_barcode,mid_barcode,suf_barcode) VALUES ('$pre', '$mid', '$suf') ") OR die (mysqli_errOR());
                    }
                    else{
                echo "<script>alert('Accession No. already exist!');</script>";
                    }
                }

                    
            ?>

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