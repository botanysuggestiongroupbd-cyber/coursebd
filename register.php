<?php
session_start();
error_reporting(0);

include('includes/config.php');

// Check if registration is disabled
$stmt = $dbh->prepare('SELECT * FROM control WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$id = 1;
$stmt->execute();

$data = $stmt->fetch(PDO::FETCH_ASSOC);
$status = $data['reg'];

if($status == 1){
    header('Location: regoff.php');
    die();
}

// Redirect if already logged in
if (strlen($_SESSION['alogin']) == 0) {
    // header('location:index.php');
} else {
    header('Location: nid.php');
}

if (isset($_POST['submit'])) {
    $recaptchaSecret = "6LfRZ9gqAAAAAAxesrj1nq1AvuyMNk-G3mnhb3Jt"; // Replace with your Secret Key
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $recaptchaVerify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $responseData = json_decode($recaptchaVerify);

    if (!$responseData->success) {
        echo "<script>alert('reCAPTCHA verification failed. Please try again.');</script>";
    } else {
        // Proceed with the registration process
        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $password = trim($_POST['password']);
        $mobileno = trim($_POST['mobileno']);

        if (empty($name) || empty($email) || empty($password) || empty($mobileno)) {
            echo "<script>alert('All fields are required.');</script>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email address.');</script>";
        } elseif (strlen($mobileno) < 11) {
            echo "<script>alert('Invalid mobile number.');</script>";
        } else {
            $password = md5($password);
            $gender = "male";
            $image = "image.png";

            // Check if email or mobile exists
            $sql = "SELECT * FROM users WHERE email = :email OR mobile = :mobileno";
            $query = $dbh->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
            $query->execute();
            $userExists = $query->fetch(PDO::FETCH_ASSOC);

            if ($userExists) {
                echo "<script>alert('Account already exists with this email or mobile number. Please login.');</script>";
            } else {
                // Insert new user
                $sql = "INSERT INTO users(name, email, password, gender, mobile, image, status) 
                        VALUES(:name, :email, :password, :gender, :mobileno, :image, 1)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
                $query->bindParam(':gender', $gender, PDO::PARAM_STR);
                $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
                $query->bindParam(':image', $image, PDO::PARAM_STR);
                $query->execute();

                if ($dbh->lastInsertId()) {
                    echo "<script>alert('Registration Successful!');</script>";
                    echo "<script>window.location.href = 'login.php';</script>";
                } else {
                    echo "<script>alert('Something went wrong. Please try again.');</script>";
                }
            }
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICT BANGLADESH</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link rel="stylesheet" href="assets/bensen/stylesheet.css" />
     <link href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@100..800&display=swap" rel="stylesheet">
  
</head>
 <style>
        /* Apply the font globally */
        body {
            font-family: 'Anek Bangla', sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
         </style>
<body>
    
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="assets/images/logos/logo.png" width="180" alt="">
                                </a>
                                <p class="text-center"></p>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">নামঃ</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ইমেইলঃ</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">পাসওয়ার্ডঃ</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">মোবাইল নাম্বারঃ</label>
                                        <input type="number" name="mobileno" class="form-control" min="11" required>
                                    </div>
                                    <div class="mb-3 text-center">
    <div class="g-recaptcha" data-sitekey="6LfRZ9gqAAAAAOMGCYdDlXaVBzU11OieGvQGTqY4"></div>
</div>

                                    <button type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">সাইন আপ</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">একাউন্ট আছে?</p>
                                        <a class="text-primary fw-bold ms-2" href="login.php">লগ ইন করুন।</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
