<?php echo '

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <div>';
      if($_SESSION['role'] == "Administrator"){
        $user = mysqli_query($con,"SELECT * from admin where admin_id = '$id_session' ");
          while($row = mysqli_fetch_array($user)){
          $_SESSION['user'] = $row['firstname'];
        echo' <h3 style="color: white;">Welcome,</h3>
              <h4 style="color: white;">'.$row['firstname'].' '.$row['lastname'].'</h4>
              </div>';
          }
        }
      elseif($_SESSION['role'] == "Student"){
        $user = mysqli_query($con,"SELECT * from user where user_id = '$id_session' ");
          while($row = mysqli_fetch_array($user)){
          $_SESSION['user'] = $row['firstname'].' '.$row['lastname'];
        echo' <h3 style="color: white;">Welcome,</h3>
              <h4 style="color: white;">'.$row['firstname'].' '.$row['lastname'].'</h4>
              </div>';
            }
          }
      elseif($_SESSION['role'] == "Super Admin"){
        $user = mysqli_query($con,"SELECT * from tbl_super_admins where sa_id = '$id_session' ");
          while($row = mysqli_fetch_array($user)){
          $_SESSION['user'] = $row['super_admin'];
        echo' <h3 style="color: white;">Welcome,</h3>
              <h4 style="color: white;">'.$row['super_admin'].'</h4>
              </div>';
            }
          }

echo '<!-- ===============================================MAIN NAVBAR========================================== -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="color: white">MAIN NAVIGATION</li>';
        if($_SESSION['role'] == "Administrator"){
                            echo '
        <li class="active">
          <a href="home.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li>
          <a href="search.php">
            <i class="fa fa-book"></i> <span>Search Book</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Special Collection</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="thesis.php"><i class="fa fa-search"></i> Search Special Collection</a></li>
            <li><a href="add_thesis.php"><i class="fa fa-plus"></i> Add Special Collection</a></li>
            <li><a href="borrow_collection.php"><i class="fa fa-shopping-cart"></i> Special Collection Check-out </a></li>
            <li><a href="add_category.php"><i class="fa fa-list"></i> Categories</a></li>
            <li><a href="course.php"><i class="fa fa-list"></i> Courses</a></li>
          </ul>
        </li>
        <li class="header" style="color: white">USER MAINTENANCE</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="user.php"><i class="fa fa-user"></i>Search User</a></li>
            <li><a href="add_user.php"><i class="fa fa-user-plus"></i> Add User</a></li>
          </ul>
        </li>

        <li class="header" style="color: white">BOOK MAINTENANCE</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="book.php"><i class="fa fa-plus"></i> Add Book</a></li>
            <!--<li><a href="add_author.php"><i class="fa fa-plus"></i> Add Author</a></li>-->
            <li><a href="moa.php"><i class="fa fa-plus"></i> Mode Of Acquisition</a></li>
            <!--<li><a href="add_subject.php"><i class="fa fa-plus"></i> Add Subject</a></li>-->
            <li><a href="publisher.php"><i class="fa fa-plus"></i> Publisher</a></li>
            <li><a href="pop.php"><i class="fa fa-plus"></i> Place of Publication</a></li>
          </ul>
        </li>


<li class="header" style="color: white">E-BOOKS MAINTENANCE</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>E-Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ebooks.php"><i class="fa fa-plus"></i> Add E-Books</a></li>
            <li><a href="search_ebooks.php"><i class="fa fa-search"></i> Search E-Books</a></li>
          </ul>
        </li>



        <li class="header" style="color: white">LIBRARY SERVICES</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Borrowing Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="borrow.php"><i class="fa fa-shopping-cart"></i>Reader Check-out</a></li>
            <li><a href="settings.php"><i class="fa fa-gear"></i>Settings</a></li>
          </ul>
        </li>
        <li class="header" style="color: white">SUMMARY REPORTS</li>
        <li>
          <a href="borrowed_book.php"><i class="fa fa-book"></i> <span>Borrowed Books</span></a>
        </li>
        <li>
          <a href="returned_book.php"><i class="fa fa-book"></i> <span>Returned Books</span></a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Utilization Records</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="utilization_record.php"><i class="fa fa-check"></i>Active Records</a></li>
            <li><a href="inactive_records.php"><i class="fa fa-times"></i>Inactive Records</a></li>
            <li><a href="inventory.php"><i class="fa fa-briefcase"></i>Inventory</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Archives</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="archives.php"><i class="fa fa-book"></i> <span>Inactive Books</span></a></li>
          <li><a href="arc_thesis.php"><i class="fa fa-book"></i> <span>Inactive Collection</span></a></li>
          </ul>
        </li>
        <li class="header" style="color: white">DATABASE MAINTENANCE</li>
        <li>
          <a href="backup.php"><i class="fa fa-database"></i> <span>Backup Database</span></a>
        </li>
        <li>
          <a href="restore.php"><i class="fa fa-database"></i> <span>Restore Database</span></a>
        </li>';
      }
      elseif($_SESSION['role'] == "Student"){
                            echo '
        <li class="active">
          <a href="userhome.php"><i class="fa fa-home"></i> <span>Home</span></a>
        </li>
        <li>
          <a href="search.php">
            <i class="fa fa-home"></i> <span>Search Book</span>
          </a>
        </li>

      
       <li>
          <a href="search_ebooks.php">
            <i class="fa fa-home"></i> <span>Search E-Books</span>
          </a>
        </li>


        <li>
          <a href="thesis.php">
            <i class="fa fa-search"></i> Search Special Collection
          </a>
        </li>
        <li>
          <a href="archives.php">
            <i class="fa fa-home"></i> <span>Search Archived Book</span>
          </a>
        </li>
        <li>
          <a href="userbook.php"><i class="fa fa-book"></i> <span>Book List</span></a>
        </li>
        <li>
          <a href="userborrow.php"><i class="fa fa-book"></i> <span>Borrowed Books</span></a>
        </li>
        <li>
          <a href="userhistory.php"><i class="fa fa-book"></i> <span>Borrow History</span></a>
        </li>';
      }
      elseif($_SESSION['role'] == "Super Admin"){
                            echo '
        <li class="active">
          <a href="super_admin_home.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li>
          <a href="search.php">
            <i class="fa fa-home"></i> <span>Search Book</span>
          </a>
        </li>
        <li class="header" style="color: white">LIBRARIAN MAINTENANCE</li>
        <li>
          <a href="librarian_list.php"><i class="fa fa-user"></i> <span>List of Librarians</span></a>
        </li>
        <li>
          <a href="add_librarian.php"><i class="fa fa-user-plus"></i> <span>Add Librarian</span></a>
        </li>
        <li class="header" style="color: white">DATABASE MAINTENANCE</li>
        <li>
          <a href="backup.php"><i class="fa fa-database"></i> <span>Backup Database</span></a>
        </li>
        <li>
          <a href="restore.php"><i class="fa fa-database"></i> <span>Restore Database</span></a>
        </li>';
      }
      echo '
      </ul>
<!-- ==========================================./MAIN NAVBAR====================================== -->
    </section>
    <!-- /.sidebar -->
  </aside>';

?>