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
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <i class= "fa fa-cog fa-spin"></i> Settings
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
           <div class="row">
        
                <?php include ('allowed_qntty.php'); ?>
                
                <?php include ('penalty.php'); ?>
                
                <?php include ('allowed_days.php'); ?>
                
                <div class="clearfix"></div>
                    
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