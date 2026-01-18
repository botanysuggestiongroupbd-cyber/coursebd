<?php  
//include html header
require_once("includes/html-header.php");
?>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <?php
        //include sidebar
        require_once("includes/sidebar.php");
        ?>

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <?php
            //include header
            require_once("includes/header.php");
            ?>

            <div class="container-fluid">
                <!-- TrueCaller Information Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">TrueCaller নাম্বারের তথ্য</h5>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="trueCallerNumber" class="form-label">TrueCaller নাম্বার দিন:</label>
                                <input type="text" id="trueCallerNumber" name="trueCallerNumber" class="form-control" placeholder="নাম্বার লিখুন">
                            </div>
                            <button type="submit" name="findTrueCallerInfo" class="btn btn-primary">তথ্য খুঁজুন</button>
                        </form>

                        <!-- Result Section -->
                        <?php
                        if (isset($_POST['findTrueCallerInfo'])) {
                            $number = $_POST['trueCallerNumber'];
                            $apiUrl = "https://truecaller.nerdbd.workers.dev/?number=$number";
                            
                            // Initialize cURL session
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $apiUrl);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($ch);
                            curl_close($ch);

                            // Decode JSON response
                            $data = json_decode($response, true);

                            if ($data && isset($data['data'][0])) {
                                $user = $data['data'][0];
                        ?>
                            <div id="trueCallerResult" class="mt-4">
                                <div class="card p-3">
                                    <div class="text-center">
                                        <img src="<?php echo htmlspecialchars($user['image'] ?? '#'); ?>" alt="Profile Image" class="rounded-circle mb-3" width="120">
                                        <h6><strong><?php echo htmlspecialchars($user['name'] ?? 'N/A'); ?></strong></h6>
                                        <p><strong>নাম্বার:</strong> <?php echo htmlspecialchars($user['phones'][0]['nationalFormat'] ?? 'N/A'); ?></p>
                                    </div>
                                    <div>
                                        <p><strong>জন্ম তারিখ:</strong> <?php echo htmlspecialchars($user['birthday'] ?? 'N/A'); ?></p>
                                        <p><strong>পেশা:</strong> <?php echo htmlspecialchars($user['jobTitle'] ?? 'N/A'); ?></p>
                                        <p><strong>কোম্পানি:</strong> <?php echo htmlspecialchars($user['companyName'] ?? 'N/A'); ?></p>
                                        <p><strong>ইমেইল:</strong> <a href="mailto:<?php echo htmlspecialchars($user['internetAddresses'][0]['id'] ?? '#'); ?>"><?php echo htmlspecialchars($user['internetAddresses'][0]['id'] ?? 'N/A'); ?></a></p>
                                        <p><strong>ওয়েবসাইট:</strong> <a href="<?php echo htmlspecialchars($user['internetAddresses'][1]['id'] ?? '#'); ?>" target="_blank"><?php echo htmlspecialchars($user['internetAddresses'][1]['id'] ?? 'N/A'); ?></a></p>
                                        <p><strong>ঠিকানা:</strong> <?php echo htmlspecialchars($user['addresses'][0]['address'] ?? 'N/A'); ?></p>
                                        <p><strong>বায়ো:</strong> <?php echo htmlspecialchars($user['about'] ?? 'N/A'); ?></p>
                                        <p><strong>গাড়ির ধরন:</strong> <?php echo htmlspecialchars($user['phones'][0]['carrier'] ?? 'N/A'); ?></p>
                                        <p><strong>জেন্ডার:</strong> <?php echo htmlspecialchars($user['gender'] ?? 'N/A'); ?></p>
                                        <p><strong>অ্যাক্সেস:</strong> <?php echo htmlspecialchars($user['access'] ?? 'N/A'); ?></p>
                                        <p><strong>স্কোর:</strong> <?php echo htmlspecialchars($user['score'] ?? 'N/A'); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            } else {
                                echo "<p class='text-danger mt-4'>তথ্য পাওয়া যায়নি। আবার চেষ্টা করুন।</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- TrueCaller Information Section End -->
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
