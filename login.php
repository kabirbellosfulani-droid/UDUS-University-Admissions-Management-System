<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
  $adminuser = $_POST['username'];
  $password = md5($_POST['password']);
  $query = mysqli_query($con, "select ID from tbladmin where  AdminuserName='$adminuser' && Password='$password' ");
  $ret = mysqli_fetch_array($query);
  if ($ret > 0) {
    $_SESSION['aid'] = $ret['ID'];
    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
  } else {
    echo "<script>alert('Invalid Details');</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UDUS LMS - Admin Login</title>
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  
  <!-- Favicons -->
  <link rel="icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon" />
</head>

<body class="bg-light">

  <!-- Simple Navbar for Admin Pages -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
      <a class="navbar-brand" href="../index.php">
        <span class="text-warning">UDUS</span> LMS
      </a>
      <a href="../index.php" class="btn btn-outline-light">Back to Home</a>
    </div>
  </nav>

  <!-- Page Header -->
  <section class="py-5" style="background: linear-gradient(rgba(26, 60, 94, 0.85), rgba(26, 60, 94, 0.85)), url('../assets/images/univesity.PNG'); background-size: cover; background-position: center;">
    <div class="container py-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php" class="text-white">Home</a></li>
          <li class="breadcrumb-item active text-warning" aria-current="page">Admin Login</li>
        </ol>
      </nav>
      <h1 class="text-white mb-0" data-aos="fade-up">BILYA SANDAGATE - USMANU DANFODIYO UNIVERSITY, SOKOTO</h1>
      <p class="text-white-50" data-aos="fade-up">Administrator Portal Login</p>
    </div>
  </section>

  <!-- Login Form Section -->
  <section class="py-5">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-5" data-aos="fade-up">
          <div class="card shadow-lg border-0">
            <div class="card-body p-5">
              <div class="text-center mb-4">
                <h3 class="section-title">Admin Login</h3>
                <p class="text-muted">Access the administration portal</p>
              </div>

              <form class="form-horizontal" action="" name="login" method="post">
                <div class="form-group mb-3">
                  <label class="form-label">Username</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label class="form-label">Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                  </div>
                </div>

                <div class="d-grid gap-2 mt-4">
                  <button type="submit" name="login" class="btn btn-custom-primary btn-lg">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                  </button>
                </div>

                <div class="row mt-4">
                  <div class="col-6">
                    <p><a href="forget-password.php" class="text-decoration-none">Forgot password?</a></p>
                  </div>
                  <div class="col-6 text-end">
                    <p><a href="../index.php" class="text-decoration-none">Back Home</a></p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Simple Footer -->
  <footer class="footer-custom py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0">Copyright &copy; <?php echo date('Y'); ?> UDUS LMS. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AOS Animation JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <script>
    // Initialize AOS
    AOS.init({
      duration: 800,
      once: true
    });
  </script>

</body>

</html>