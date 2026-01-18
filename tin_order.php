<?php

//include html header
require_once("includes/html-header.php");

?>


<body>

 <?php
        include('includes/whatsapp.php');
?>

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
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4 text-center"> Tin Copy</h5>
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if (isset($_SESSION['Error'])) {
                                    echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['Error'] . "</div>";
                                    $_SESSION['Error'] = null;
                                } elseif (isset($_SESSION['Success'])) {
                                    echo "<div class='alert alert-success' role='alert'>" . $_SESSION['Success'] . "</div>";
                                    $_SESSION['Success'] = null;
                                }
                                ?>
                                
                                <form method="POST" id="myForm" action="tinApi.php" target='_blank'>
                                    <div class="mb-3">
                                        <label class="form-label">TIN No.</label>
                                        <input type="text" class="form-control" placeholder="0123456789" name="tin" />
                                    </div>

                                    <div class="alert alert-info" role="alert">
                                        আপনার একাউন্ট থেকে
                                        <?php
                                        $sql = "SELECT * FROM control WHERE id='1'";
                                        if ($resulttt = mysqli_query($link, $sql)) {
                                            if (mysqli_num_rows($resulttt) > 0) {
                                                $row = mysqli_fetch_array($resulttt);
                                                echo $row['cc_tin_price'];
                                            }
                                        }
                                        ?>
                                        টাকা কাটা হবে।
                                    </div>
                                    
                                    <?php
                                    // Check user balance
                                    $userId = $_SESSION['user_id']; // Assuming you have a session variable for the user ID
                                    $query = "SELECT balance FROM users WHERE id = '$userId'";
                                    $result = mysqli_query($link, $query);
                                    $balance = 0;

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $user = mysqli_fetch_assoc($result);
                                        $balance = $user['balance'];
                                    }

                                    // Amount required for the download
                                    $requiredAmount = $row['cc_tin_price'];

                                    if ($balance >= $requiredAmount) {
                                        // User has enough balance, show the submit buttons
                                        ?>
                                        <button type="submit" name="submit" class="btn btn-primary text-center mb-2 d-block mx-auto" onclick="changeAction('tin_info.php')">
                                            ডাউনলোড করুন                                         </button>


                                        <?php
                                    } else {
                                        // User does not have enough balance
                                        echo "<div class='alert alert-warning text-center'>আপনার পর্যাপ্ত ব্যালেন্স নেই।</div>";
                                    }
                                    ?>
                                </form>

                                <script>
                                  function changeAction(action) {
                                    document.getElementById('myForm').setAttribute('action', action);
                                    document.getElementById('myForm').submit();
                                  }
                                </script>
                            </div>
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