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

                <!-- NID Correction Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">এনআইডি সংশোধন</h5>
                        <p class="text-center">এনআইডি কার্ডের যেকোন সংশোধন করুন আমাদের থেকে খুবই কম প্রাইসে। 
                        দ্রুত এবং নির্ভুল সেবা দিয়ে আমরা নিশ্চিত করবো আপনার সন্তুষ্টি।</p>
                        
                        <p class="text-center text-danger fw-bold">"বিশ্বাসে মেলে বস্তু, সন্দেহে মেলে না কিছু। আমাদের উপর আস্থা রাখুন।"</p>

                        <div class="row text-center">
                            <div class="col-md-4 mb-3">
                                <a href="https://t.me/zxrock71" class="btn btn-outline-primary w-100">টেলিগ্রাম</a>
                            </div>
                            <div class="col-md-4 mb-3">
                                <a href="https://wa.me/8801917485132" class="btn btn-outline-success w-100">WhatsApp</a>
                            </div>
                            <div class="col-md-4 mb-3">
                                <a href="mailto:banglaseba71@gmail.com" class="btn btn-outline-danger w-100">ইমেইল</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- NID Correction Section End -->

                <!-- Additional Information Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4 text-center">সেবা সম্পর্কিত বিস্তারিত</h5>
                        <ul class="text-start">
                            <li>নাম সংশোধন</li>
                            <li>জন্ম তারিখ পরিবর্তন</li>
                            <li>ঠিকানা সংশোধন</li>
                            <li>যেকোনো ধরনের তথ্য হালনাগাদ</li>
                        </ul>
                        <p class="text-center">আপনার এনআইডি কার্ড সংশোধনের জন্য এখনই যোগাযোগ করুন।</p>
                    </div>
                </div>
                <!-- Additional Information Section End -->

            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
