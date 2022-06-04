<?php 
ob_start();
 include 'header.php';
if($_SESSION['role'] == "Super Admin" OR "Adminstrator")
{
?>
<?php
include ('../include/dbcon.php');

$ID=$_GET['admin_id'];
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
                        <h2><i class="fa fa-pencil"></i> Edit Admin</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
<?php
  $query=mysqli_query($con,"select * from admin where admin_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_array($query);
  ?>                       
                        <div class="box">
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    
                                    <div class="col-md-4">
                                        
                                        <input type="hidden" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="MI / Middle Name....." id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div><span style="color:red;">Optional</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <input type="hidden" name="activation_code" id="activation_code" class="form-control col-md-7 col-xs-12" value="<?php echo $row['activation_code']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">e-Mail Address:
                                    </label>
                                    <div class="col-md-4">
                                        <input type="email" value="<?php echo $row['email']; ?>" name="email" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">User Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['username']; ?>" name="username" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Password
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="password" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Confirm Password
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="confirm_password" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                        <!---        <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Admin Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <select name="admin_type" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="<?php // echo $row['admin_type']; ?>"><?php // echo $row['admin_type']; ?></option>
                                            <option>Admin</option>
                                            <option>Encoder</option>
                                        </select>
                                    </div>
                                </div>  -->
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            

                            
                            
<?php
$id =$_GET['admin_id'];
if (isset($_POST['update'])) {
                            //     $image = $_FILES["image"] ["name"];
                            // $image_name= addslashes($_FILES['image']['name']);
                            // $size = $_FILES["image"] ["size"];
                            // $error = $_FILES["image"] ["error"];
                            


                            // if ($error > 0){
                                        
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$activation_code = $_POST['activation_code'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
$confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
// $admin_type = $_POST['admin_type'];
$still_profile = $row['admin_image'];

$result=mysqli_query($con,"select * from admin") or die (mySQL_error());
$row=mysqli_num_rows($result);

if($password != $confirm_password)
{
    if($_SESSION['role']=='Super Admin'){
            echo "<script>alert('Password do not match!'); window.location='super_admin_home.php'</script>";
    }else{
        echo "<script>alert('Password do not match!'); window.location='home.php'</script>";
    }
}else
{
mysqli_query($con," UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname',activation_code='$activation_code', email='$email', username='$username', password='$hashedPwd', 
confirm_password='$confirm_hashedPwd', admin_image='$still_profile' WHERE admin_id = '$id' ")or die(mysql_error());

    if($_SESSION['role']=='Super Admin'){
            echo "<script>alert('Successfully Update Admin Info!'); window.location='super_admin_home.php'</script>";
    }else{
        echo "<script>alert('Successfully Update Admin Info!'); window.location='home.php'</script>";
    }
  
}
//                                     }else{
//                                         if($size > 10000000) //conditions for the file
//                                         {
//                                         die("Format is not allowed or file size is too big!");
//                                         }
                                        

// move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);          
// $profile=$_FILES["image"]["name"];

// $firstname = $_POST['firstname'];
// $middlename = $_POST['middlename'];
// $lastname = $_POST['lastname'];
// $username = $_POST['username'];
// $password = $_POST['password'];
// $confirm_password = $_POST['confirm_password'];
// // $admin_type = $_POST['admin_type'];

// $result=mysqli_query($con,"select * from admin") or die (mySQL_error());
// $row=mysqli_num_rows($result);

// if($password != $confirm_password)
// {
// echo "<script>alert('Password do not match!'); window.location='home.php'</script>";
// }else

// {       
// mysqli_query($con," UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname', username='$username', password='$password', 
// confirm_password='$confirm_password', admin_image='$profile' WHERE admin_id = '$id' ")or die(mysql_error());
// echo "<script>alert('Successfully Updated Admin Info!'); window.location='home.php'</script>";
// }

// }
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

<?php }else{
    header("Location: 404.php");
} ?>
<?php include 'script.php'; ?>