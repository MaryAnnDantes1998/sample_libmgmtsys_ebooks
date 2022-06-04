<?php session_start();
include "../include/dbcon.php";
  $username = $_GET['username'];
  $code = $_GET['activation_code']; ?>
<!DOCTYPE html>
<html>

                                    <?php include 'head_css.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  
    <!-- Content Header (Page header) -->
    <section class="content-header" style="text-align: center;">
      <h1>Library Management System</h1>
    </section>

    <!-- Main content -->
    <section class="content" style="padding-top: 100px ">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-4 col-md-offset-4">
          <div class="box" style="border: 2px #ccc solid">
            <div class="box-header" style="text-align: center;font-size: 30px">
              <h1 class="box-title"><strong>Reset Password</strong></h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal"  method="POST">
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-1">
                  <label for="password" class="control-label"><strong>New Password</strong></label>
                    <input required name="password" id="password" class="form-control input-sm" type="password" placeholder="New Password..." />
                  </div>
                </div>
                <input type="hidden" name="code" value="<?php echo $code;?>" />
                <input type="hidden" name="username" value="<?php echo $username;?>" />
                <div style="text-align: center;">
                  <button type="submit" name="submit" class="col-lg-8 col-lg-offset-2 btn btn-info btn-md">Submit</button>
                </div>
              </form>
              <?php
include "../include/dbcon.php";

if(isset($_POST['submit'])){
$username = $_POST['username'];
$code = $_POST['code'];
$password = $_POST['password'];



    if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } 
    $admin = mysqli_query($con,"select * from admin where activation_code='".$code."'")or die(mysqli_error($con)); 
    $row = mysqli_num_rows ($admin);

    $user = mysqli_query($con,"select * from user where activation_code='".$code."'")or die(mysqli_error($con)); 
    $row1 = mysqli_num_rows ($user);

    if ($row == 1) {
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
      $query3 = mysqli_query($con,"update admin set password='".$hashedPwd."' where activation_code='".$code."'")or die(mysqli_error($con)); 
      echo "<script>alert('Password successfully changed!'); window.location='index.php'</script>";
    }  
    elseif ($row1 == 1) {
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
      $query3 = mysqli_query($con,"update user set password='".$hashedPwd."' where activation_code='".$code."'")or die(mysqli_error($con)); 
      echo "<script>alert('Password successfully changed!'); window.location='index.php'</script>";
       }   
    else{
      echo 'Wrong CODE';
    }
}
              ?>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>

<!-- =================================================SCRIPT================================================== -->
                                    <?php include 'script.php'; ?>
<!-- =================================================SCRIPT================================================== -->

</body>
</html>