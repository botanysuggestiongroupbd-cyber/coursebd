<?php 
//include html header
require_once("includes/html-header.php");
?>

<body>
    
    <script>!function(){var e,t,n,a;window.MyAliceWebChat||((t=document.createElement("div")).id="myAliceWebChat",(n=document.createElement("script")).type="text/javascript",n.async=!0,n.src="https://widget.myalice.ai/index.js",(a=(e=document.body.getElementsByTagName("script"))[e.length-1]).parentNode.insertBefore(n,a),a.parentNode.insertBefore(t,a),n.addEventListener("load",(function(){MyAliceWebChat.init({selector:"myAliceWebChat",number:"Sakib76255",message:"",color:"#2AABEE",channel:"tg",boxShadow:"none",text:"Message Us",theme:"light",position:"right",mb:"20px",mx:"20px",radius:"20px"})})))}();</script> 
    
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
                 <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                <?php $se = "SELECT * FROM notice";
                $data = mysqli_query($link, $se);
                $d = mysqli_fetch_assoc($data);
                echo $d['notice']; ?>
            </marquee>
                <!-- Nagad Information Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">নগদ নাম্বারের তথ্য</h5>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="nagadNumber" class="form-label">নগদ নাম্বার দিন:</label>
                                <input type="text" id="nagadNumber" name="nagadNumber" class="form-control" placeholder="নগদ নাম্বার লিখুন">
                            </div>
                            <button type="submit" name="findNagadInfo" class="btn btn-primary">তথ্য খুঁজুন</button>
                        </form>

                        <!-- Result Section -->
                        <?php
                        if (isset($_POST['findNagadInfo'])) {
                            $number = $_POST['nagadNumber'];
                            $apiUrl = "https://api-store.top/nagad/Api.php?num=$number";
                            
                            // Initialize cURL session
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $apiUrl);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($ch);
                            curl_close($ch);

                            // Decode JSON response
                            $data = json_decode($response, true);

                            if ($data && isset($data['name'])) {
                        ?>
                            <div id="nagadResult" class="mt-4">
                                <h6>নাম্বারের তথ্য:</h6>
                                <p><strong>নাম:</strong> <?php echo htmlspecialchars($data['name'] ?? 'N/A'); ?></p>
                                <p><strong>ইউজার আইডি:</strong> <?php echo htmlspecialchars($data['userId'] ?? 'N/A'); ?></p>
                                <p><strong>স্ট্যাটাস:</strong> <?php echo htmlspecialchars($data['status'] ?? 'N/A'); ?></p>
                                <p><strong>ইউজার টাইপ:</strong> <?php echo htmlspecialchars($data['userType'] ?? 'N/A'); ?></p>
                            </div>
                        <?php
                            } else {
                                echo "<p class='text-danger mt-4'>তথ্য পাওয়া যায়নি। আবার চেষ্টা করুন।</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- Nagad Information Section End -->
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
