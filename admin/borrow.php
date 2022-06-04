<?php
    include ('../include/dbcon.php');

    if (isset($_POST['student_number'])) {

    $student_number = $_POST['student_number'];

    $sql = mysqli_query($con,"SELECT * FROM user WHERE student_number = '$student_number' ");
    $count = mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);

        if($count <= 0){
            echo "<div class='alert alert-success'>".'No match found for the School ID Number'."</div>";
        }else{
            $student_number = $_POST['student_number'];
            header('location:borrow_book.php?student_number='.$student_number);
           
        }
    }
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
                        <h3>Select Student</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                                <div class="container-fluid">
<div class="row">
    <div class="col-md-4"></div>
    
                                             <form method="post">
                                        <div class="col-xs-4">Scan ID Barcode
                                            <input type="text" style="margin-bottom:10px; margin-left:-9px;" class="form-control" name="student_number" placeholder="Enter barcode here....." autofocus required />
                                        </div>
                                    </form>             

                        



    <div class="col-md-4"></div>
</div>
</div>          
                        <!-- content ends here -->
                            </div>
                        </div>
                        <!-- content starts here -->


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