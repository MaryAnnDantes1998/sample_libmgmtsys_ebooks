<?php session_start();
?>


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
              <h1 class="box-title"><strong>LOGIN</strong></h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" method="POST">
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-1">
                  <label for="username" class="control-label"><strong>Username</strong></label>
                    <input required name="username" id="username" class="form-control input-sm" type="text" placeholder="Username..." />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-1">
                  <label for="password" class="control-label"><strong>Password</strong></label>
                    <input required name="password" id="password" class="form-control input-sm" type="password" placeholder="Password..." />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-1">
                    <p><a href="forgot_pass.php">Forgot Password?</a></p>
                  </div>
                </div> 
                <div style="text-align: center;">
                  <button type="submit" name="btn_login" class="col-lg-8 col-lg-offset-2 btn btn-info btn-md">Login</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  

      <?php
        include "../include/dbcon.php";
        if(isset($_POST['btn_login'])) 
        // {
        //   $username = mysqli_real_escape_string($con, $_POST['username']);
        //   $password = mysqli_real_escape_string($con, $_POST['password']);

        //   if (empty($username) || empty($password) )
        //   {
        //     echo "<script>alert('All Field is Required!'); window.location='index.php'</script>";
        //   }
        //   else
        //   {
        //     $sql = "SELECT * FROM admin WHERE username = '$username'";
        //       $result = mysqli_query($con, $sql);
        //       $resultCheck = mysqli_num_rows($result);
        //       if ($resultCheck < 1) 
        //       {
        //         header('Location: index.php?login=success');
        //         exit();
        //       }
        //       else
        //       {
        //         if ($row = mysqli_fetch_assoc($result)) 
        //         {
        //           //de-hashing pwd
        //           $hashedPwdCheck = password_verify($password, $row['password']);
        //           if ($hashedPwdCheck == false) 
        //           {
        //             echo "<script>alert('Login Failed!'); window.location='index.php'</script>";
        //             exit();
        //           } elseif ($hashedPwdCheck == true) 
        //           {
        //             //Login the user here
        //             $_SESSION['role'] = "Administrator";
        //             $_SESSION['userid'] = $row['admin_id'];
        //             echo "<script>alert('Login Successful!'); window.location='home.php'</script>";
        //             exit();
        //           }
        //         }
        //       }
        //   }
        // }
        { 
          $username = mysqli_real_escape_string($con, $_POST['username']);
          $password = mysqli_real_escape_string($con, $_POST['password']);


            $super_admin = mysqli_query($con, "SELECT * from tbl_super_admins where username = '$username' ");
            $numrow2 = mysqli_num_rows($super_admin);

            $admin = mysqli_query($con, "SELECT * from admin where username = '$username' ");
            $numrow = mysqli_num_rows($admin);

            $student = mysqli_query($con, "SELECT * from user where username = '$username' ");
            $numrow1 = mysqli_num_rows($student);

            if($numrow > 0)
            {   
                while($row = mysqli_fetch_array($admin))
                {
                  $hashedPwdCheck = password_verify($password, $row['password']);
                  if ($hashedPwdCheck == false) 
                  {
                    echo "<script>alert('Username or Password do not match!'); window.location='index.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck == true) 
                  {
                    $_SESSION['role'] = "Administrator";
                    $_SESSION['userid'] = $row['admin_id'];
                  }    
                  echo "<script>alert('Login Successfully!'); window.location='home.php'</script>";
                }
            }
            elseif($numrow1 > 0)
              {   
                while($row = mysqli_fetch_array($student))
                {
                  $hashedPwdCheck1 = password_verify($password, $row['password']);
                  if ($hashedPwdCheck1 == false) 
                  {
                    echo "<script>alert('Login Failed!'); window.location='index.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck1 == true) 
                  {
                   $_SESSION['role'] = "Student";
                   $_SESSION['userid'] = $row['user_id'];
                  } 
                  echo "<script>alert('Login Successfully!'); window.location='userhome.php'</script>";
                }
              }
            elseif($numrow2 > 0)
              {   
                while($row = mysqli_fetch_array($super_admin))
                {
                  $hashedPwdCheck1 = password_verify($password, $row['password']);
                  if ($hashedPwdCheck1 == false) 
                  {
                    echo "<script>alert('Login Failed!'); window.location='index.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck1 == true) 
                  {
                   $_SESSION['role'] = "Super Admin";
                   $_SESSION['userid'] = $row['sa_id'];
                  } 
                  echo "<script>alert('Login Successfully!'); window.location='super_admin_home.php'</script>";
                }
              }
             else
                {
                echo "<script>alert('Invalid Account!'); window.location='index.php'</script>";
                }
             
        }
        
      ?>

<!-- =================================================FOOTER================================================== -->
                                 
<!-- =================================================FOOTER================================================== -->

<!-- =================================================SCRIPT================================================== -->
                                    <?php include 'script.php'; ?>
<!-- =================================================SCRIPT================================================== -->

</body>
</html>