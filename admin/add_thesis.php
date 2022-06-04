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
                        <h3><i class="fa fa-user-plus"></i> Add Special Collection</h3>
                        <div class="clearfix"></div>
                    </div>

                    <div class="box">
                        <div class="box-body">
                            <div class="x_content">
                        <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Code # <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="code" placeholder="Code Number....." id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Name of Student/s</label>
                                    <div class="col-md-3">
                                        <input type="text" name="name" placeholder="Name of Student/s....." id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Course
                                    </label>
                                    <div class="col-md-3">
                                        <select name="course" class="select2_single form-control" tabindex="-1">
                                            <option selected disabled>-- Select Course --</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from courses") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['course_id'];
                                        ?>
                                            <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">No. of Copy
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" required  autocomplete="off" name="quantity" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Title
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="Title....."  autocomplete="off" name="title" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Category
                                    </label>
                                    <div class="col-md-3">
                                        <select name="category" class="select2_single form-control" tabindex="-1">
                                            <option selected disabled>-- Select Category --</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from categories") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['category_id'];
                                        ?>
                                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['categories']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Date
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="Date....."  autocomplete="off" name="date" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>  
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                            <?php   
                            include ('../include/dbcon.php');
                if (isset($_POST['submit'])){
                                $code = mysqli_real_escape_string($con,$_POST['code']);
                                $name = mysqli_real_escape_string($con,$_POST['name']);
                                $course = mysqli_real_escape_string($con,$_POST['course']);
                                $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
                                $title = mysqli_real_escape_string($con,$_POST['title']);
                                $category = mysqli_real_escape_string($con,$_POST['category']);
                                $date = mysqli_real_escape_string($con,$_POST['date']);

                    if ($quantity == 0 ) {
                        $remarks = 'Not Available';
                    }else{
                        $remarks = 'Available';
                    }
  
                        mysqli_query($con,"INSERT into special_collection (accession_no, nameofstudent, course_id, quantity, title, deyt, category_id, remarks)
                        values ('$code', '$name', '$course','$quantity', '$title', '$date','$category','$remarks')")or die(mysql_error());
                        echo "<script>alert('Special Collection successfully added!'); window.location='add_thesis.php'</script>";
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

<?php }else{
    header("Location: 404.php");
} ?>
<?php include 'script.php'; ?>