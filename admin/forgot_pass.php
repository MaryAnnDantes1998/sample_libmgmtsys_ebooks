<?php session_start(); ?>
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
              <h1 class="box-title"><strong>Forgot Password</strong></h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" action="forgotexe.php" method="POST">
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-1">
                  <label for="username" class="control-label"><strong>Username</strong></label>
                    <input required name="username" id="username" class="form-control input-sm" type="text" placeholder="Username..." />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-1">
                  <label for="email" class="control-label"><strong>Email</strong></label>
                    <input required name="email" id="email" class="form-control input-sm" type="email" placeholder="Email Address..." />
                  </div>
                </div>  
                <div style="text-align: center;">
                  <button type="submit" name="submit" class="col-lg-8 col-lg-offset-2 btn btn-info btn-md">Submit</button>
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

<!-- =================================================SCRIPT================================================== -->
                                    <?php include 'script.php'; ?>
<!-- =================================================SCRIPT================================================== -->

</body>
</html>