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
  background-image: url(img/qwe.jpeg);
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
  background: rgba(0, 0, 0, 0.4);
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

h3 {
  margin: 0;
  padding: 0 0 20px;
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


.loginBox input[type="email"] {
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

<div class="bg">
    <div class="content">
       <div class="loginBox">
  <img class="user" src="img/logo.png">
  <h2>Forgot Password</h2>
  <h3>Enter your email address and we'll send you instruction on how to reset your password</h3>
  <form method="POST" action="forgot_exe.php">
    <input type="email" name="email" placeholder="Enter Email Address" required>
    <button type="submit" name="btn_login">Submit</button>
  </form>
</div>
    </div>
</div>

<div class="footer">
    <p>SFAC-Bacoor Campus | Library Management System | Alrights reserved &copy; <?php echo date('Y') ?><small style="float: right; margin-right: 5px">COMPSOC</small></p>
</div>

</body>
</html>
