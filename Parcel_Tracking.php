<?php  
// Include header and sidebar
require_once("includes/html-header.php");
?>


<body>
    
    <script>!function(){var e,t,n,a;window.MyAliceWebChat||((t=document.createElement("div")).id="myAliceWebChat",(n=document.createElement("script")).type="text/javascript",n.async=!0,n.src="https://widget.myalice.ai/index.js",(a=(e=document.body.getElementsByTagName("script"))[e.length-1]).parentNode.insertBefore(n,a),a.parentNode.insertBefore(t,a),n.addEventListener("load",(function(){MyAliceWebChat.init({selector:"myAliceWebChat",number:"Sakib76255",message:"",color:"#2AABEE",channel:"tg",boxShadow:"none",text:"Message Us",theme:"light",position:"right",mb:"20px",mx:"20px",radius:"20px"})})))}();</script> 
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
                <!-- Courier Tracking Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">কুরিয়ার ট্র্যাকিং তথ্য</h5>

                        <?php
                        // Initialize variables
                        $courierData = null;
                        $errorMessage = null;

                        // Handle form submission
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $phone = htmlspecialchars(trim($_POST['phone']));

                            // Check if phone number is provided
                            if (!empty($phone)) {
                                // Make API request to fetch tracking data
                                $apiUrl = "https://mdrobiul.xyz/tracking/api.php?phone=" . urlencode($phone);
                                $response = file_get_contents($apiUrl);
                                $data = json_decode($response, true);

                                // Check if response has courierData
                                if (isset($data['courierData'])) {
                                    $courierData = $data['courierData'];
                                } else {
                                    $errorMessage = "ডেটা আনতে সমস্যা হচ্ছে।";
                                }
                            } else {
                                $errorMessage = "অনুগ্রহ করে একটি বৈধ ফোন নম্বর প্রবেশ করান।";
                            }
                        }
                        ?>

                        <!-- Phone Number Input Form -->
                        <form method="POST">
                            <div class="mb-3">
                                <label for="phone" class="form-label">ফোন নম্বর দিন:</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="আপনার ফোন নম্বর দিন" required>
                            </div>
                            <button type="submit" class="btn btn-primary">ট্র্যাক করুন</button>
                        </form>
                        
                        <!-- Error Message -->
                        <?php if ($errorMessage): ?>
                            <p class="text-danger mt-3"><?php echo $errorMessage; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Courier Data Display Section -->
                <?php if ($courierData): ?>
                    <div class="card w-100 mt-4">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4 text-center">কুরিয়ার সারাংশ</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>কুরিয়ার সেবা</th>
                                        <th>মোট পার্সেল</th>
                                        <th>সফল পার্সেল</th>
                                        <th style="color: red;">বাতিল পার্সেল</th>
                                        <th>সাফল্যের হার (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($courierData as $courier => $info): ?>
                                        <?php if ($courier !== 'summary'): ?>
                                            <tr>
                                                <td><?php echo ucfirst($courier); ?></td>
                                                <td><?php echo $info['total_parcel']; ?></td>
                                                <td><?php echo $info['success_parcel']; ?></td>
                                                <td style="color: red;"><?php echo $info['cancelled_parcel']; ?></td>
                                                <td>
                                                <?php echo $info['success_ratio']; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <!-- Summary Information -->
                            <h5 class="card-title fw-semibold mb-4 text-center">মোট সারাংশ</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>মোট পার্সেল</th>
                                    <th>সফল পার্সেল</th>
                                    <th style="color: red;">বাতিল পার্সেল</th>
                                    <th>সাফল্যের হার (%)</th>
                                </tr>
                                <tr>
                                    <td><?php echo $courierData['summary']['total_parcel']; ?></td>
                                    <td><?php echo $courierData['summary']['success_parcel']; ?></td>
                                    <td style="color: red;"><?php echo $courierData['summary']['cancelled_parcel']; ?></td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $courierData['summary']['success_ratio']; ?>%;" aria-valuenow="<?php echo $courierData['summary']['success_ratio']; ?>" aria-valuemin="0" aria-valuemax="100">
                                                <?php echo $courierData['summary']['success_ratio']; ?>%
                                            </div>
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo 100 - $courierData['summary']['success_ratio']; ?>%;" aria-valuenow="<?php echo 100 - $courierData['summary']['success_ratio']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Courier Data Display Section End -->

            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
