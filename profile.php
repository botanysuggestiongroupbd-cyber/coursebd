<?php 
// include html header
require_once("includes/html-header.php");

// Code for updating profile details
if (isset($_POST['submit'])) {
    $mobileno = $_POST['mobile'];
    $idedit = $_POST['editid'];
    $image = "/assets/images/profile/user-1.jpg"; // You can replace this with a dynamic file upload if required

    $sql = "UPDATE users SET mobile=(:mobileno), Image=(:image) WHERE id=(:idedit)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    $query->bindParam(':idedit', $idedit, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['Success'] = "প্রোফাইল আপলোড হয়েছে।";
}

// Fetch user details
$email = $_SESSION['alogin'];
$sql = "SELECT * FROM users WHERE email = (:email)";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
?>

<!-- Add CSS to style the profile photo as rounded -->
<style>
    .profile-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>
<head>
    <!-- FontAwesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <?php
        include('includes/whatsapp.php');
?> 
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        
        <?php require_once("includes/sidebar.php"); ?>

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <?php require_once("includes/header.php"); ?>

            <div class="container-fluid">
                <!-- notice -->
                <marquee class="alert alert-dark text-white" onmouseover="this.stop()" onmouseout="this.start()" role="alert" style="font-size: 1rem;">
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
                        <h5 class="card-title fw-semibold mb-4 text-center">প্রোফাইল আপডেট করুন।</h5>
                        <div class="card">
                            <div class="card-body">
                                <form name="chngpwd" method="POST">
                                    <?php
                                    if (isset($_SESSION['Error'])) {
                                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['Error'] . '</div>';
                                        $_SESSION['Error'] = null;
                                    } elseif (isset($_SESSION['Success'])) {
                                        echo '<div class="alert alert-success" role="alert">' . $_SESSION['Success'] . '</div>';
                                        $_SESSION['Success'] = null;
                                    }
                                    ?>
                                    <!-- Display profile photo -->
                                    <div class="text-center mb-3">
                                        <img src="assets/images/profile/user-1.jpg" alt="Profile Photo" class="profile-photo">
                                    </div>
                                    
                                    <div class="mb-3 text-center">
                                        <label for="name" class="form-label">নামঃ</label>
                                        <input type="text" name="name" class="form-control" id="name" value="<?php echo htmlentities($result->name); ?>" readonly>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <label for="email" class="form-label">ইমেইলঃ</label>
                                        <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlentities($result->email); ?>" readonly>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <label for="mobile" class="form-label">মোবাইল নাম্বারঃ</label>
                                        <input type="number" name="mobile" class="form-control" id="mobile" required value="<?php echo htmlentities($result->mobile); ?>">
                                    </div>

                                    <input type="hidden" name="editid" value="<?php echo htmlentities($result->id); ?>">

                                    <div class="mb-3 text-center">
                                        <button type="submit" name="submit" class="btn btn-outline-primary m-1">পরিবর্তন।</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>

    <!-- JavaScript dependencies -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
