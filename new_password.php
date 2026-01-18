<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['alogin'])) {

	header('location:index.php');
}

if (!isset($_GET['token'])) {
    echo "<h1 style='text-align:center; color:red;'>Service Not Found</h1>";
    exit;
}

if (isset($_GET['token']) && isset($_POST['submit'])) {
    $token = $_GET['token'];
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if ($password !== $confirmPassword) {
        echo "<script type='text/javascript'>alert('Passwords do not match.');</script>";
    } else {
        $sql = "SELECT * FROM password_resets WHERE token = :token AND expiry > NOW()";
        $query = $dbh->prepare($sql);
        $query->bindParam(':token', $token, PDO::PARAM_STR);
        $query->execute();
        $reset = $query->fetch(PDO::FETCH_ASSOC);

        if ($reset) {
            $hashedPassword = md5($password);

            $sql = "UPDATE users SET password = :password WHERE email = :email";
            $query = $dbh->prepare($sql);
            $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $query->bindParam(':email', $reset['email'], PDO::PARAM_STR);
            $query->execute();

            $sql = "DELETE FROM password_resets WHERE email = :email";
            $query = $dbh->prepare($sql);
            $query->bindParam(':email', $reset['email'], PDO::PARAM_STR);
            $query->execute();

            echo "<script type='text/javascript'>alert('Password updated successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        } else {
            echo "<script type='text/javascript'>alert('Invalid or expired token.');</script>";
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Free Service</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link href="assets/bensen/stylesheet.css" rel="stylesheet">
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" 
       data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="assets/images/logos/dark-logo.png" width="180" alt="">
                </a>
                <h2 class="text-center">New Password</h2>
                <form method="POST">
                  <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                    Reset Password
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
