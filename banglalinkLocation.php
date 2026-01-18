<?php
// Include HTML header
require_once("includes/html-header.php");
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
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php include("includes/sidebar.php"); ?>
        <div class="body-wrapper">
            <?php include("includes/header.php"); ?>

        <!-- Main Content Wrapper -->
            <div class="container-fluid">
                <!-- API Key Input Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-3">Enter API Key</h5>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <input type="text" name="apiKey" class="form-control" placeholder="Enter API Key" required>
                            </div>
                            <button type="submit" name="checkBalance" class="btn btn-primary">Check Balance</button>
                        </form>

                        <?php
                        // Handle API key submission and balance check
                        if (isset($_POST['checkBalance'])) {
                            $apiKey = $_POST['apiKey'];
                            $balanceApiUrl = "https://bdtoolbd.xyz/api/balance.php?key=" . urlencode($apiKey);

                            // Use cURL to check balance
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $balanceApiUrl);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($ch);
                            curl_close($ch);

                            $balanceData = json_decode($response, true);

                            if ($balanceData['success'] === "true" && $balanceData['balance'] > 0) {
                                echo "<p class='text-success'>Balance Available: " . htmlspecialchars($balanceData['balance']) . "</p>";
                                $_SESSION['apiKey'] = $apiKey; // Store API key in session
                                $balanceAvailable = true;
                            } else {
                                echo "<p class='text-danger'>" . htmlspecialchars($balanceData['message'] ?? 'Invalid API key') . "</p>";
                            }
                        }
                        ?>

                        <!-- Number Input Section (Shown if balance is available) -->
                        <?php if (isset($balanceAvailable) && $balanceAvailable): ?>
                            <div id="numberInputSection" class="mt-4">
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <input type="text" name="phoneNumber" class="form-control" placeholder="Enter Phone Number" required>
                                    </div>
                                    <button type="submit" name="getLocation" class="btn btn-success">Get Location</button>
                                </form>
                            </div>
                        <?php endif; ?>

                        <?php
                        // Handle location retrieval based on phone number
                        if (isset($_POST['getLocation']) && isset($_SESSION['apiKey'])) {
                            $phoneNumber = $_POST['phoneNumber'];
                            $locationApiUrl = "https://bdtoolbd.xyz/api/location.php?key=" . urlencode($_SESSION['apiKey']) . "&number=" . urlencode($phoneNumber);

                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $locationApiUrl);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $locationResponse = curl_exec($ch);
                            curl_close($ch);

                            $locationData = json_decode($locationResponse, true);

                            if ($locationData['success'] === "true") {
                                $locationInfo = $locationData['data'];
                                echo "<div class='mt-4'>";
                                echo "<p><strong>Status:</strong> " . htmlspecialchars($locationInfo['Status']) . "</p>";
                                echo "<p><strong>Number:</strong> " . htmlspecialchars($locationInfo['Number']) . "</p>";
                                echo "<p><strong>Network:</strong> " . htmlspecialchars($locationInfo['Network']) . "</p>";
                                echo "<p><strong>Region:</strong> " . htmlspecialchars($locationInfo['Region']) . "</p>";
                                echo "<p><strong>Address:</strong> " . htmlspecialchars($locationInfo['Address']) . "</p>";
                                echo "<p><a href='" . htmlspecialchars($locationInfo['Google_Maps_URL']) . "' target='_blank'>View on Google Maps</a></p>";
                                echo "<p><small>Developed by " . htmlspecialchars($locationData['DEV BY']) . "</small></p>";
                                echo "</div>";
                            } else {
                                echo "<p class='text-danger'>" . htmlspecialchars($locationData['message'] ?? 'Data not found') . "</p>";
                            }
                        }
                        ?>
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
