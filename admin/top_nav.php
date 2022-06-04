<?php
include 'session.php';
  echo '
<div class="wrapper">

  <header class="main-header" style="background-color:#b90e0a">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SFAC</span>
      <!-- logo for regular state and mobile devices -->
      <img src="../img/logo.png" style="height: 50px; width: 50px; float: left;">
      <span class="logo-lg">SFAC-Bacoor</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
            <!-- <form class="navbar-form navbar-left" role="search" action="search.php">
              <div class="form-group">
                <input type="text" name="search" class="form-control" id="navbar-search-input" placeholder="Search book">
                <button type="submit" name="submit" class="btn btn-default">Search</button>
              </div>
            </form> -->
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">';
              include "../include/dbcon.php";
                                if($_SESSION['role'] == "Administrator"){
                                    $user = mysqli_query($con,"SELECT * from admin where admin_id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['firstname'];
                                        echo $row['firstname'];
                                    }
                                }
                                elseif($_SESSION['role'] == "Student"){
                                    $user = mysqli_query($con,"SELECT * from user where user_id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['firstname'].' '.$row['lastname'];
                                        echo $row['firstname'].' '.$row['lastname'];
                                    }
                                }
                                elseif($_SESSION['role'] == "Super Admin"){
                                    $user = mysqli_query($con,"SELECT * from tbl_super_admins where sa_id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['super_admin'];
                                        echo $row['super_admin'];
                                    }
                                }
                   echo '               
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  '.$_SESSION['user'].'
                </p>
              </li>
              <!-- Menu Footer-->
              <div class="user-footer">
              <li>
                <div class="pull-left">';
                if ($_SESSION['role'] == "Administrator") {
                  $result= mysqli_query($con,"select * from admin where admin_id = '".$_SESSION['userid']."' ") or die (mysql_error());
              while ($row= mysqli_fetch_array ($result) ){
                $id=$row['admin_id'];
              echo '
                  <a href="edit_admin.php?admin_id='.$id.'" class="btn btn-default btn-flat"><i class="fa fa-edit" aria-hidden="true"></i> Edit Profile</a>';}
                }
                elseif ($_SESSION['role'] == "Student") {
                  $result= mysqli_query($con,"select * from user where user_id = '".$_SESSION['userid']."' ") or die (mysql_error());
              while ($row= mysqli_fetch_array ($result) ){
                $id=$row['user_id'];
              echo '
                  <a href="edit_user_prof.php?user_id='.$id.'" class="btn btn-default btn-flat"><i class="fa fa-edit" aria-hidden="true"></i> Edit Profile</a>';}
                }
                elseif ($_SESSION['role'] == "Super Admin") {
                  $result= mysqli_query($con,"select * from tbl_super_admins where sa_id = '".$_SESSION['userid']."' ") or die (mysql_error());
              while ($row= mysqli_fetch_array ($result) ){
                $id=$row['sa_id'];
              echo '
                  <a href="edit_user_super_admin.php?user_id='.$id.'" class="btn btn-default btn-flat"><i class="fa fa-edit" aria-hidden="true"></i> Edit Profile</a>';}
                }
                
              echo '
                </div>
              </li>
              <li>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
              </div>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>'; ?>