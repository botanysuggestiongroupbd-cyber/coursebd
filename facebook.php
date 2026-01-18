<?php

// Include HTML header
require_once("includes/html-header.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mail option
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

// Fetch Telegram bot token and admin chat ID from database
$telegramSql = "SELECT * FROM telegram_settings LIMIT 1";
$telegramQuery = $dbh->prepare($telegramSql);
$telegramQuery->execute();
$telegramSettings = $telegramQuery->fetch(PDO::FETCH_OBJ);
$telegramToken = $telegramSettings->bot_token;
$adminChatId = $telegramSettings->admin_chat_id;

// Get user balance, phone number, and Telegram chat ID
$email = $_SESSION['alogin'];
$sql = "SELECT * from users where email = (:email);";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
$_SESSION['user_id'] = $result->id;
$initialBalance = $result->balance;   // User balance before the order
$phoneNumber = $result->mobile; // User's phone number

// Get cost
$select = "SELECT * FROM control";
$g = mysqli_query($link, $select);
$data = mysqli_fetch_assoc($g);
$ssprice = $data['cc_facebook_price'];

if (isset($_POST['submit'])) {
    if ($initialBalance < $ssprice) {
        $_SESSION['Error'] = "আপনার পর্যাপ্ত পরিমাণ ব্যালেন্স নাই, প্লিজ রিচার্জ করুন।";
    } else if ($initialBalance >= $ssprice) {
        $name = mysqli_real_escape_string($link, $_POST['name']);
        $nid_num = mysqli_real_escape_string($link, $_POST['nid_num']);
        $note = mysqli_real_escape_string($link, $_POST['note']);
        $csrfPost = mysqli_real_escape_string($link, $_POST['csrf']);

        date_default_timezone_set('Asia/Dhaka');
        $date_flt = date("Ymd");

        if ($_SESSION['csrf'] == $csrfPost) {
            // Insert into the database
            $sql = "INSERT INTO facebookcopy_sub (sub_type, nfvb, Name, Sub_by, date_flt) VALUES (:name, :nid_num,  :note, :user, :date_flt)";
            $user = $_SESSION['alogin'];

            $query = $dbh->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':nid_num', $nid_num, PDO::PARAM_STR);
            $query->bindParam(':note', $note, PDO::PARAM_STR);
            $query->bindParam(':user', $user, PDO::PARAM_STR);
            $query->bindParam(':date_flt', $date_flt, PDO::PARAM_STR);
            $query->execute();

            // Update user balance after order
            $newBalance = $initialBalance - $ssprice; // Calculate new balance
            $sqlBalanceUpdate = "UPDATE `users` SET `balance` = :newBalance WHERE `users`.`email` = :email";
            $queryBalanceUpdate = $dbh->prepare($sqlBalanceUpdate);
            $queryBalanceUpdate->bindParam(':newBalance', $newBalance, PDO::PARAM_STR);
            $queryBalanceUpdate->bindParam(':email', $_SESSION['alogin'], PDO::PARAM_STR);
            $queryBalanceUpdate->execute();

            // Send order details via Telegram bot to the admin
            $orderTime = date("Y-m-d h:i:s A");
            $adminMessage = "নতুন Facebook Details অর্ডার সফল হয়েছে।\n";
            $adminMessage .= "নাম: $name\n";
            $adminMessage .= "Nid Number: $nid_num\n";
            $adminMessage .= "নোট: $note\n";
            $adminMessage .= "ইমেইল: $email\n";
            $adminMessage .= "ফোন নম্বর: $phoneNumber\n";
            $adminMessage .= "সময়: $orderTime\n";
            $adminMessage .= "অর্ডারকারী বর্তমান ব্যালেন্স: $newBalance টাকা।"; // Updated balance after the order

            // Telegram API call to send to admin only
            $telegramUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";
            $telegramData = [
                'chat_id' => $adminChatId,
                'text' => $adminMessage,
                'parse_mode' => 'HTML'
            ];

            $options = [
                'http' => [
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($telegramData),
                ],
            ];

            $context = stream_context_create($options);
            $telegramResponse = file_get_contents($telegramUrl, false, $context);

            if ($telegramResponse === FALSE) {
                $_SESSION['Error'] = "Could not send message via Telegram.";
            }

            $_SESSION['Success'] = "অর্ডার সফল হয়েছে। শিগ্রই অ্যাাপ্রুভ করা হবে।";
        }
    }
}

// Generate new CSRF token
$csrf = md5(rand(1111, 99990));
$_SESSION['csrf'] = $csrf;

?>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
   
<?php
        include('includes/whatsapp.php');
?>
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
                        <h5 class="card-title fw-semibold mb-4 text-center">Facebook ID To location  অর্ডার করুন।</h5>
                        <div class="card">
                        
                            <div class="card-body">
                            <div class="alert alert-primary" role="alert">
                            Facebook ID To location   এর জন্য <?php echo $ssprice ?> টাকা কাটা হবে।
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
                                            <option value="" selected>Select</option>
                                            <option value="Facebook ID">Facebook ID</option>
                                           
                                            
                                          
                                        </select>
                                    </div>
                                   
                                    <div class="mb-3 text-center">
                                        <label class="form-label">Facebook ID Link*</label>
                                        <input type="text" name="nid_num" class="form-control" required>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <label class="form-label">Facebook ID To Location  সম্পর্কে বিস্তারিত লিখুনঃ(যদি কিছু বলার থাকে)</label>
                                        <textarea class="form-control" name="note" cols="30" rows="5"></textarea>
                                    </div>
                                    <input type="hidden" class="form-control" name="csrf" value="<?php echo $csrf ?>" >

                                    <?php 
                                        $se = 'SELECT * FROM control';
                                        $data = mysqli_query($link, $se);
                                        $d = mysqli_fetch_assoc($data);
                                        $onOff = $d['cc_facebook_control'];

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
                                <h6 class="fw-semibold mb-0">Facebook ID </h6>
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

                            <?php $sql = "SELECT * from facebookcopy_sub where Sub_by = (:email) ORDER BY id DESC;";

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
    														      
    									        $file_path = 'signcopies/'.$result->sign_copy;
    								                echo '<a href="'.$file_path.'" download="'.$result->sign_copy.'"><i class="fa-solid fa-download"></i></a>&nbsp;&nbsp;';
    									        }
    									        else if($result->status == 1){
    									            echo '<p class="text-warning">Your Request is Pending</p>';
    									        }
    									        else if($result->status == 3){
    									            echo '<p class="text-danger">'.htmlentities($result->comments).'</p>';
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