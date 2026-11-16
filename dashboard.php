<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']) == 0) {
  header('location:logout.php');
} else {
?>
  <!DOCTYPE html>
  <html class="loading" lang="en" data-textdirection="ltr">

  <head>
    <title>UDUS || College Admission Management System | Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .dashboard-header { background: #fff; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,.05); }
      .dashboard-card { border: none; border-radius: 1rem; box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,.05); }
      .dashboard-card .card-icon { width: 3.5rem; height: 3.5rem; border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center; font-size: 1.4rem; }
      .dashboard-card .card-icon.bg-soft { background: rgba(13, 59, 30, 0.08); color: #0d3b1e; }
      .dashboard-card a.text-reset:hover { text-decoration: none; }
    </style>
    <!-- Favicons -->
    <link rel="icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon/favicon-16x16.png">
  </head>

  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/leftbar.php'); ?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="col-12">
            <div class="dashboard-header">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                <div>
                  <h2 class="mb-1">UDUS Admin Dashboard</h2>
                  <p class="text-muted mb-0">Welcome to your UDUS admin panel. Monitor applications, courses, and registered users at a glance.</p>
                </div>
                <div>
                  <a href="all-application.php" class="btn btn-success">View All Applications</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="container-fluid py-4">
            <div class="row g-4">
              <div class="col-lg-4 col-md-6">
                <a href="manage-course.php" class="text-reset text-decoration-none">
                  <div class="card dashboard-card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <?php
                          $sql = mysqli_query($con, "SELECT ID from tblcourse");
                          $cntcourse = mysqli_num_rows($sql);
                        ?>
                        <h3 class="mb-1"><?php echo $cntcourse; ?></h3>
                        <p class="text-muted mb-0">Listed Courses</p>
                      </div>
                      <div class="card-icon bg-soft">
                        <i class="la la-book"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6">
                <a href="user-detail.php" class="text-reset text-decoration-none">
                  <div class="card dashboard-card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <?php
                          $wer = mysqli_query($con, "SELECT ID from tbluser");
                          $cntuser = mysqli_num_rows($wer);
                        ?>
                        <h3 class="mb-1"><?php echo $cntuser; ?></h3>
                        <p class="text-muted mb-0">Registered Users</p>
                      </div>
                      <div class="card-icon bg-soft">
                        <i class="la la-users"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6">
                <a href="all-application.php" class="text-reset text-decoration-none">
                  <div class="card dashboard-card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <?php
                          $ter = mysqli_query($con, "SELECT ID from tbladmapplications");
                          $cntapp = mysqli_num_rows($ter);
                        ?>
                        <h3 class="mb-1"><?php echo $cntapp; ?></h3>
                        <p class="text-muted mb-0">Total Applications</p>
                      </div>
                      <div class="card-icon bg-soft">
                        <i class="la la-file-alt"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6">
                <a href="pending-application.php" class="text-reset text-decoration-none">
                  <div class="card dashboard-card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <?php
                          $rtp = mysqli_query($con, "SELECT ID from tbladmapplications where AdminStatus is null");
                          $penapp = mysqli_num_rows($rtp);
                        ?>
                        <h3 class="mb-1"><?php echo $penapp; ?></h3>
                        <p class="text-muted mb-0">Pending Applications</p>
                      </div>
                      <div class="card-icon bg-soft">
                        <i class="la la-clock"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6">
                <a href="selected-application.php" class="text-reset text-decoration-none">
                  <div class="card dashboard-card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <?php
                          $yui = mysqli_query($con, "SELECT ID from tbladmapplications where AdminStatus='1'");
                          $selapp = mysqli_num_rows($yui);
                        ?>
                        <h3 class="mb-1"><?php echo $selapp; ?></h3>
                        <p class="text-muted mb-0">Selected Applications</p>
                      </div>
                      <div class="card-icon bg-soft">
                        <i class="la la-check-circle"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6">
                <a href="rejected-application.php" class="text-reset text-decoration-none">
                  <div class="card dashboard-card h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                      <div>
                        <?php
                          $poi = mysqli_query($con, "SELECT ID from tbladmapplications where AdminStatus='2'");
                          $rejapp = mysqli_num_rows($poi);
                        ?>
                        <h3 class="mb-1"><?php echo $rejapp; ?></h3>
                        <p class="text-muted mb-0">Rejected Applications</p>
                      </div>
                      <div class="card-icon bg-soft">
                        <i class="la la-times-circle"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <?php include('includes/footer.php'); ?>
  </body>

  </html>
<?php } ?>