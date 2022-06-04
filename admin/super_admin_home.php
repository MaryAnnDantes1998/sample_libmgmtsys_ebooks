<?php 
ob_start();
include 'header.php'; 

if($_SESSION['role'] == "Super Admin")
{
?>


	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1></h1>
    </section>

    <!-- Main content -->
    <section class="content">

                
    </section>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->

    <!-- /.content -->
  </div>
<?php }else{
    header("Location: 404.php");
} ?>

<?php include 'script.php'; ?>