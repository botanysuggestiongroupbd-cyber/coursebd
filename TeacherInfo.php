<?php
// Include the HTML header
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

            // Initialize variables
            $employee = null;
            $errorMessage = null;

            // Handle form submission
            if (isset($_POST['findEmployeeInfo'])) {
                $empId = htmlspecialchars(trim($_POST['empId'])); // Sanitize user input
                $apiUrl = "https://mdrobiul.xyz/eiin/id.php?id=$empId";

                // Initialize cURL session
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $apiUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get HTTP response code
                curl_close($ch);

                // Decode JSON response
                if ($httpCode === 200) {
                    $data = json_decode($response, true);
                    if (isset($data['Entity'])) {
                        $employee = $data['Entity'];
                    } else {
                        $errorMessage = "তথ্য পাওয়া যায়নি। ইনডেক্স বা কর্মী নম্বর আবার পরীক্ষা করুন।";
                    }
                } else {
                    $errorMessage = "ডাটা রিকোয়েস্টে একটি সমস্যা হয়েছে। পরে চেষ্টা করুন।";
                }
            }
            ?>

            <div class="container-fluid">
                <!-- Notice -->
                <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                    <?php
                    $se = "SELECT * FROM notice";
                    $data = mysqli_query($link, $se);
                    $d = mysqli_fetch_assoc($data);
                    echo $d['notice'];
                    ?>
                </marquee>
                <!-- Notice end -->

                <!-- Employee Information Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <h5 class="card-title fw-semibold mb-0">ইনডেক্স নম্বর বা কর্মী নম্বর দিয়ে তথ্য খুঁজুন</h5>
                            <!-- Question icon for additional info -->
                            <span class="ms-2" data-bs-toggle="modal" data-bs-target="#infoModal" style="cursor: pointer;">
                                <i class="bi bi-question-circle-fill text-info"></i>
                            </span>
                        </div>

                        <form method="POST" action="">
                            <div class="mb-3 position-relative">
                                <label for="empId" class="form-label">ইনডেক্স/কর্মী নম্বর দিন:</label>
                                <input type="text" id="empId" name="empId" class="form-control" placeholder="ইনডেক্স/কর্মী নম্বর লিখুন" required>
                                <!-- Question icon for help -->
                                <span class="position-absolute top-0 end-0 mt-2 me-3" data-bs-toggle="tooltip" data-bs-placement="left" title="আপনার ইনডেক্স বা কর্মী নম্বর সংক্রান্ত তথ্য পেতে যোগাযোগ করুন।">
                                    <i class="bi bi-question-circle-fill text-info"></i>
                                </span>
                            </div>
                            <button type="submit" name="findEmployeeInfo" class="btn btn-primary">তথ্য খুঁজুন</button>
                        </form>

                        <!-- Error Message -->
                        <?php if ($errorMessage): ?>
                            <div class="alert alert-danger mt-3">
                                <?php echo htmlspecialchars($errorMessage); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Employee Result Section -->
                        <?php if ($employee): ?>
                            <div id="employeeResult" class="mt-4">
                                <div class="card p-3">
                                    <div class="text-center">
                                        <p><?php echo htmlspecialchars($employee['InstituteInstituteName'] ?? 'N/A'); ?></p>
                                        <p><?php echo htmlspecialchars($employee['EIIN'] ?? 'N/A'); ?></p>
                                        <h6><strong><?php echo htmlspecialchars($employee['Name'] ?? 'নাম পাওয়া যায়নি'); ?></strong></h6>
                                    </div>
                                    <div>
                                        <p><strong>জন্ম তারিখ:</strong> <?php echo htmlspecialchars($employee['Dob'] ?? 'N/A'); ?></p>
                                        <p><strong>এনআইডি নাম্বার:</strong> <?php echo htmlspecialchars($employee['Nid'] ?? 'N/A'); ?></p>
                                        <p><strong>পিতার নাম:</strong> <?php echo htmlspecialchars($employee['FatherName'] ?? 'N/A'); ?></p>
                                        <p><strong>মাতার নাম:</strong> <?php echo htmlspecialchars($employee['MotherName'] ?? 'N/A'); ?></p>
                                        <p><strong>মোবাইল:</strong> <?php echo htmlspecialchars($employee['Mobile'] ?? 'N/A'); ?></p>
                                        <p><strong>ইমেইল:</strong> <a href="mailto:<?php echo htmlspecialchars($employee['Email'] ?? 'N/A'); ?>"><?php echo htmlspecialchars($employee['Email'] ?? 'N/A'); ?></a></p>
                                        <p><strong>ইনডেক্স নং:</strong> <?php echo htmlspecialchars($employee['IndexNumber'] ?? 'N/A'); ?></p>
                                        <p><strong>কর্মী নম্বর:</strong> <?php echo htmlspecialchars($employee['EmpId'] ?? 'N/A'); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Employee Information Section End -->
            </div>
        </div>
    </div>

    <!-- Modal for Index Number Information -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">ইনডেক্স নম্বর তথ্য</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>ইনডেক্স নম্বরটি আপনার প্রতিষ্ঠানের নির্দিষ্ট শিক্ষকের জন্য বরাদ্দকৃত একটি নম্বর, যা শিক্ষকের পরিচিতি নির্দেশ করে। কর্মী নম্বরও একইভাবে কর্মীদের জন্য বরাদ্দকৃত একটি পরিচয় নম্বর। এই নম্বরগুলি সাধারণত প্রতিষ্ঠান থেকে পাওয়া যায়।</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বন্ধ করুন</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <script>
        // Initialize tooltip
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>
