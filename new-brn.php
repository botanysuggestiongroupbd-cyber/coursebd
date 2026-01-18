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

                <!-- New Birth Registration Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">নতুন জন্মনিবন্ধন</h5>
                        <p class="text-center">আপনার সন্তানের জন্মনিবন্ধন এখন সহজেই আমাদের মাধ্যমে করুন।</p>
                        
                        <ul class="text-start">
                            <li>বাবা ও মায়ের এনআইডি কার্ড থাকলেও হবে।</li>
                            <li>এনআইডি কার্ড না থাকলে মৌখিক কিছু তথ্য যথেষ্ট।</li>
                            <li>সঠিক এবং দ্রুত সেবা নিশ্চিত করতে আমাদের সাথে যোগাযোগ করুন।</li>
                        </ul>

                        <p class="text-center text-danger fw-bold">"আপনার সন্তানের জন্ম নিবন্ধন তৈরি করতে আমাদের আস্থা রাখুন।"</p>

                        <div class="row text-center"> <div class="col-md-4 mb-3"> <a href="https://t.me/ZXROCK71" class="btn btn-outline-primary w-100">টেলিগ্রাম</a> </div> <div class="col-md-4 mb-3"> <a href="https://wa.me/8801917485132" class="btn btn-outline-success w-100">WhatsApp</a> </div> <div class="col-md-4 mb-3"> <a href="mailto:banglaseba71@gmail.com" class="btn btn-outline-danger w-100">ইমেইল</a> </div>
                        </div>
                    </div>
                </div>
                <!-- New Birth Registration Section End -->

                <!-- Tips Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4 text-center">গুরুত্বপূর্ণ কিছু কথা</h5>
                        <ul class="text-start">
                            <li>জন্ম তারিখ সঠিকভাবে উল্লেখ করুন।</li>
                            <li>সঠিক ঠিকানা প্রদান করুন যেন ভবিষ্যতে কোনো সমস্যা না হয়।</li>
                            <li>আপনার সন্তানের নামের বানান যাচাই করুন।</li>
                            <li>দ্রুততার জন্য প্রয়োজনীয় কাগজপত্র আগে থেকেই প্রস্তুত রাখুন।</li>
                        </ul>
                        <p class="text-center">আমরা আপনাকে সঠিক তথ্য দিয়ে দ্রুত সেবা প্রদান করবো।</p>
                    </div>
                </div>
                <!-- Tips Section End -->

            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
