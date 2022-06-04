<?php 
ob_start();
include ('../include/dbcon.php');
include 'header.php';
$ID=$_GET['thesis_id']; ?>


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
                        <h2><i class="fa fa-pencil"></i> Edit Special Collection</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
<?php
  $query=mysqli_query($con,"SELECT * from special_collection LEFT JOIN categories ON categories.category_id = special_collection.category_id
        LEFT JOIN courses ON courses.course_id = special_collection.course_id where thesis_id='$ID'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>                       
                        <div class="box">
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Code #
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['accession_no']; ?>" name="code" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Student's Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="name" value="<?php echo $row['nameofstudent']; ?>" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="pop_id">Course
                                    </label>
                                    <div class="col-md-4">
                                        <select name="course" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['course_id']); ?>"><?php echo htmlspecialchars($row['course_name']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from courses where course_id not in ('".$row['course_id']."')") or die (mysqli_error($con));
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['course_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row['course_id']); ?>"><?php echo htmlspecialchars($row['course_name']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
<?php
  $query=mysqli_query($con,"SELECT * from special_collection LEFT JOIN categories ON categories.category_id = special_collection.category_id
        LEFT JOIN courses ON courses.course_id = special_collection.course_id where thesis_id='$ID'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Title
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="title" value="<?php echo $row['title']; ?>" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="pop_id">Category
                                    </label>
                                    <div class="col-md-4">
                                        <select name="category" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['category_id']); ?>"><?php echo htmlspecialchars($row['categories']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from categories where category_id not in ('".$row['category_id']."')") or die (mysqli_error($con));
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['category_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row['category_id']); ?>"><?php echo htmlspecialchars($row['categories']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
<?php
  $query=mysqli_query($con,"SELECT * from special_collection LEFT JOIN categories ON categories.category_id = special_collection.category_id
        LEFT JOIN courses ON courses.course_id = special_collection.course_id where thesis_id='$ID'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Date
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="date" value="<?php echo $row['deyt']; ?>" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            

                            
                            
<?php
$id =$_GET['thesis_id'];
if (isset($_POST['update'])) {
                               
$code = mysqli_real_escape_string($con,$_POST['code']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$course = mysqli_real_escape_string($con,$_POST['course']);
$title = mysqli_real_escape_string($con,$_POST['title']);
$category = mysqli_real_escape_string($con,$_POST['category']);
$date = mysqli_real_escape_string($con,$_POST['date']);




{
mysqli_query($con," UPDATE special_collection SET accession_no='$code', nameofstudent='$name', course_id='$course', title='$title', category_id='$category', deyt='$date' WHERE thesis_id = '$id' ")or die(mysqli_error($con));
echo "<script>alert('Successfully Update Info!'); history.go(-2);</script>";  
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