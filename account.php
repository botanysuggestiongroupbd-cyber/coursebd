<?php
require_once("includes/html-header.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// User session information
$email = $_SESSION['alogin'];
$sql = "SELECT * FROM users WHERE email = (:email)";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);

$_SESSION['user_id'] = $result->id;
$currentBalance = $result->balance;

// Get control values
$controlQuery = "SELECT * FROM control";
$controlResult = mysqli_query($link, $controlQuery);
$controlData = mysqli_fetch_assoc($controlResult);
$canvaPrice = $controlData['cc_canva_price'];
$ytPrice = $controlData['cc_yt_price'];
$ccAcControl = $controlData['cc_acc_control']; // New control value for service

// Generate unique sequential ID
function generateOrderId($link) {
    $query = "SELECT MAX(id) as max_id FROM accopy_sub";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $lastId = $row['max_id'] ?? 0;
    return $lastId + 1;
}

if (isset($_POST['submit'])) {
    $selectedService = $_POST['service'];
    $price = ($selectedService == 'Canva Premium') ? $canvaPrice : $ytPrice;

    if ($currentBalance < $price) {
        $_SESSION['Error'] = "আপনার পর্যাপ্ত পরিমাণ ব্যালেন্স নাই, প্লিজ রিচার্জ করুন।";
    } else {
        $emailInput = mysqli_real_escape_string($link, $_POST['email']);
        $csrfPost = mysqli_real_escape_string($link, $_POST['csrf']);
        $orderTime = date("Y-m-d H:i:s"); // Current datetime in the correct format

        if ($_SESSION['csrf'] == $csrfPost) {
            $newId = generateOrderId($link);

            $insertQuery = "INSERT INTO accopy_sub (id, sub_type, email, Sub_by, date_flt) 
                            VALUES (:id, :service, :email, :user, :date_flt)";
            $user = $_SESSION['alogin'];

            $insertStmt = $dbh->prepare($insertQuery);
            $insertStmt->bindParam(':id', $newId, PDO::PARAM_INT);
            $insertStmt->bindParam(':service', $selectedService, PDO::PARAM_STR);
            $insertStmt->bindParam(':email', $emailInput, PDO::PARAM_STR);
            $insertStmt->bindParam(':user', $user, PDO::PARAM_STR);
            $insertStmt->bindParam(':date_flt', $orderTime, PDO::PARAM_STR);
            $insertStmt->execute();

            $balanceUpdateQuery = "UPDATE `users` SET `balance` = balance - $price WHERE `users`.`email` = (:email)";
            $balanceUpdateStmt = $dbh->prepare($balanceUpdateQuery);
            $balanceUpdateStmt->bindParam(':email', $email, PDO::PARAM_STR);
            $balanceUpdateStmt->execute();

            // Send Telegram Notification
            $telegramQuery = "SELECT * FROM telegram_settings LIMIT 1";
            $telegramResult = mysqli_query($link, $telegramQuery);
            $telegramData = mysqli_fetch_assoc($telegramResult);

            if ($telegramData) {
                $botToken = $telegramData['bot_token'];
                $adminChatId = $telegramData['admin_chat_id'];
                $telegramMessage = urlencode(
                    "নতুন Premium Account অর্ডার সফল হয়েছে।" .
                    "\nঅর্ডার আইডিঃ $newId" .
                    "\nসেবা: $selectedService" .
                    "\nইমেইল: $emailInput" .
                    "\nসময়ঃ $orderTime" .
                    "\nবর্তমান ব্যালেন্স: $currentBalance"
                );

                $telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$adminChatId&text=$telegramMessage";
                file_get_contents($telegramUrl);
            }

            $_SESSION['Success'] = "অর্ডার সফল হয়েছে।";
        }
    }
}

$csrf = md5(rand(1111, 99990));
$_SESSION['csrf'] = $csrf;
?>

<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?php require_once("includes/sidebar.php"); ?>
    <div class="body-wrapper">
        <?php require_once("includes/header.php"); ?>

        <div class="container-fluid">
            <!-- Notice -->
            <marquee class="alert alert-dark text-white" onmouseover="this.stop()" onmouseout="this.start()" role="alert">
                <?php 
                $noticeQuery = "SELECT * FROM notice";
                $noticeResult = mysqli_query($link, $noticeQuery);
                $noticeData = mysqli_fetch_assoc($noticeResult);
                echo $noticeData['notice']; 
                ?>
            </marquee>
            <!-- Notice End -->

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">সেবা নির্বাচন করুন</h5>
                    <?php if ($ccAcControl == 1) { ?>
                        <form method="POST">
                            <?php if (isset($_SESSION['Error'])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION['Error']; $_SESSION['Error'] = null; ?></div>
                            <?php } elseif (isset($_SESSION['Success'])) { ?>
                                <div class="alert alert-success"><?php echo $_SESSION['Success']; $_SESSION['Success'] = null; ?></div>
                            <?php } ?>
                            <div class="mb-3 text-center">
                                <label class="form-label">সেবা নির্বাচন করুন</label><br>
                                <label><input type="radio" name="service" value="Canva Premium" required> Canva Premium (৳<?php echo $canvaPrice; ?>)</label><br>
                                <label><input type="radio" name="service" value="YouTube Premium" required> YouTube Premium (৳<?php echo $ytPrice; ?>)</label>
                            </div>
                            <div class="mb-3 text-center">
                                <label class="form-label">ইমেইল</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <input type="hidden" name="csrf" value="<?php echo $csrf; ?>">
                            <div class="mb-3 text-center">
                                <button type="submit" name="submit" class="btn btn-primary">অর্ডার করুন</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <p class="text-center text-danger">সেবা বন্ধ রয়েছে</p>
                    <?php } ?>
                </div>
            </div>

            <!-- Order History -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">অর্ডার ইতিহাস</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>অর্ডার আইডি</th>
                                <th>সেবা</th>
                                <th>ইমেইল</th>
                                <th>তারিখ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $orderQuery = "SELECT * FROM accopy_sub WHERE Sub_by = (:email)";
                            $orderStmt = $dbh->prepare($orderQuery);
                            $orderStmt->bindParam(':email', $email, PDO::PARAM_STR);
                            $orderStmt->execute();
                            $orders = $orderStmt->fetchAll(PDO::FETCH_OBJ);

                            foreach ($orders as $order) {
                                echo "<tr>
                                    <td>{$order->id}</td>
                                    <td>{$order->sub_type}</td>
                                    <td>{$order->email}</td>
                                    <td>{$order->date_flt}</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
