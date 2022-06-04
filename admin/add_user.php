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
                        <h3><i class="fa fa-user-plus"></i> Add User</h3>
                        <div class="clearfix"></div>
                    </div>

                    <div class="box">
                        <div class="box-body">
                            <div class="x_content">
                        <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">ID Number <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-2">
                                        <input type="text" name="student_number" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
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
                                    <label class="control-label col-md-4" for="last-name">Contact #
                                    </label>
                                    <div class="col-md-3">
                                        <input type="tel" pattern="[0-9]{11,11}" autocomplete="off"  maxlength="11" name="contact" id="last-name2" class="form-control col-md-7 col-xs-12">
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
                                    <label class="control-label col-md-4" for="last-name">Gender <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <select name="gender" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>                              
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Address
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="address" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Type <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <select name="type" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Student">Student</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Teacher">Faculty</option>
                                            

                                        </select>
                                    </div>
                                    </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Level <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <select name="level" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Elementary">Elementary</option>
                                            <option value="Highschool">High School</option>
                                            <option value="Senior Highschool">Senior Highschool</option>
                                            <option value="College">College</option>
                                            <option value="Faculty">Faculty</option>
                                        </select>
                                </div>
                                    </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Section or Course <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="section" placeholder="Section....." id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div><span style="color:red;">Optional</span>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <input type="hidden" name="activation_code" id="activation_code" class="form-control col-md-7 col-xs-12" value="">
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
                        <!---        <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">User Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>  -->
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
                            
        //                  if (!isset($_FILES['image']['tmp_name'])) {
        //                  echo "";
        //                  }else{
        //                  $file=$_FILES['image']['tmp_name'];
        //                  $image = $_FILES["image"] ["name"];
        //                  $image_name= addslashes($_FILES['image']['name']);
        //                  $size = $_FILES["image"] ["size"];
        //                  $error = $_FILES["image"] ["error"];
        //                  
        //                  {
        //                              if($size > 10000000) //conditions for the file
        //                              {
        //                              die("Format is not allowed or file size is too big!");
        //                              }
        //                              
        //                          else
        //                              {
        //
        //                          move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);          
        //                          $profile=$_FILES["image"]["name"];
                                    $student_number = mysqli_real_escape_string($con,$_POST['student_number']);
                                    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
                                    $middlename = mysqli_real_escape_string($con,$_POST['middlename']);
                                    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
                                    $contact = mysqli_real_escape_string($con,$_POST['contact']);
                                    $email = mysqli_real_escape_string($con,$_POST['email']);
                                    $gender = mysqli_real_escape_string($con,$_POST['gender']);
                                    $address = mysqli_real_escape_string($con,$_POST['address']);
                                    $type = mysqli_real_escape_string($con,$_POST['type']);
                                    $level = mysqli_real_escape_string($con,$_POST['level']);
                                    $section = mysqli_real_escape_string($con,$_POST['section']);
                                    $activation_code = mysqli_real_escape_string($con,$_POST['activation_code']);
                                    $username =mysqli_real_escape_string($con,$_POST['username']);
                                    $password = mysqli_real_escape_string($con,$_POST['password']);
                                    
                    
                    $result=mysqli_query($con,"SELECT * from user WHERE student_number='$student_number' ") or die (mySQLi_error());
                    $row=mysqli_num_rows($result);
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    if ($row > 0)
                    {
                    echo "<script>alert('ID Number already active!'); window.location='user.php'</script>";
                    }
                    else
                    {       
                        mysqli_query($con,"INSERT into user (student_number,firstname, middlename, lastname, contact, email, gender, address, type, level, section, status, user_added, activation_code,  username, password)
                        values ('$student_number','$firstname', '$middlename', '$lastname', '$contact', '$email', '$gender', '$address', '$type', '$level', '$section', 'Active', NOW(), '$activation_code', '$username','$hashedPwd')")or die(mysql_error());
                        echo "<script>alert('User successfully added!'); window.location='user.php'</script>";
                    }
            //                      }
            //                      }
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