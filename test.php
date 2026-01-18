<?php 
require_once("includes/html-header.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// User session information
$email = $_SESSION['alogin'];
$sql = "SELECT * FROM users WHERE email = (:email)";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);

$_SESSION['user_id'] = $result->id;
$bbbb = $result->balance;
$phoneNumber = $result->phone ?? "পাওয়া যায়নি"; // Default value if phone is not set

$select = "SELECT * FROM control";
$g = mysqli_query($link, $select);
$data = mysqli_fetch_assoc($g);
$ssprice = $data['cc_sim_price'];

// Generate unique sequential ID
function generateOrderId($link) {
    $query = "SELECT MAX(id) as max_id FROM simcopy_sub";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $lastId = $row['max_id'] ?? 1; // Start from 1 if no records exist
    return $lastId + 1;
}

if (isset($_POST['submit'])) {
    if ($bbbb < $ssprice) {
        $_SESSION['Error'] = "আপনার পর্যাপ্ত পরিমাণ ব্যালেন্স নাই, প্লিজ রিচার্জ করুন।";
    } else if ($bbbb >= $ssprice) {
        $name = mysqli_real_escape_string($link, $_POST['name']);
        $nid_num = mysqli_real_escape_string($link, $_POST['nid_num']);
        $note = mysqli_real_escape_string($link, $_POST['note']);
        $csrfPost = mysqli_real_escape_string($link, $_POST['csrf']);
        
        date_default_timezone_set('Asia/Dhaka');
        $orderTime = date("Y-m-d h:i:s A");

        if ($_SESSION['csrf'] == $csrfPost) {
            $newId = generateOrderId($link);

            $sql = "INSERT INTO simcopy_sub (id, sub_type, nfvb, Name, Sub_by, date_flt) 
                    VALUES (:id, :name, :nid_num, :note, :user, :date_flt)";
            $user = $_SESSION['alogin'];

            $query = $dbh->prepare($sql);
            $query->bindParam(':id', $newId, PDO::PARAM_INT);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':nid_num', $nid_num, PDO::PARAM_STR);
            $query->bindParam(':note', $note, PDO::PARAM_STR);
            $query->bindParam(':user', $user, PDO::PARAM_STR);
            $query->bindParam(':date_flt', $orderTime, PDO::PARAM_STR);

            $query->execute();

            $sqlBalanceUpdate = "UPDATE `users` SET `balance` = balance - $ssprice WHERE `users`.`email` = (:email)";
            $queryBalanceUpdate = $dbh->prepare($sqlBalanceUpdate);
            $queryBalanceUpdate->bindParam(':email', $_SESSION['alogin'], PDO::PARAM_STR);
            $queryBalanceUpdate->execute();

            // Send Telegram notification
            $telegramQuery = "SELECT * FROM telegram_settings LIMIT 1";
            $telegramResult = mysqli_query($link, $telegramQuery);
            $telegramData = mysqli_fetch_assoc($telegramResult);

            if ($telegramData) {
                $botToken = $telegramData['bot_token'];
                $adminChatId = $telegramData['admin_chat_id'];

                $telegramMessage = urlencode(
                    "নতুন SIM Closing অর্ডার সফল হয়েছে।" .
                    "\nঅর্ডার আইডিঃ $newId" .
                    "\nনামঃ $name" .
                    "\nআইডি নাম্বারঃ $nid_num" .
                    "\nনোটঃ $note" .
                    "\nইমেইল: $email" .
                    "\nফোন নম্বর: $phoneNumber" .
                    "\nসময়ঃ $orderTime" .
                    "\nঅর্ডারকারী বর্তমান ব্যালেন্স: $bbbb"
                );

                $telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$adminChatId&text=$telegramMessage";

                $telegramResponse = file_get_contents($telegramUrl);

                if ($telegramResponse) {
                    $_SESSION['Success'] = "অর্ডার সফল হয়েছে। শিগগিরই অ্যাপ্রুভ করা হবে।";
                } else {
                    $_SESSION['Error'] = "টেলিগ্রামে মেসেজ পাঠানো যায়নি।";
                }
            } else {
                $_SESSION['Error'] = "টেলিগ্রামের তথ্য পাওয়া যায়নি।";
            }
        }
    }
}

$csrf = md5(rand(1111, 99990));
$_SESSION['csrf'] = $csrf;
?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/674086e42480f5b4f5a2784b/1ida0trm1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">


        <?php

        //include sidebar
        require_once("includes/sidebar.php");

        ?>

        <!--  Main wrapper -->
        <div class="body-wrapper">


            <?php

            //include header
            require_once("includes/header.php");

            ?>



            <div class="container-fluid">
            <!-- notice -->
            <marquee class="alert alert-dark text-white" onmouseover="this.stop()" onmouseout="this.start()" role="alert" style="font-size: 1rem;">
                <?php $se = "SELECT * FROM notice";
                $data = mysqli_query($link, $se);
                $d = mysqli_fetch_assoc($data);
                echo $d['notice']; ?>
            </marquee>
            <!-- notice end -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4 text-center"> SIM Closing অর্ডার করুন।</h5>
                        <div class="card">
                        
                            <div class="card-body">
                            <div class="alert alert-primary" role="alert">
                               SIM Closing এর জন্য <?php echo $ssprice ?> টাকা কাটা হবে।
                            </div>
                                <form method="POST">
                                    <?php
                                        if(isset($_SESSION['Error'])){
                                        ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php 
                                                echo $_SESSION['Error'];
                                                $_SESSION['Error'] = null;
                                                
                                                ?>
                                            </div>
                                        <?php
                                        }elseif (isset($_SESSION['Success'])) {
                                        ?>
                                            <div class="alert alert-success" role="alert">
                                                <?php 
                                                echo $_SESSION['Success'];
                                                $_SESSION['Success'] = null;
                                                
                                                ?>
                                            </div>
                                        <?php
                                        }
                                    ?>
                                    <div class="mb-3 text-center">
                                        <label class="form-label">Select Type:</label>
                                        <select name="name" id="" class="form-select" required>
                                           
                                            <option value="sim closing">/number</option>
                                            
                                          
                                        </select>
                                    </div>
                                    <!--<div class="mb-3 text-center">-->
                                    <!--    <label class="form-label">জন্ম তারিখঃ</label>-->
                                    <!--    <input type="text" name="dob" class="form-control">-->
                                    <!--</div>-->
                                    <div class="mb-3 text-center">
                                        <label class="form-label"> মোবাইল নাম্বারঃ </label>
                                        <input type="number" name="nid_num" class="form-control" required>
                                    </div>
                                     <div class="mb-3 text-center" style="display: none;">
                                        <label class="form-label">সাইন কপি সম্পর্কে বিস্তারিত লিখুনঃ(যদি কিছু বলার থাকে)</label>
                                        <textarea class="form-control" name="note" cols="30" rows="5"></textarea>
                                    </div>
                                    <input type="hidden" class="form-control" name="csrf" value="<?php echo $csrf ?>" >

                                    <?php 
                                        $se = 'SELECT * FROM control';
                                        $data = mysqli_query($link, $se);
                                        $d = mysqli_fetch_assoc($data);
                                        $onOff = $d['cc_sim_control'];

                                        if($onOff == 1) { ?>

                                    <div class="mb-3 text-center">
                                        <button type="submit" name="submit" class="btn btn-outline-primary m-1">অর্ডার
                                            করুন।</button>
                                    </div>

                                    <?php } else { ?>

                                    <div class="mb-3 text-center" style="margin-top: 20px;">
                                        <h3 style="color: red"> নতুন অর্ডার বন্ধ আছে। </h3>
                                    </div>

                                    <?php } ?>
                                   
                                </form>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">পূর্ববর্তী অর্ডার</h5>
                        <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">আইডি</h6>
                                </th>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">নাম ও ফর্ম/আইডি/ভোটার নাম্বার</h6>
                                </th>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">অর্ডার টাইম</h6>
                                </th>
                                
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">স্ট্যাটাস</h6>
                                </th>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"> ডাউনলোড <h6>
                                </th>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">ডেলিভারি টাইম</h6>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $sql = "SELECT * from simcopy_sub where Sub_by = (:email) ORDER BY id DESC;";

                            $query = $dbh->prepare($sql);
                            $query->bindParam(':email', $_SESSION['alogin'], PDO::PARAM_STR);

                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                            ?>
                                    <tr>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?php echo htmlentities($result->id); ?></h6></td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?php echo htmlentities($result->sub_type); ?></h6>
                                            <span class="fw-normal"><?php echo htmlentities($result->nfvb); ?></span>                          
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"><?php echo htmlentities($result->sub_at); ?></p>
                                        </td>
                                        
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4">

                                            <?php
                                                if($result->status == 2){
									                echo '<p class="text-success">Approved</p>';
										        }
										        else if($result->status == 1){
										            echo '<p class="text-warning">Pending</p>';
										        }
										        
										        else if($result->status == 3){
										            echo '<p class="text-danger">Canceled</p>';
										        }
                                            ?>

                                            </h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <?php 
                                                if($result->status == 2){
                                                                    
                                                echo '<p class="text-xs font-medium text-green-700">' . htmlentities($result->bio_text) . '</p>';
                                                }
                                                else if($result->status == 1){
                                                    echo '<p class="text-xs font-medium text-yellow-700">Pending</p>';
                                                }
                                                else if($result->status == 3){
                                                    echo '<p class="text-xs font-medium text-red-700">'.htmlentities($result->delivery_text).'</p>';
                                                }
                                            ?>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"><?php if ($result->fileup_at == $result->sub_at) {
                                                    echo "ডেলিভারি করা হয়নি";
                                                } else {
                                                    echo $result->fileup_at;
                                                } ?></p>
                                        </td>
                                    </tr>
							<?php
								}
							} ?>

                             
                                                
                            </tbody>
                        </table>
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