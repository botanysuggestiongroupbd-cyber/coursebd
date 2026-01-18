<?php
// Include header and sidebar
require_once("includes/html-header.php");
?>

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
                 <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                <?php $se = "SELECT * FROM notice";
                $data = mysqli_query($link, $se);
                $d = mysqli_fetch_assoc($data);
                echo $d['notice']; ?>
            </marquee>
                <!-- Facebook Likes Submission Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">Tiktok Likes Submission</h5>

                        <?php
                        // Include API configuration file
                        include 'fb_api_config.php';

                        // Minimum and maximum amount for likes
                        $min_amount = 10; // Minimum allowed amount
                        $max_amount = 30; // Maximum allowed amount

                        // Function to send an order to the API for likes
                        function sendOrder($api_url, $api_key, $service_id, $link, $quantity) {
                            $data = [
                                'key' => $api_key,
                                'action' => 'add',
                                'service' => $service_id,
                                'link' => $link,
                                'quantity' => $quantity
                            ];

                            // Initialize cURL
                            $ch = curl_init($api_url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                            $response = curl_exec($ch);
                            curl_close($ch);

                            return json_decode($response, true);
                        }

                        // Handling form submission
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $link = $_POST['link'];
                            $quantity = (int)$_POST['quantity'];

                            if ($quantity < $min_amount) {
                                echo '<p class="text-danger">Error: The minimum amount allowed is ' . $min_amount . '.</p>';
                            } elseif ($quantity > $max_amount) {
                                echo '<p class="text-danger">Error: The maximum amount allowed is ' . $max_amount . '.</p>';
                            } else {
                                $result = sendOrder($api_url, $api_key, $service_id, $link, $quantity);

                                if ($result && isset($result['order'])) {
                                    echo '<p class="text-success">Order successfully placed. Order ID: ' . $result['order'] . '</p>';
                                } else {
                                    echo '<p class="text-danger">Error placing the order: ' . json_encode($result) . '</p>';
                                }
                            }
                        }
                        ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label for="link" class="form-label">Link:</label>
                                <input type="url" id="link" name="link" class="form-control" placeholder="Enter your link" required>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Amount (between <?php echo $min_amount; ?> and <?php echo $max_amount; ?>):</label>
                                <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter amount" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Order</button>
                        </form>
                    </div>
                </div>
                <!-- Tiktok Likes Submission Section End -->
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
