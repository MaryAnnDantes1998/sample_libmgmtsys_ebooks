<?php ob_start();
 include 'header.php'; ?>
<?php $ID=$_GET['book_id']; ?>

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
                        <h3><i class="fa fa-pencil"></i> Edit E-Books</h3>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                                
                            
                        <!-- content starts here -->
<?php
  $query1=mysqli_query($con,"SELECT * FROM ebooks
    LEFT JOIN tbl_placeofpublications ON ebooks.pop_id = tbl_placeofpublications.pop_id
    LEFT JOIN tbl_publishers ON ebooks.publisher_id = tbl_publishers.publisher_id
    LEFT JOIN tbl_moa ON ebooks.moa_id = tbl_moa.moa_id
    where book_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_assoc($query1);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
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
                                  $query1=mysqli_query($con,"SELECT * FROM ebooks
                                  LEFT JOIN tbl_placeofpublications ON ebooks.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON ebooks.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON ebooks.moa_id = tbl_moa.moa_id 
                                  where book_id='$ID'")or die(mysql_error());
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
                                  $query1=mysqli_query($con,"SELECT * FROM ebooks
                                  LEFT JOIN tbl_placeofpublications ON ebooks.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON ebooks.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON ebooks.moa_id = tbl_moa.moa_id 
                                  where book_id='$ID'")or die(mysql_error());
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
                                  $query1=mysqli_query($con,"SELECT * FROM ebooks
                                  LEFT JOIN tbl_placeofpublications ON ebooks.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON ebooks.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON ebooks.moa_id = tbl_moa.moa_id 
                                  where book_id='$ID'")or die(mysql_error());
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
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_placeofpublications") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['pop_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row['pop_id']); ?>"><?php echo htmlspecialchars($row['placeofpublication']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM ebooks
                                  LEFT JOIN tbl_placeofpublications ON ebooks.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON ebooks.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON ebooks.moa_id = tbl_moa.moa_id 
                                  where book_id='$ID'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="publisher_id">Publisher
                                    </label>
                                    <div class="col-md-4">
                                        <select name="publisher_id" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_publishers") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['publisher_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM ebooks
                                  LEFT JOIN tbl_placeofpublications ON ebooks.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON ebooks.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON ebooks.moa_id = tbl_moa.moa_id 
                                  where book_id='$ID'")or die(mysql_error());
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
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_moa") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['moa_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row['moa_id']); ?>"><?php echo htmlspecialchars($row['moa']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM ebooks
                                  LEFT JOIN tbl_placeofpublications ON ebooks.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON ebooks.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON ebooks.moa_id = tbl_moa.moa_id 
                                  where book_id='$ID'")or die(mysql_error());
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
                                        <a href="ebooks.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update11" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            
<?php
$id =$_GET['book_id'];
if (isset($_POST['update11'])) {
                            // $image = $_FILES["image"] ["name"];
                            // $image_name= addslashes($_FILES['image']['name']);
                            // $size = $_FILES["image"] ["size"];
                            // $error = $_FILES["image"] ["error"];
                            


                            // if ($error > 0){
                                        
                    
                    $call_no=mysqli_real_escape_string($con,$_POST['call_no']);
                    $title=mysqli_real_escape_string($con,$_POST['title']);
                    $subject=mysqli_real_escape_string($con,$_POST['subject']);
                    $author=mysqli_real_escape_string($con,$_POST['author']);
                    $editor=mysqli_real_escape_string($con,$_POST['editor']);
                    $edition=mysqli_real_escape_string($con,$_POST['edition']);
                    $pop_id=mysqli_real_escape_string($con,$_POST['pop_id']);
                    $publisher_id=mysqli_real_escape_string($con,$_POST['publisher_id']);
                    $quantity=mysqli_real_escape_string($con,$_POST['quantity']);
                    $date_of_publ=mysqli_real_escape_string($con,$_POST['date_of_publ']);
                    $series=mysqli_real_escape_string($con,$_POST['series']);
                    $isbn_no=mysqli_real_escape_string($con,$_POST['isbn_no']);
                    $accession_no=mysqli_real_escape_string($con,$_POST['accession_no']);
                    $moa_id=mysqli_real_escape_string($con,$_POST['moa_id']);
                    $issn_no=mysqli_real_escape_string($con,$_POST['issn_no']);
                    $notation1=mysqli_real_escape_string($con,$_POST['notation1']);
                    $notation2=mysqli_real_escape_string($con,$_POST['notation2']);
                    $abstract=mysqli_real_escape_string($con,$_POST['abstract']);
                    $page_no=mysqli_real_escape_string($con,$_POST['page_no']);

// $still_profile1 = $row['book_image'];


                    if ($moa_id == 'Lost') {
                        $remark = 'Not Available';
                    } elseif ($moa_id == 'Damaged') {
                        $remark = 'Not Available';
                    } else {
                        $remark = 'Available';
                    }


mysqli_query($con," UPDATE ebooks SET call_no='$call_no',title='$title', subject='$subject', author='$author', editor='$editor', edition='$edition', pop_id='$pop_id', publisher_id='$publisher_id', quantity='$quantity', 
date_of_publ='$date_of_publ', series='$series', isbn_no='$isbn_no', accession_no='$accession_no', moa_id='$moa_id', issn_no='$issn_no', notation1='$notation1', notation2='$notation2', abstract='$abstract', remarks='$remark',page_no='$page_no' WHERE book_id = '$id' ")or die(mysql_error());
echo "<script>alert('Successfully Updated Book Info!'); history.go(-2);</script>";   

                                    // }else{
                                    //  if($size > 10000000) //conditions for the file
                                    //  {
                                    //  die("Format is not allowed or file size is too big!");
                                    //  }
                                        

// move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);           
// $profile=$_FILES["image"]["name"];

//                     $title=mysqli_real_escape_string($con,$_POST['title']);
//                     $subject=$_POST['subject'];
//                     $author=$_POST['author'];
//                     $editor=$_POST['editor'];
//                     $edition=$_POST['edition'];
//                     $pop_id=$_POST['pop_id'];
//                     $publisher_id=$_POST['publisher_id'];
//                     $quantity=$_POST['quantity'];
//                     $date_of_publ=$_POST['date_of_publ'];
//                     $series=$_POST['series'];
//                     $isbn_no=$_POST['isbn_no'];
//                     $accession_no=$_POST['accession_no'];
//                     $moa_id=$_POST['moa_id'];
//                     $issn_no=$_POST['issn_no'];
//                     $notation1=$_POST['notation1'];
//                     $notation2=$_POST['notation2'];
//                     $abstract=$_POST['abstract'];


//                     if ($quantity == 0 ) {
//                         $remark = 'Not Available';
//                     }else{
//                         $remark = 'Available';
//                     }
                    
// mysqli_query($con," UPDATE book SET title='$title', subject='$subject', author='$author', editor='$editor', edition='$edition', pop_id='$pop_id', publisher_id='$publisher_id',  quantity='$quantity', 
// date_of_publ='$date_of_publ', series='$series', isbn_no='$isbn_no', accession_no='$accession_no', moa_id='$moa_id', issn_no='$issn_no', notation1='$notation1', notation2='$notation2', abstract='$abstract', remarks='$remark' WHERE book_id = '$id' ")or die(mysql_error());
// echo "<script>alert('Successfully Updated Book Info!'); window.location='book.php'</script>";   

// // }
 }
?>                       
                        <!-- content ends here -->
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


<?php include 'script.php'; ?>