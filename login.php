<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_SESSION['alogin'])) {

	header('location:index.php');
}

if (isset($_POST['login'])) {
	$status = '1';
	$email = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "SELECT email,password FROM users WHERE email=:email and password=:password and status=(:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['alogin'] = $_POST['username'];
		echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
	} else {

		echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";
	}
}

?>


<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>অনলাইন দোকান</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link href="assets/bensen/stylesheet.css" rel="stylesheet">
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  
  
  
 <!-- <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="3331cc06-3609-48c9-957c-d4ddea89c772";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
  
  -->
  
  
  
  
  
</head>

<body>
    
    
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="assets/images/logos/dark-logo.png" width="180" alt="">
                </a>
                <p class="text-center"></p>
                <form method="POST" >
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ইউজারনেম/ইমেইল</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">পাসওয়ার্ড</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    <br>
                     <a href="reset.php" class="text-primary">পাসওয়ার্ড ভুলে গেছেন?</a>
                  </div>
                  

                  <button type="submit" name="login" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">একাউন্ট নেই?</p>
                    <a class="text-primary fw-bold ms-2" href="register.php">নতুন একাউন্ট তৈরি করুন</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  document.addEventListener("DOMContentLoaded", () => {
    const usernameField = document.querySelector('input[name="username"]');
    const passwordField = document.querySelector('input[name="password"]');
    const loginButton = document.querySelector('button[name="login"]');

    function toggleButtonState() {
      if (usernameField.value.trim() && passwordField.value.trim()) {
        loginButton.disabled = false;
      } else {
        loginButton.disabled = true;
      }
    }

    usernameField.addEventListener("input", toggleButtonState);
    passwordField.addEventListener("input", toggleButtonState);

    // Initial check
    toggleButtonState();
  });
</script>

  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>