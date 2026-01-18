<?php 
session_start();
error_reporting(0);
require_once("includes/db.php"); // Ensure this file contains the correct DB connection

// Check if the user is logged in by verifying session
if (!isset($_SESSION['user_id'])) {
    die("ইমেইল পাওয়া যায়নি। দয়া করে লগইন করুন.");
}

// Fetch user_id and email from session
$user_id = (int) $_SESSION['user_id']; // Cast to integer for use in SQL
$user_email = $_SESSION['alogin']; // Email stored in session

// Fetch SMS rate and service status from the database
$query = "SELECT rate, service_status FROM sms_settings WHERE id = 1";
$result = mysqli_query($link, $query);

// Check if the SMS settings are fetched
if ($result && mysqli_num_rows($result) > 0) {
    $config = mysqli_fetch_assoc($result);
    $sms_rate = $config['rate'];
    $service_status = $config['service_status'];
} else {
    die("Error fetching SMS configuration: " . mysqli_error($link));
}

// Define the balance deduction constant
define('BALANCE_DEDUCTION', $sms_rate);

// Fetch blocked words from the database
$blocked_query = "SELECT word FROM blocked_words";
$blocked_result = mysqli_query($link, $blocked_query);

$blocked_words = [];
if ($blocked_result && mysqli_num_rows($blocked_result) > 0) {
    while ($row = mysqli_fetch_assoc($blocked_result)) {
        $blocked_words[] = $row['word'];
    }
}

// Check user balance
$user_balance_query = "SELECT balance FROM users WHERE id = $user_id";
$user_balance_result = mysqli_query($link, $user_balance_query);

if ($user_balance_result && mysqli_num_rows($user_balance_result) > 0) {
    $user_data = mysqli_fetch_assoc($user_balance_result);
    $user_balance = $user_data['balance'];
} else {
    die("ব্যবহারকারীর তথ্য লোড করতে ব্যর্থ হয়েছে: " . mysqli_error($link));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['phone'];
    $message = $_POST['message'];

    // Validate the message for blocked words
    foreach ($blocked_words as $blocked_word) {
        if (stripos($message, $blocked_word) !== false) {
            $_SESSION['Error'] = "আপনার বার্তায় নিষিদ্ধ শব্দ পাওয়া গেছে: '$blocked_word'";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }
    }

    // Check if the service is active
    if ($service_status == 0) {
        $error_message = "সেবা বর্তমানে বন্ধ রয়েছে। দয়া করে পরে আবার চেষ্টা করুন।";
    } elseif ($user_balance < BALANCE_DEDUCTION) {
        // Check user balance
        $_SESSION['Error'] = "আপনার পর্যাপ্ত ব্যালেন্স নেই এসএমএস পাঠানোর জন্য।";
    } else {
        // Format the Bangladesh country code for phone number
        $full_number = '+880' . ltrim($number, '0');

        // API Request parameters
        $parameters = [
            'message' => $message,
            'mobile_number' => $full_number,
            'device' => '17235ae5d10cd037',
        ];

        $header = [
            'apikey: YTGPWEPZ6ZTWQYEA7O6XKR8K49PQNXKZY6HHI7ED'
        ];

        $url = 'http://bulksms.my.id/api/v1/sms/send';

        // cURL request to send SMS
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if ($result === false) {
            $error_message = "SMS পাঠাতে ব্যর্থ হয়েছে: " . curl_error($ch);
        }
        curl_close($ch);

        // If SMS was sent successfully, log it to the database
        if (!$error_message) {
            // Log SMS data to the sms_transactions table
            $log_query = "INSERT INTO sms_transactions (email, phone_number, message, sent_at) 
                          VALUES ('$user_email', '$number', '$message', NOW())";
            if (!mysqli_query($link, $log_query)) {
                die("Error logging SMS: " . mysqli_error($link));
            }

            $_SESSION['Success'] = "এসএমএস পাঠানো হয়েছে।";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <?php include("includes/html-header.php"); ?>
</head>
<body>
     <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php
        // Include sidebar
        require_once("includes/sidebar.php");
        ?>

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <?php
            // Include header
            require_once("includes/header.php");
            ?>

            <div class="container-fluid">
                <!-- notice -->
                <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                    <?php $se = "SELECT * FROM notice";
                    $data = mysqli_query($link, $se);
                    $d = mysqli_fetch_assoc($data);
                    echo $d['notice']; ?>
                </marquee>
                <!-- notice end -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4 text-center">কাস্টম এসএমএস পাঠান</h5>

                        <!-- Display success or error messages -->
                        <?php
                        if (isset($_SESSION['Error'])) {
                            echo '<div class="alert alert-danger">' . $_SESSION['Error'] . '</div>';
                            unset($_SESSION['Error']);
                        } elseif (isset($_SESSION['Success'])) {
                            echo '<div class="alert alert-success">' . $_SESSION['Success'] . '</div>';
                            unset($_SESSION['Success']);
                        } elseif (isset($error_message)) {
                            echo '<div class="alert alert-danger">' . $error_message . '</div>';
                        }
                        ?>

                        <!-- SMS Form -->
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">ফোন নাম্বার লিখুন</label>
                                <input type="text" class="form-control" placeholder="019xxxxxxxx" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">এসএমএস বার্তা</label>
                                <textarea class="form-control" rows="4" name="message" required></textarea>
                            </div>

                            <!-- Submit button or service off message -->
                            <?php if ($service_status == 0): ?>
                                <div class="alert alert-warning">সেবা বর্তমানে বন্ধ রয়েছে। দয়া করে পরে আবার চেষ্টা করুন।</div>
                            <?php else: ?>
                                <button type="submit" class="btn btn-primary text-center mb-2 d-block mx-auto">
                                    এসএমএস পাঠান
                                </button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS files -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>
</html>
