<?php

            include ('../include/dbcon.php');
                        $query = mysqli_query($con,"SELECT * FROM `barcode` ORDER BY mid_barcode DESC ") or die (mysql_error());
                        $fetch = mysqli_fetch_array($query);
                        $mid_barcode = $fetch['mid_barcode'];
                        
                        $new_barcode =  $mid_barcode + 1;
                        $pre_barcode = "SFAC";
                        $suf_barcode = "LMS";
                        $generate_barcode = $pre_barcode.$new_barcode.$suf_barcode;
?>
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
                        <h3><i class="fa fa-plus"></i> Add Book</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            <input type="hidden" name="new_barcode" value="<?php echo $new_barcode; ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Call No.<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="call_no" id="call_no" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="title" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Author <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author" id="author" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Editor
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="editor" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Edition
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="edition" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Place Of Publ 
                                    </label>
                                    <div class="col-md-4">
                                        <select name="place_of_publ"  class="select2_single form-control" tabindex="-1">
                                            <option selected disabled>-- Select Place Of Publ --</option>
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
                                    <div class="col-md-4">
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
                                    <label class="control-label col-md-4" for="last-name">Quantity <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-1">
                                        <input type="number" name="quantity" step="1" min="0" max="1000" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Date Of Publ
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="date_of_publ" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Series <span class="required" style="color:red;"></span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="series" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISBN
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="isbn_no" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Accession
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="accession_no" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISSN
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="issn_no" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Notation1
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="notation1" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Notation2
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="notation2" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Abstract
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="abstract" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">MOA</label>
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <input type="text" name="subject" id="subject" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="book.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
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
                    $call_no=$_POST['call_no'];
                    $title=$_POST['title'];
                    $subject=$_POST['subject'];
                    $author=$_POST['author'];
                    $editor=$_POST['editor'];
                    $edition=$_POST['edition'];
                    $place_of_publ=$_POST['place_of_publ'];
                    $publisher=$_POST['publisher'];
                    $quantity=$_POST['quantity'];
                    $date_of_publ=$_POST['date_of_publ'];
                    $series=$_POST['series'];
                    $isbn_no=$_POST['isbn_no'];
                    $accession_no=$_POST['accession_no'];
                    $moa=$_POST['moa'];
                    $issn_no=$_POST['issn_no'];
                    $notation1=$_POST['notation1'];
                    $notation2=$_POST['notation2'];
                    $abstract=$_POST['abstract'];
                    
                    
                    $pre = "SFAC";
                    $mid = $_POST['new_barcode'];
                    $suf = "LMS";
                    $gen = $pre.$mid.$suf;
                    
                    if ($quantity == 0 ) {
                        $remark = 'Not Available';
                    }else{
                        $remark = 'Available';
                    }
                    $chk = mysqli_query($con,"SELECT * from book where accession_no = '".$accession_no."' ");
                    $ct = mysqli_num_rows($chk);

                    if($ct == 0){
                    
                    mysqli_query($con,"insert into book (call_no,title,subject,author,editor,edition,pop_id,publisher_id,quantity,date_of_publ,series,isbn_no,accession_no,moa_id,issn_no,notation1,notation2,abstract,remarks)
                    values('$call_no','$title','$subject','$author','$editor','$edition','$place_of_publ','$publisher','$quantity','$date_of_publ','$series','$isbn_no','$accession_no','$moa','$issn_no','$notation1','$notation2','$abstract','$remark')")or die(mysqli_error($con));
                    echo "<script>alert('Successfully Added!'); window.location='book.php'</script>";
                    

                    }
                    else{
                echo "<script>alert('Accession No. already exist!');</script>";
                    }
                }

                    
            ?>
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