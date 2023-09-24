<?php
require('partials/AdminLTE3/head.php');
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/aypLogo.jpg" alt="AdminLTELogo" height="400" width="400">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

            <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/aypLogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Alliance YP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['user']['username'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <li class="nav-item ">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="churchProfile.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Church Profile
              </p>
            </a>
          </li>
          <li class="nav-item active">
            <a href="registrar_dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Register
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="reports.php" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="about_us.php" class="nav-link">
            <i class="nav-icon fas fa-user-secret"></i>
              <p>
                About us
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-navy ">
              <div class="card-body">
                <div class="d-flex justify-content-center form-group">
                  <form action="/register" method="POST">
                    <div class="row">
                      <div class="col-sm-4">
                        <label for="firstName">Name</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" 
                        value="<?= isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : '' ?>"
                        placeholder="First Name" required>
                        <?php if(isset($errors['firstName'])): ?>
                          <p class="fs-6 text-danger"><?= $errors['firstName'] ?></p>
                        <?php endif ?>
                      </div>

                      <div class="col-sm-4">
                      <label for="lastName" style="visibility:hidden">surname</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" 
                        value="<?= isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : '' ?>"
                        placeholder="Surname" required>
                        <?php if(isset($errors['lastName'])): ?>
                          <p class="fs-6 text-danger"><?= $errors['lastName'] ?></p>
                        <?php endif ?>
                      </div>

                      <div class="col-sm-4">
                        <label for="nickname">Nickname</label>
                        <input type="text" name="nickname" id="nickname"class="form-control" 
                        value="<?= isset($_POST['nickname']) ? htmlspecialchars($_POST['nickname']) : '' ?>"
                        placeholder="NickName">
                        <?php if(isset($errors['nickname'])): ?>
                          <p class="fs-6 text-danger"><?= $errors['nickname'] ?></p>
                        <?php endif ?>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-sm-6">
                        <label for="age">Age</label>
                        <input type = "number" name="age" id="age"
                        value="<?= isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '' ?>"
                        placeholder="Age" class="form-control" required>

                        <?php if(isset($errors['age'])): ?>
                          <p class="fs-6 text-danger"><?= $errors['age'] ?></p>
                        <?php endif ?>

                      </div>

                      <div class="col-sm-6">
                        <label for="Contact">Contact Number</label>
                        <input type = "text" name="contact" id="Contact" 
                        value="<?= isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : '' ?>"
                        placeholder="Contact Number" class="form-control" required>
                        <?php if(isset($errors['contact'])): ?>
                          <p class="fs-6 text-danger"><?= $errors['contact'] ?></p>
                        <?php endif ?>
                      </div>
                        
                    </div>
                    <div class="row">
                          <div class="col-sm-6">
                            <label for="Circuit_id" class="form-label">Circuit</label>
                            <input class="form-control" name="circuit" list="Circuit" id="Circuit_id" 
                            value="<?= isset($_POST['circuit']) ? htmlspecialchars($_POST['circuit']) : '' ?>"
                            placeholder="Type to search..." required>
                            <datalist id="Circuit">
                              <?php foreach($circuits as $circuit): ?>
                                <option value="<?= $circuit['Circuit'] ?>">
                              <?php endforeach; ?>
                            </datalist>
                            <?php if(isset($errors['circuit'])): ?>
                              <p class="fs-6 text-danger"><?= $errors['circuit'] ?></p>
                            <?php endif ?>
                          </div>
                          <div class="col-sm-6">
                            <label for="Church_id" class="form-label">Church</label>
                              <input class="form-control" list="Church" name="church" id="Church_id" 
                              value="<?= isset($_POST['church']) ? htmlspecialchars($_POST['church']) : '' ?>"
                              placeholder="Type to search..." required>
                              <datalist id="Church">
                                <?php foreach($churches as $church): ?>
                                  <option value="<?= $church['Church'] ?>">
                                <?php endforeach; ?>
                              </datalist>
                              <?php if(isset($errors['church'])): ?>
                                <p class="fs-6 text-danger"><?= $errors['church'] ?></p>
                              <?php endif ?>
                          </div>
                        </div>
                        <label class="radio-inline mt-3">
                          <input type="radio" value="1" name="delegateType" 
                          <?= isset($_POST['delegateType']) ? ($_POST['delegateType'] !== 2 ? 'checked': '') : 'checked' ?> >Young People
                        </label>
                        <label class="radio-inline ml-3 mt-3">
                          <input type="radio" value="2" name="delegateType"
                          <?= isset($_POST['delegateType']) ? ($_POST['delegateType'] === 2 ? 'checked': '') : '' ?> >Youth Worker
                        </label>
                        <button type="submit" class="btn btn-primary btn-block mt-5">Register</button>
                        <?php if(isset($errors['delegate'])): ?>
                                <p class="fs-6 text-danger"><?= $errors['delegate'] ?></p>
                        <?php endif ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
