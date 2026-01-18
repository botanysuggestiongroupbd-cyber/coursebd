<?php
require_once("includes/html-header.php");

// Generate a unique ID using MD5 hash of timestamp and random number
$unique_id = md5(time() . rand());

$id = $_SESSION['alogin'];
?>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php
        // Include sidebar
        require_once("includes/sidebar.php");
        ?>

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <?php
            // Include header
            require_once("includes/header.php");
            ?>

            <div class="container-fluid">
                <!-- notice -->
                <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                    <?php 
                    $se = "SELECT * FROM notice";
                    $data = mysqli_query($link, $se);
                    $d = mysqli_fetch_assoc($data);
                    echo $d['notice']; 
                    ?>
                </marquee>
                <!-- notice end -->
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h2>Police Clearance Certificate Form</h2>
                            <form action="card_pcc.php" method="POST" target="_blank">
                                <!-- Include the unique ID as a hidden field -->
                                <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">

                                <div class="form-group">
                                    <label for="name">Full Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                                </div>

                                <div class="form-group">
                                    <label for="father">Father Name:</label>
                                    <input type="text" name="father" class="form-control" placeholder="Enter your father's name" required>
                                </div>

                                <div class="form-group">
                                    <label for="village">Village/Area:</label>
                                    <input type="text" name="village" class="form-control" placeholder="Enter your village/area" required>
                                </div>

                                <div class="form-group">
                                    <label for="post_office">Post Office:</label>
                                    <input type="text" name="post_office" class="form-control" placeholder="Enter your post office" required>
                                </div>

                                <div class="form-group">
                                    <label for="police_station">Police Station:</label>
                                    <input type="text" name="police_station" class="form-control" placeholder="Enter your police station" required>
                                </div>

                                <div class="form-group">
                                    <label for="district">District:</label>
                                    <input type="text" name="district" class="form-control" placeholder="Enter your district" required>
                                </div>

                                <div class="form-group">
                                    <label for="passport">Passport Number:</label>
                                    <input type="text" name="passport" class="form-control" placeholder="Enter your passport number" required>
                                </div>

                                <div class="form-group">
                                    <label for="issue_date">Passport Issue Date:</label>
                                    <input type="text" name="issue_date" class="form-control" placeholder="DD-MM-YYYY" required>
                                </div>

                                <div class="form-group">
                                    <label for="ref_no">Reference Number:</label>
                                    <input type="text" name="ref_no" class="form-control" placeholder="Enter your reference number" required>
                                </div>

                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="text" name="date" class="form-control" placeholder="DD-MM-YYYY" required>
                                </div>

                                <div class="alert alert-info" role="alert">
                                    আপনার একাউন্ট থেকে 
                                    <?php 
                                    $sql = "SELECT * FROM control WHERE id='1'";
                                    if ($resulttt = mysqli_query($link, $sql)) {
                                        if (mysqli_num_rows($resulttt) > 0) {
                                            while ($row = mysqli_fetch_array($resulttt)) {
                                                echo $row['cc_card_price'];
                                            }
                                        }
                                    }    
                                    ?> 
                                    টাকা কাটা হবে।
                                </div>
                                <button type="submit" class="btn btn-primary text-center d-block mx-auto">ডাউনলোড করুন</button>
                            </form>
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
