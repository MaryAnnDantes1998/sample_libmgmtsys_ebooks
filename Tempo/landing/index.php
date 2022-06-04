<?php session_start();
include "../../include/dbcon.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body, html {
    height: 100%;
    margin: 0;
}

.bg::after {
  content: '';
  height: 100vh;
  width: 100%;
  background-image: url(img/bgimg3.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  display: block;
  filter: blur(0px);
  -webkit-filter: blur(0px);
  transition: all 1000ms;
  }
.bg:hover::after {
   
  filter: blur(10px);
  -webkit-filter: blur(10px);
}
.bg:hover .content {
  filter: blur(0px);
  -webkit-filter: blur(0px);
}
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;
    text-align: center;
    background: rgba(255, 0, 0, 0.5);
}

.content {
  position: absolute;
  z-index: 1;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  filter: blur(10px);
  -webkit-filter: blur(10px);
  }

  .loginBox {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 350px;
  height: 420px;
  padding: 70px 40px;
  box-sizing: border-box;
  background: rgba(0, 0, 0, 0.1999999);
}

.user {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  overflow: hidden;
  position: absolute;
  top: calc(-100px/2);
  left: calc(50% - 50px);
}

h2 {
  margin: 0;
  padding: 0 0 26px;
  color: #fff;
  text-align: center;
}

.loginBox p {
  margin: 0;
  padding: 0;
  font-weight: bold;
  color: #fff;
}

.loginBox input {
  width: 100%;
  margin-bottom: 20px;
}

.loginBox button {
  width: 100%;
  margin-bottom: 20px;
}

.loginBox input[type="text"],
.loginBox input[type="password"] {
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  color: #fff;
  font-size: 16px;
}

::placeholder
{
  color: rgba(255, 255, 255, 0.5);
}

.loginBox button[type="submit"] {
  border: none;
  outline: none;
  height: 40px;
  color: #eee;
  font-size: 16px;
  cursor: pointer;
  border-radius: 20px;
  margin: 12px 0 18px;
  background: rgba(255,0,0, 0.3);
}

.loginBox button[type="submit"]:hover {
background: rgba(255,0,0, 0.3);
  color: #fff;
}

.loginBox a {
  color: #fff;
  font-size: 14px;
  font-weight: bold;
  text-decoration: none;
}
</style>
</head>

<body>

<div class="bg" >
    <div class="content">
       <div class="loginBox">
 <a href="https://stfrancisbacoor.com"><img class="user" src="img/logo.png"></a> 
  <h2>Log In</h2>
  <form method="POST">
    <p>Username</p>
    <input type="text" name="username" placeholder="Enter Username" required>
    <p>Password</p>
    <input type="password" name="password" placeholder="Enter Password" required>
    <button type="submit" name="btn_login">Login</button>
    <a href="forgot_pass.php">Forgot Password?</a>
  </form>
</div>
    </div>
</div>

<div class="footer">
    <p>SFAC-Bacoor Campus | Library Management System | Alrights reserved &copy; <?php echo date('Y') ?><small style="float: right; margin-right: 5px">COMPSOC</small></p>
</div>
<?php
        include "../../include/dbcon.php";
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
                  header("location:../../admin/home.php");
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
                  header("location:../../admin/userhome.php");
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
                  echo "<script>window.location='../../admin/super_admin_home.php'</script>";
                }
              }
             else
                {
                echo "<script>alert('Invalid Account!'); window.location='index.php'</script>";
                }
             
        }
        
      ?>

</body>
</html>
