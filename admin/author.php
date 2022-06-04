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
                        <h3 class="col-xs-10">Authors</h3>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="col-xs-2">
                            <a href="add_author.php" style="background:none;">
                            <button class="btn btn-primary"><i class="fa fa-plus"></i> Add Author</button>
                            </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                        <!-- content starts here -->
                                <div class="table-responsive">
                            <table s id="example1" class="table table-striped table-bordered" >
                            <thead style="background: #ccc">
                                <tr>
                                    <th>Author</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php include '../include/dbcon.php';
                                $query = mysqli_query($con, "SELECT * FROM tbl_authors");
                                while ($row= mysqli_fetch_array ($query)){
                                    ?><tr>
                                    <td><?php echo $row['author']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                                
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