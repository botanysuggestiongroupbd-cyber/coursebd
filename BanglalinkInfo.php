<?php
// Start session
session_start();

// Include necessary files for database connection
require_once("includes/db.php");

// Define balance deduction amount
define('BALANCE_DEDUCTION', 10);

function getUserBalance($userId, $link) {
    $query = "SELECT balance FROM users WHERE id = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($balance);
    $stmt->fetch();
    $stmt->close();
    return $balance;
}

function getRetailerInfo($number) {
    $apiUrl = "https://api-store.top/location/msisdn.php?msisdn=" . urlencode($number);

    // Initialize CURL request to fetch the retailer info
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function deductBalance($userId, $amount, $link) {
    $query = "UPDATE users SET balance = balance - ? WHERE id = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("ii", $amount, $userId);
    return $stmt->execute();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['number'])) {
    $number = $_POST['number'];
    $userId = $_SESSION['user_id'];

    // Check user's balance
    $currentBalance = getUserBalance($userId, $link);

    if ($currentBalance >= BALANCE_DEDUCTION) {
        // Get retailer information from the API
        $retailerInfo = getRetailerInfo($number);

        if ($retailerInfo) {
            // Deduct balance if request is successful
            if (deductBalance($userId, BALANCE_DEDUCTION, $link)) {
                $_SESSION['Success'] = "অনুসন্ধান সফল হয়েছে। আপনার অ্যাকাউন্ট থেকে 10 টাকা কাটা হয়েছে।";
                $_SESSION['RetailerInfo'] = $retailerInfo;
            } else {
                $_SESSION['Error'] = "ব্যালেন্স কেটে নেওয়া যায়নি। দয়া করে আবার চেষ্টা করুন।";
            }
        } else {
            $_SESSION['Error'] = "অনুসন্ধান সফল হয়নি। দয়া করে আবার চেষ্টা করুন।";
        }
    } else {
        $_SESSION['Error'] = "আপনার পর্যাপ্ত পরিমাণ ব্যালেন্স নাই, প্লিজ রিচার্জ করুন।";
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <?php include("includes/html-header.php"); ?>
</head>
<body>
    <script>!function(){var e,t,n,a;window.MyAliceWebChat||((t=document.createElement("div")).id="myAliceWebChat",(n=document.createElement("script")).type="text/javascript",n.async=!0,n.src="https://widget.myalice.ai/index.js",(a=(e=document.body.getElementsByTagName("script"))[e.length-1]).parentNode.insertBefore(n,a),a.parentNode.insertBefore(t,a),n.addEventListener("load",(function(){MyAliceWebChat.init({selector:"myAliceWebChat",number:"Sakib76255",message:"",color:"#2AABEE",channel:"tg",boxShadow:"none",text:"Message Us",theme:"light",position:"right",mb:"20px",mx:"20px",radius:"20px"})})))}();</script> 
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php include("includes/sidebar.php"); ?>

        <div class="body-wrapper">
            <?php include("includes/header.php"); ?>

            <div class="container-fluid">
                <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                    <?php
                    $noticeQuery = "SELECT * FROM notice";
                    $noticeResult = mysqli_query($link, $noticeQuery);
                    $notice = mysqli_fetch_assoc($noticeResult);
                    echo $notice['notice'];
                    ?>
                </marquee>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4 text-center">বাংলালিংক নম্বর অবস্থান অনুসন্ধান</h5>
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if (isset($_SESSION['Error'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['Error'] . '</div>';
                                    unset($_SESSION['Error']);
                                } elseif (isset($_SESSION['Success'])) {
                                    echo '<div class="alert alert-success">' . $_SESSION['Success'] . '</div>';
                                    unset($_SESSION['Success']);
                                }
                                ?>

                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label class="form-label">বাংলালিংক নম্বর লিখুন</label>
                                        <input type="text" class="form-control" placeholder="019xxxxxxxx" name="number" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary text-center mb-2 d-block mx-auto">
                                        অনুসন্ধান করুন
                                    </button>
                                </form>

                                <?php if (isset($_SESSION['RetailerInfo'])): ?>
                                    <div class="mt-4">
                                        <h5>অবস্থান সংক্রান্ত তথ্য</h5>
                                        <ul>
                                            <?php foreach ($_SESSION['RetailerInfo'] as $key => $value): ?>
                                                <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($value) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php unset($_SESSION['RetailerInfo']); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
