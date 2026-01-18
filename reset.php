<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('includes/config.php'); // Include the database configuration
if (isset($_SESSION['alogin'])) {

	header('location:index.php');
}

// Include PHPMailer files manually
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Clean the email input
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'>alert('Invalid email address.');</script>";
    } else {
        // Fetch user details from the database
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $name = htmlspecialchars($user['name']); // Sanitize the name
            $token = bin2hex(random_bytes(32)); // Secure token generation
            $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

            // Insert the token into the password_resets table
            $sql = "INSERT INTO password_resets (email, token, expiry) VALUES (:email, :token, :expiry)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':token', $token, PDO::PARAM_STR);
            $query->bindParam(':expiry', $expiry, PDO::PARAM_STR);
            $query->execute();

            // Prepare the reset link
            $resetLink = "http://bdtoolbd.xyz/new_password.php?token=$token";

            // Send the email using PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'mail.bdtoolbd.xyz'; // Replace with your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'no-reply@bdtoolbd.xyz'; // SMTP username
                $mail->Password = 'Robi2034@#'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('no-reply@bdtoolbd.xyz', 'BD TOOL BD');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = "Password Reset Request";

                // Enhanced email content with personalized name
                $mail->Body = "
                <!DOCTYPE html>
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            line-height: 1.6;
                            margin: 0;
                            padding: 0;
                            background-color: #f9f9f9;
                        }
                        .email-container {
                            max-width: 600px;
                            margin: 20px auto;
                            background-color: #ffffff;
                            border: 1px solid #ddd;
                            border-radius: 8px;
                            overflow: hidden;
                        }
                        .email-header {
                            background-color: #007bff;
                            color: #ffffff;
                            text-align: center;
                            padding: 20px;
                        }
                        .email-header img {
                            max-height: 50px;
                        }
                        .email-body {
                            padding: 20px;
                        }
                        .email-body h1 {
                            font-size: 20px;
                            color: #333333;
                        }
                        .email-body p {
                            font-size: 16px;
                            color: #555555;
                        }
                        .email-footer {
                            background-color: #f1f1f1;
                            text-align: center;
                            padding: 10px;
                            font-size: 14px;
                            color: #777777;
                        }
                        .email-footer a {
                            color: #007bff;
                            text-decoration: none;
                        }
                        .btn {
                            display: inline-block;
                            background-color: #007bff;
                            color: #ffffff;
                            padding: 10px 20px;
                            text-align: center;
                            border-radius: 5px;
                            text-decoration: none;
                            margin-top: 10px;
                        }
                    </style>
                </head>
                <body>
                    <div class='email-container'>
                        <div class='email-header'>
                            <img src='https://bdtoolbd.xyz/logo.png' alt='BD TOOL BD'>
                            <h2>Password Reset</h2>
                        </div>
                        <div class='email-body'>
                            <h1>Hello $name!</h1>
                            <p>We received a request to reset your password. Please click the button below to reset your password:</p>
                            <p>
                                <a href='$resetLink' class='btn'>Reset Password</a>
                            </p>
                            <p>If you did not request this password reset, please ignore this email.</p>
                        </div>
                        <div class='email-footer'>
                            <p>&copy; " . date('Y') . " BD TOOL BD. All rights reserved.</p>
                            <p><a href='https://bdtoolbd.xyz'>Visit our website</a></p>
                        </div>
                    </div>
                </body>
                </html>
                ";

                $mail->AltBody = "Hello $name,\n\nWe received a request to reset your password. Please use the link below:\n$resetLink\n\nIf you did not request this password reset, please ignore this email.";

                $mail->send();
                echo "<script type='text/javascript'>alert('A reset link has been sent to your email.');</script>";
            } catch (Exception $e) {
                echo "<script type='text/javascript'>alert('Email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('No account found with this email.');</script>";
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
    <script>
        !function () {
            var e, t, n, a;
            window.MyAliceWebChat || ((t = document.createElement("div")).id = "myAliceWebChat", 
            (n = document.createElement("script")).type = "text/javascript", 
            n.async = !0, 
            n.src = "https://widget.myalice.ai/index.js", 
            (a = (e = document.body.getElementsByTagName("script"))[e.length - 1]).parentNode.insertBefore(n, a), 
            a.parentNode.insertBefore(t, a), 
            n.addEventListener("load", (function () {
                MyAliceWebChat.init({
                    selector: "myAliceWebChat",
                    number: "Sakib76255",
                    message: "",
                    color: "#2AABEE",
                    channel: "tg",
                    boxShadow: "none",
                    text: "Message Us",
                    theme: "light",
                    position: "right",
                    mb: "20px",
                    mx: "20px",
                    radius: "20px"
                })
            })));
        }();
    </script>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="assets/images/logos/dark-logo.png" width="180" alt="Logo">
                                </a>
                                <h2 class="text-center">Reset Password</h2>
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Send Reset Link</button>
                                    <div class="d-flex align-items-center justify-content-center mt-3">
                                        <a href="login.php" class="text-primary fw-bold">Back to Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
