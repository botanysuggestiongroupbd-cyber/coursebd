<?php 
session_start();
require_once("includes/db.php"); // Update with your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tin = mysqli_real_escape_string($link, $_POST['tin']); // Fetch TIN from POST request
    $userId = $_SESSION['user_id']; // Ensure the user is logged in and has a session

    if (empty($tin)) {
        $_SESSION['Error'] = "TIN number is required.";
        header("Location: tin_info.php");
        exit;
    }

    // Check user's balance
    $query = "SELECT balance FROM users WHERE id = '$userId'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $balance = $user['balance'];

        // Fetch the price for TIN service
        $priceQuery = "SELECT cc_tin_price FROM control WHERE id = '1'";
        $priceResult = mysqli_query($link, $priceQuery);
        $price = 0;

        if ($priceResult && mysqli_num_rows($priceResult) > 0) {
            $priceRow = mysqli_fetch_assoc($priceResult);
            $price = $priceRow['cc_tin_price'];
        }

        // Check if the user has enough balance
        if ($balance >= $price) {
            // Deduct balance
            $newBalance = $balance - $price;
            $updateBalanceQuery = "UPDATE users SET balance = '$newBalance' WHERE id = '$userId'";
            if (mysqli_query($link, $updateBalanceQuery)) {
                // Insert request into the database
                $orderTime = date('Y-m-d H:i:s');
                $status = 1; // Successful
                $note = ''; // Optional
                $totalDownload = 0; // Default value
                $url = ''; // Not applicable initially
                $deliveryTime = null; // Assuming no delivery time initially

                $insertQuery = "INSERT INTO tin_requests (user_id, tin_number, order_time, note, status, total_download, url, delivery_time) 
                                VALUES ('$userId', '$tin', '$orderTime', '$note', '$status', '$totalDownload', '$url', NULL)";

                if (mysqli_query($link, $insertQuery)) {
                    $_SESSION['Success'] = "TIN request submitted successfully!";
                    header("Location: tin_info.php");
                    exit;
                } else {
                    $_SESSION['Error'] = "Failed to save TIN request. Error: " . mysqli_error($link);
                }
            } else {
                $_SESSION['Error'] = "Failed to update user balance. Error: " . mysqli_error($link);
            }
        } else {
            $_SESSION['Error'] = "Insufficient balance. Please recharge and try again.";
        }
    } else {
        $_SESSION['Error'] = "Unable to fetch user balance.";
    }
} else {
    $_SESSION['Error'] = "Invalid request method.";
}

header("Location: tin_info.php"); // Redirect back to the form page
exit;
?>
