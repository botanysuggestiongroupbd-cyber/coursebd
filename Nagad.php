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
                 <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                <?php $se = "SELECT * FROM notice";
                $data = mysqli_query($link, $se);
                $d = mysqli_fetch_assoc($data);
                echo $d['notice']; ?>
            </marquee>
                <!-- Nagad Transaction Generator Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">Nagad Transaction Generator</h5>

                        <!-- Handle Form Submission -->
                        <?php
                        // Initialize form data
                        $number = $transaction = $amount = $charge = $total = $time = '';
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            // Collect form data
                            $number = htmlspecialchars(trim($_POST['number']));
                            $transaction = htmlspecialchars(trim($_POST['transaction']));
                            $amount = htmlspecialchars(trim($_POST['amount']));
                            $charge = htmlspecialchars(trim($_POST['charge']));
                            $total = htmlspecialchars(trim($_POST['total']));
                            $time = htmlspecialchars(trim($_POST['time']));

                            // Validate inputs (can be improved based on your needs)
                            if (!empty($number) && !empty($transaction) && !empty($amount) && !empty($charge) && !empty($total) && !empty($time)) {
                                // Construct URL for API request
                                $url = "https://transection-ss-gen.free.nf/nagad.php?number=" . urlencode($number) . "&transaction=" . urlencode($transaction) . "&amount=" . urlencode($amount) . "&charge=" . urlencode($charge) . "&total=" . urlencode($total) . "&time=" . urlencode($time);

                                // Open the URL in a new window
                                echo "<script>window.open('$url', '_blank', 'width=" . screen.width . ",height=" . screen.height . "');</script>";
                            }
                        }
                        ?>

                        <!-- Transaction Form -->
                        <form method="POST">
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone Number:</label>
                                <input type="text" id="number" name="number" class="form-control" placeholder="Enter your phone number" value="<?php echo $number; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="transaction" class="form-label">Transaction ID:</label>
                                <input type="text" id="transaction" name="transaction" class="form-control" placeholder="Enter transaction ID" value="<?php echo $transaction; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount:</label>
                                <input type="number" id="amount" name="amount" class="form-control" value="<?php echo $amount; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="charge" class="form-label">Charge:</label>
                                <input type="number" id="charge" name="charge" class="form-control" value="<?php echo $charge; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="total" class="form-label">Total:</label>
                                <input type="number" id="total" name="total" class="form-control" value="<?php echo $total; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time (YYYY-MM-DDTHH:MM):</label>
                                <input type="datetime-local" id="time" name="time" class="form-control" value="<?php echo $time; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                        
                        <!-- Credit Information -->
                        <div class="credit text-center mt-4">
                            <a href="https://t.me/bdtoolbd" target="_blank">(BD TOOL BD)</a>
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
