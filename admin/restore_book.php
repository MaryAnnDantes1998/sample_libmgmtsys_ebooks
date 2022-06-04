<?php 

include('../include/dbcon.php');
ob_start();
include 'header.php';
$get_id=$_GET['archive_id'];?>


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
                        <h2><i class="fa fa-pencil"></i> Archive Book</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
<?php
  $query=mysqli_query($con,"select * from archive where archive_id='$get_id'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>                       
                        <div class="box">
                            <div class="box-body">
                        <center><h3><strong>You are about to send this lists into "ACTIVE STATUS" </h3></center><br>
                        
                                <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to mark this as ACTIVE?');" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <input type="hidden" name="book_id" id="last-name2" value="<?php echo $row['book_id']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="call_no">Call Number
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="call_no" value="<?php echo htmlspecialchars($row['call_no']); ?>" id="call_no" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="title">Title
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" id="title" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                 <?php
                                  $query1=mysqli_query($con,"SELECT * FROM archive
                                  LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                                  where archive_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="subject_id">Subjects
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="subject" value="<?php echo htmlspecialchars($row['subject']); ?>" id="subject" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                   <?php
                                  $query1=mysqli_query($con,"SELECT * FROM archive
                                  LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                                  where archive_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="author_id">Author
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author" value="<?php echo htmlspecialchars($row['author']); ?>" id="author" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM archive
                                  LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                                  where archive_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="editor">Editor
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="editor" id="editor" value="<?php echo htmlspecialchars($row['editor']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="edition">Edition
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="edition" id="edition" value="<?php echo htmlspecialchars($row['edition']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label class="control-label col-md-4" for="pop_id">PlaceOfPublication
                                    </label>
                                    <div class="col-md-4">
                                        <select name="pop_id" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['pop_id']); ?>"><?php echo htmlspecialchars($row['placeofpublication']); ?></option>
                                        </select>
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM archive
                                  LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                                  where archive_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="publisher_id">Publisher
                                    </label>
                                    <div class="col-md-4">
                                        <select name="publisher_id" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?></option>
                                        </select>
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM archive
                                  LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                                  where archive_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    
                                    <div class="col-md-4">
                                        <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" step="1" min="0" max="1000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="date_of_publ">Date 0f publ
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="date_of_publ" id="date_of_publ" value="<?php echo htmlspecialchars($row['date_of_publ']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="series">Series
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="series" id="series" value="<?php echo htmlspecialchars($row['series']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="isbn_no">ISBN NO
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="isbn_no" id="isbn_no" value="<?php echo htmlspecialchars($row['isbn_no']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="accession_no">Accession
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="accession_no" id="accession_no" value="<?php echo htmlspecialchars($row['accession_no']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="moa_id">Moa
                                    </label>
                                    <div class="col-md-4">
                                        <select name="moa_id" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['moa_id']); ?>"><?php echo htmlspecialchars($row['moa']); ?></option>
                                        </select>
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM archive
                                  LEFT JOIN tbl_placeofpublications ON archive.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON archive.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON archive.moa_id = tbl_moa.moa_id 
                                  where archive_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="issn_no">ISSN NO
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="issn_no" id="issn_no" value="<?php echo htmlspecialchars($row['issn_no']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="notation1">Notation1
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="notation1" id="notation1" value="<?php echo htmlspecialchars($row['notation1']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="notation2">Notation2
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="notation2" id="notation2" value="<?php echo htmlspecialchars($row['notation2']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="abstract">Abstract
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="abstract" id="abstract" value="<?php echo htmlspecialchars($row['abstract']); ?>"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="page_no">Page No.
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="page_no" value="<?php echo htmlspecialchars($row['page_no']); ?>" id="title" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript: history.go(-1)"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Restore</button>
                                    </div>
                                </div>
                            </form>
                            

                                      
                            
<?php

if (isset($_POST['update'])) {
                               
$call_no=$_POST['call_no'];
$title=$_POST['title'];
$subject=$_POST['subject'];
$author=$_POST['author'];
$editor=$_POST['editor'];
$edition=$_POST['edition'];
$place_of_publ=$_POST['pop_id'];
$publisher=$_POST['publisher_id'];
$quantity=$_POST['quantity'];
$date_of_publ=$_POST['date_of_publ'];
$series=$_POST['series'];
$isbn_no=$_POST['isbn_no'];
$accession_no=$_POST['accession_no'];
$moa=$_POST['moa_id'];
$issn_no=$_POST['issn_no'];
$notation1=$_POST['notation1'];
$notation2=$_POST['notation2'];
$abstract=$_POST['abstract'];
$remark= 'Available';
$page_no= $_POST['page_no'];



{

mysqli_query($con,"delete from archive where archive_id = '$get_id' ")or die(mysql_error());
mysqli_query($con," INSERT INTO book (call_no,title,subject,author,editor,edition,pop_id,publisher_id,quantity,date_of_publ,series,isbn_no,accession_no,moa_id,issn_no,notation1,notation2,abstract,remarks,page_no) VALUES ('$call_no','$title','$subject','$author','$editor','$edition','$place_of_publ','$publisher','$quantity','$date_of_publ','$series','$isbn_no','$accession_no','$moa','$issn_no','$notation1','$notation2','$abstract','$remark', '$page_no') ") or die(mysqli_error($con));
echo "<script>alert('Restore Successful!');history.go(-2);</script>";  
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


<?php include 'script.php'; ?>
?>