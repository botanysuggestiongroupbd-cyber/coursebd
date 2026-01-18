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
                <!-- Loan Information Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">লোন তথ্য</h5>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">ফোন নাম্বার দিন:</label>
                                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="ফোন নাম্বার লিখুন">
                            </div>
                            <button type="submit" name="findLoanInfo" class="btn btn-primary">তথ্য খুঁজুন</button>
                        </form>

                        <!-- Result Section -->
                        <?php
                        if (isset($_POST['findLoanInfo'])) {
                            $number = $_POST['phoneNumber'];
                            $apiUrl = "https://myblapi.banglalink.net/api/v1/emergency-balance/" . $number;

                            // Initialize cURL session
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $apiUrl);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($ch);
                            curl_close($ch);

                            // Decode JSON response
                            $data = json_decode($response, true);

                            if ($data && isset($data['status']) && $data['status'] === "SUCCESS") {
                                if (!empty($data['data'])) {
                                    // Display loan information
                                    ?>
                                    <div id="loanResult" class="mt-4">
                                        <h6>লোন তথ্য:</h6>
                                        <p><strong>আইডি:</strong> <?php echo htmlspecialchars($data['data']['id']); ?></p>
                                        <p><strong>ফোন নাম্বার:</strong> <?php echo htmlspecialchars($data['data']['msisdn']); ?></p>
                                        <p><strong>বাকি লোন:</strong> <?php echo htmlspecialchars($data['data']['due_loan']); ?> টাকা</p>
                                        <p><strong>মেয়াদ শেষ:</strong> <?php echo htmlspecialchars($data['data']['expires_in']); ?></p>
                                    </div>
                                    <?php
                                } else {
                                    // Display "No loan found" message
                                    echo "<p class='text-success mt-4'>এই নাম্বার এ লোণ নাই।</p>";
                                }
                            } else {
                                // Display error message if API response is invalid or fails
                                echo "<p class='text-danger mt-4'>তথ্য পাওয়া যায়নি। আবার চেষ্টা করুন।</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- Loan Information Section End -->
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
