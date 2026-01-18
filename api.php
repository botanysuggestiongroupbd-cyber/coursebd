<?php
// Include header and sidebar
require_once("includes/html-header.php");
?>

<body>
    <?php
        include('includes/whatsapp.php');
?>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php
        // Include sidebar
        require_once("includes/sidebar.php");
        ?>

        <div class="body-wrapper">
            <?php
            // Include header
            require_once("includes/header.php");
            ?>

            <div class="container-fluid">
                <!-- Notice -->
                <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                    <?php $se = "SELECT * FROM notice";
                    $data = mysqli_query($link, $se);
                    $d = mysqli_fetch_assoc($data);
                    echo $d['notice']; ?>
                </marquee>
                <!-- Notice End -->

                <!-- API Options Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">API FOR SELL</h5>
                        
                        <div class="row text-center">
                            <div class="col-md-3 mb-3">
                                <a href="#" class="btn btn-outline-primary w-100"> Server Copy API</a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="#" class="btn btn-outline-success w-100">TinCopy API</a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="#" class="btn btn-outline-warning w-100">Custom Sms API</a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="https://t.me/ZXROCK71" class="btn btn-outline-danger w-100">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- API Options Section End -->

                <!-- Additional Section for Information -->
                <div class="card w-100 mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4 text-center">তথ্য শুনুন</h5>
                        <p class="text-center">আপনাকে একটি API দেয়া হবে যা দিয়ে আপনি কাজ করতে পারবেন ।</p>
                    </div>
                </div>
                <!-- Additional Section End -->

            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
