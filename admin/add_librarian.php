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

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3><i class="fa fa-user-plus"></i> Add Librarian</h3>
                        <div class="clearfix"></div>
                    </div>

                    <div class="box">
                        <div class="box-body">
                            <div class="x_content">
                        <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="firstname" placeholder="First Name....." id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" placeholder="MI / Middle Name....." id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="lastname" placeholder="Last Name....." id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <input type="hidden" name="activation_code" id="activation_code" class="form-control col-md-7 col-xs-12" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">e-Mail Address:
                                    </label>
                                    <div class="col-md-3">
                                        <input type="email" placeholder="e.g. sample@email.com"  autocomplete="off" name="email" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Username <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="username" placeholder="username....." id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Password <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="password" name="password" placeholder="password....." id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Confirm Password <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="password" name="confirm_password" placeholder="confirm password....." id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Admin Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>  
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="user.php"><button type="button" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                            <?php   
                            include ('../include/dbcon.php');
                if (isset($_POST['submit'])){
                            
                                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                                if($check !== false){
                                    $image = $_FILES['image']['tmp_name'];
                                    $imgContent = addslashes(file_get_contents($image));
                                    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
                                    $middlename = mysqli_real_escape_string($con,$_POST['middlename']);
                                    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
                                    $activation_code = mysqli_real_escape_string($con,$_POST['activation_code']);
                                    $email = mysqli_real_escape_string($con,$_POST['email']);
                                    $username =mysqli_real_escape_string($con,$_POST['username']);
                                    $password = mysqli_real_escape_string($con,$_POST['password']);
                                    $confirm_password = mysqli_real_escape_string($con,$_POST['confirm_password']);
                                    
                    
                    
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
                        if($password != $confirm_password)
{
echo "<script>alert('Password do not match!'); window.location='super_admin_home.php'</script>";
}else
{
                        mysqli_query($con,"INSERT into admin (firstname, middlename, lastname, activation_code, email, username, password, confirm_password, admin_image, admin_added)
                        values ('$firstname', '$middlename', '$lastname', '$activation_code', '$email','$username','$hashedPwd', '$confirm_hashedPwd','$image', NOW() )")or die(mysql_error());
                        echo "<script>alert('User successfully added!'); window.location='librarian_list.php'</script>";
                  }
                                                            }
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