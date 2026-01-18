<?php
// Start session
session_start();

// Include necessary files for database connection
require_once("includes/db.php");

// Define balance deduction amount
define('BALANCE_DEDUCTION', 0);

// Function to simulate BIN lookup and balance deduction (similar to your original example)
function deductBalance($userId, $amount, $link) {
    // Assume balance is stored in the 'users' table in a 'balance' column
    $query = "UPDATE users SET balance = balance - ? WHERE id = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("ii", $amount, $userId);
    return $stmt->execute();
}

// Handle form submission if needed for the BIN generator (optional logic)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['number'])) {
    $number = $_POST['number'];
    $userId = $_SESSION['user_id'];  // Assuming user ID is stored in session

    // Simulate balance deduction on BIN number submission (if required)
    if (deductBalance($userId, BALANCE_DEDUCTION, $link)) {
        $_SESSION['Success'] = "Successfully deducted balance for BIN search.";
    } else {
        $_SESSION['Error'] = "Error in balance deduction.";
    }
}
?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/674086e42480f5b4f5a2784b/1ida0trm1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!DOCTYPE html>
<html lang="bn">
<head>
    <?php include("includes/html-header.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <style>
        .card-info {
            margin-bottom: 15px;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .copy-btn {
            cursor: pointer;
            margin-left: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php include("includes/sidebar.php"); ?>
        <div class="body-wrapper">
            <?php include("includes/header.php"); ?>

            <div class="container-fluid">
                <!-- Display notice -->
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
                        <h5 class="card-title fw-semibold mb-4 text-center">BIN CC Generator</h5>
                        <div class="card">
                            <div class="card-body">
                                <!-- Display success or error message -->
                                <?php
                                if (isset($_SESSION['Error'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['Error'] . '</div>';
                                    unset($_SESSION['Error']);
                                } elseif (isset($_SESSION['Success'])) {
                                    echo '<div class="alert alert-success">' . $_SESSION['Success'] . '</div>';
                                    unset($_SESSION['Success']);
                                }
                                ?>

                                <!-- BIN generator form -->
                                <div class="container">
                                    <input type="text" id="bin-input" placeholder="Enter BIN Number" class="form-control mb-3">
                                    <button id="generate-btn" class="btn btn-primary w-100">Generate Cards</button>
                                </div>
                                <div id="result" class="result mt-4">
                                    <!-- Generated card information will appear here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS files -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>

    <script>
        document.getElementById('generate-btn').addEventListener('click', function() {
            const bin = document.getElementById('bin-input').value;
            if (bin) {
                let cardsHtml = '';
                for (let i = 0; i < 10; i++) {
                    const cardNumber = `${bin}${Math.floor(Math.random() * 100000000000)}`.slice(0, 16);
                    const cvv = Math.floor(Math.random() * 900) + 100;
                    const expiryDate = `${Math.floor(Math.random() * 12) + 1}/${new Date().getFullYear() + 3}`;

                    cardsHtml += `
                        <div class="card-info">
                            <p>Card Number: <strong>${cardNumber}</strong> <button class="copy-btn" data-clipboard-text="${cardNumber}">📋</button></p>
                            <p>CVV: <strong>${cvv}</strong> <button class="copy-btn" data-clipboard-text="${cvv}">📋</button></p>
                            <p>Expiry Date: <strong>${expiryDate}</strong> <button class="copy-btn" data-clipboard-text="${expiryDate}">📋</button></p>
                        </div>
                    `;
                }
                document.getElementById('result').innerHTML = cardsHtml;

                // Add copy functionality
                new ClipboardJS('.copy-btn');
            } else {
                alert('Please enter a BIN number.');
            }
        });
    </script>
</body>
</html>
