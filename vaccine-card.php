<?php
require_once("includes/html-header.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Import PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

// Include database and functions
require_once('includes/db.php');
require_once('includes/config.php');
require_once('function.php');
require_once('phpqrcode/qrlib.php');

// Get user balance, phone number, and Telegram chat ID
$email = $_SESSION['alogin'];
$sql = "SELECT * FROM users WHERE email = :email;";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);

$_SESSION['user_id'] = $result->id;
$initialBalance = $result->balance;   // User balance before the order
$phoneNumber = $result->mobile;       // User's phone number

// Get cost
$select = "SELECT * FROM control";
$g = mysqli_query($link, $select);
$data = mysqli_fetch_assoc($g);
$ssprice = $data['serverUnOffCost']; // Get the price from the database

// Form submission
if (isset($_POST['submit'])) {
    if ($ssprice) {
        try {
            // Check if the user has sufficient balance
            if ($initialBalance >= $ssprice) {
                // Collect form data
                $certi_no = htmlspecialchars($_POST['certi_no']);
                $type = htmlspecialchars($_POST['type']);
                $national_id = ($type == 'One') ? htmlspecialchars($_POST['national_id']) : htmlspecialchars($_POST['birth_id']);
                $passport_no = htmlspecialchars($_POST['passport_no']);
                $nationality = htmlspecialchars($_POST['nationality']);
                $name = htmlspecialchars($_POST['name']);
                $gender = htmlspecialchars($_POST['gender']);

                // Process date of birth
                $dd = $_POST['date_birth'];
                $date_birth = date('Y-m-d', strtotime(str_replace('/', '-', $dd)));

                // Process dose dates
                $doseone_date = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['doseone_date'])));
                $dosetwo_date = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['dosetwo_date'])));
                $dosethree_date = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['dosethree_date'])));

                // Dose names
                $doseone_name = ($_POST['doseone_name'] == 'other1') ? htmlspecialchars($_POST['doseone_name2']) : htmlspecialchars($_POST['doseone_name']);
                $dosetwo_name = ($_POST['dosetwo_name'] == 'other2') ? htmlspecialchars($_POST['dosetwo_name2']) : htmlspecialchars($_POST['dosetwo_name']);
                $dosethree_name = ($_POST['dosethree_name'] == 'other3') ? htmlspecialchars($_POST['dosethree_name2']) : htmlspecialchars($_POST['dosethree_name']);

                // Vaccination center and vaccinator
                $vacc_center = ($_POST['vacc_center'] == 'other') ? htmlspecialchars($_POST['vacc_center2']) : htmlspecialchars($_POST['vacc_center']);
                $vacc_by = htmlspecialchars($_POST['vacc_by']);
                $total_dose = (int) $_POST['total_dose'];

                // Generate QR Code
                $long_text = base64_encode($certi_no . "&lol=N2Y4MTU3NWI0YTkxMmFhY2FkYTFkMDRiNjQzN2NiNGQ2MmNlYmZkYWYwNzJjZmZjNWYyZTRhMTZjYmFkODI0NmEcgq6cuGWmw1iaQf2aqRuQvjegeC5fJNpTRv6-2lzdZjaydG8VLnI-9JyGj0ZCE2pY-CL");
                $url = "http://surokkha.gov.bd.bdtoolbd.xyz/check_verify.php?id=" . $long_text;
                $path = 'qr_img/';
                $file = $path . uniqid() . ".png";

                QRCode::png($url, $file, "L", 5, 5);

                // Initialize database connection
                $created_by = $_SESSION['alogin'];
                $user_id = $_SESSION['user_id'];
                $insertTime = date("Y-m-d H:i:s");

                // Insert data into tbl_submission
                $sql = "INSERT INTO tbl_submission 
                    (certi_no, type, national_id, passport_no, nationality, name, gender, date_birth, 
                    doseone_date, doseone_name, dosetwo_date, dosetwo_name, dosethree_date, dosethree_name, 
                    vacc_center, vacc_by, total_dose, qr_code, created_by, user_id, insert_time) 
                    VALUES 
                    (:certi_no, :type, :national_id, :passport_no, :nationality, :name, :gender, :date_birth, 
                    :doseone_date, :doseone_name, :dosetwo_date, :dosetwo_name, :dosethree_date, :dosethree_name, 
                    :vacc_center, :vacc_by, :total_dose, :qr_code, :created_by, :user_id, :insert_time)";

                $query = $dbh->prepare($sql);
                $query->bindParam(':certi_no', $certi_no, PDO::PARAM_STR);
                $query->bindParam(':type', $type, PDO::PARAM_STR);
                $query->bindParam(':national_id', $national_id, PDO::PARAM_STR);
                $query->bindParam(':passport_no', $passport_no, PDO::PARAM_STR);
                $query->bindParam(':nationality', $nationality, PDO::PARAM_STR);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':gender', $gender, PDO::PARAM_STR);
                $query->bindParam(':date_birth', $date_birth, PDO::PARAM_STR);
                $query->bindParam(':doseone_date', $doseone_date, PDO::PARAM_STR);
                $query->bindParam(':doseone_name', $doseone_name, PDO::PARAM_STR);
                $query->bindParam(':dosetwo_date', $dosetwo_date, PDO::PARAM_STR);
                $query->bindParam(':dosetwo_name', $dosetwo_name, PDO::PARAM_STR);
                $query->bindParam(':dosethree_date', $dosethree_date, PDO::PARAM_STR);
                $query->bindParam(':dosethree_name', $dosethree_name, PDO::PARAM_STR);
                $query->bindParam(':vacc_center', $vacc_center, PDO::PARAM_STR);
                $query->bindParam(':vacc_by', $vacc_by, PDO::PARAM_STR);
                $query->bindParam(':total_dose', $total_dose, PDO::PARAM_INT);
                $query->bindParam(':qr_code', $file, PDO::PARAM_STR);
                $query->bindParam(':created_by', $created_by, PDO::PARAM_STR);
                $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $query->bindParam(':insert_time', $insertTime, PDO::PARAM_STR);

                $query->execute();

                // Deduct balance
                $sql2 = "UPDATE users SET balance = balance - :ssprice WHERE email = :email";
                $query2 = $dbh->prepare($sql2);
                $query2->bindParam(':ssprice', $ssprice, PDO::PARAM_INT);
                $query2->bindParam(':email', $email, PDO::PARAM_STR);
                $query2->execute();

                echo "<script>alert('Submission successful.');</script>";
            } else {
                echo "<script>alert('Insufficient balance.');</script>";
            }
        } catch (Exception $e) {
            error_log("Submission error: " . $e->getMessage());
            echo "<script>alert('An unexpected error occurred. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Invalid price configuration.');</script>";
    }
}
?>

<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

<?php
// Include necessary QR/Function library here
require_once("function.php");
?>

<?php
    $rand = rand((int)100000000000, (int)999999999999);
?>


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
            <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                <?php $se = "SELECT * FROM notice";
                $data = mysqli_query($link, $se);
                $d = mysqli_fetch_assoc($data);
                echo $d['notice']; ?>
            </marquee>
            <!-- notice end -->
				<div class="card">
					<div class="card-body">
						             <form action="" method="post">
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
									              <div class="container mt-3">
                <p>
                  <?php
                  if ($ssprice) {
                    echo " ";
                  } else {
                    echo ' <div class="alert alert-danger">
   <strong>Sorry !</strong> You  do not have enough balance.
 </div>';
                  }

                  ?>
									                        <label>Certificate No :</label>
                        <input type="text" class="form-control" placeholder="Certificate No" name="certi_no" value="BD<?php echo $rand; ?>" >
                      </div>

                      <div class="mb-3">
                        <label> Choose any :</label> <br>
                        <input type="radio" name="type" value="One" checked /> NID No.
                        <input type="radio" name="type" value="Two" /> Birth No.
                      </div>


                      <div class="mb-3 myDiv" id="showOne">
                        <label>National ID :</label>
                        <input type="text" class="form-control" placeholder="National ID " name="national_id">
                      </div>

                      <div class="mb-3 myDiv" id="showTwo">
                        <label> Birth No:</label>
                        <input type="text" class="form-control" placeholder="Birth Number" name="birth_id">
                      </div>


                      <div class="mb-3 mt-3">
                        <label>Passport No.:</label>
                        <input type="text" class="form-control" placeholder="Passport No" name="passport_no">
                      </div>



                      <div class="mb-3">
                        <label>Nationality:</label>
                        <select class="form-select" name="nationality">
                          <option value="Bangladeshi">Bangladeshi</option>
                          <option value="India">India</option>

                        </select>
                      </div>



                      <div class="mb-3 mt-3">
                        <label for="email">Name:</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                      </div>



                      <div class="mb-3">
                        <label>Date of Birth:</label>
                        <input type="text" class="form-control" id="dob" name="date_birth" value="<?php echo date("d-m-Y"); ?>">
                      </div>

                      <div class="mb-3">
                        <label for="pwd">Gender:</label>
                        <select class="form-select" name="gender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>

                        </select>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <h4> Vaccination Details </h4>

                      <div class="mb-3 mt-3">
                        <label>Date of vaccination (Dose 1):</label>
                        <input type="text" class="form-control " id="dose-1" name="doseone_date" value="" placeholder="12-06-2022">
                      </div>

                      <div class="mb-3">
                        <label> Name of vaccine:</label>
                        <select class="form-control" name="doseone_name" onchange="vc1(this);">


                          <option></option>

                          <option value="1">Pfizer (Pfizer-BioNTech)</option>

                          <option value="2">COVISHIELD (AstraZeneca) 1</option>

                          <option value="3">Moderna (Moderna)</option>

                          <option value="4">Vero Cell (Sinopharm)</option>

                          <option value="5">Janssen (Johnson &amp; Johnson) 1</option>

                          <option value="other1">Other</option>

                        </select>
                      </div>
                      <label> Other vaccine Name:</label>
                      <div class="mb-3" id="ifYesv1" style="display: none;">
                        <input type="text " class="form-control" name="doseone_name2">
                      </div>

                      <div class="mb-3 mt-3">
                        <label>Date of vaccination (Dose 2):</label>
                        <input type="text" class="form-control" id="dose-2" name="dosetwo_date" value="" placeholder="12-06-2022">
                      </div>

                      <div class="mb-3">
                        <label> Name of vaccine:</label>
                        <select class="form-control" name="dosetwo_name" onchange="vc2(this);">


                          <option></option>
                          <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>

                          <option value="COVISHIELD (AstraZeneca)">COVISHIELD (AstraZeneca) 1</option>

                          <option value="Moderna (Moderna)">Moderna (Moderna)</option>

                          <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>

                          <option value="Janssen (Johnson &amp; Johnson)">Janssen (Johnson &amp; Johnson) 1</option>
                          <option value="other2">Other</option>

                        </select>
                      </div>

                      <label> Other vaccine Name:</label>
                      <div class="mb-3" id="ifYesv2" style="display: none;">
                        <input type="text " class="form-control" name="dosetwo_name2">
                      </div>


                      <div class="mb-3 mt-3">
                        <label>Date of vaccination (Dose 3):</label>
                        <input type="text" class="form-control" id="dose-3" name="dosethree_date" value="" placeholder="12-06-2022">
                      </div>

                      <div class="mb-3">
                        <label> Name of vaccine:</label>
                        <select class="form-control" name="dosethree_name" onchange="vc3(this);">


                          <option></option>
                          <option value="6">Pfizer</option>

                          <option value="1">Pfizer (Pfizer-BioNTech)</option>

                          <option value="2">COVISHIELD (AstraZeneca) 1</option>

                          <option value="3">Moderna (Moderna)</option>

                          <option value="4">Vero Cell (Sinopharm)</option>

                          <option value="5">Janssen (Johnson &amp; Johnson) 1</option>

                          <option value="other3">Other</option>

                        </select>
                      </div>

                      <label> Other vaccine Name:</label>
                      <div class="mb-3" id="ifYesv3" style="display: none;">
                        <input type="text " class="form-control" name="dosethree_name2">
                      </div>


                      <div class="mb-3 mt-3">
                        <label> vaccination Center:</label>

                        <select class="form-control" name="vacc_center" onchange="center(this);">
                          <option value="Bagerhat 250 Bed Hospital">Bagerhat 250 Bed Hospital</option>
                          <option value="Bandarban Sadar Hospital">Bandarban Sadar Hospital</option>
                          <option value="Barguna Zilla Sadar Government Hospital">Barguna Zilla Sadar Government Hospital</option>
                          <option value="Sher-E-Bangla Medical College Hospital">Sher-E-Bangla Medical College Hospital</option>
                          <option value="Bhola 250 bed District Sadar Hospital">Bhola 250 bed District Sadar Hospital</option>
                          <option value="Bogra 250 bed Mohammad Ali District Hospital">Bogra 250 bed Mohammad Ali District Hospital</option>
                          <option value="250 Bedded General Hospital, Brahmanbaria">250 Bedded General Hospital, Brahmanbaria</option>
                          <option value="Chandpur 250 Bed General Hospital">Chandpur 250 Bed General Hospital</option>
                          <option value="Chittagong 250 bed general hospital">Chittagong 250 bed general hospital</option>
                          <option value="Chuadanga Sadar Hospital">Chuadanga Sadar Hospital</option>
                          <option value="Comilla Medical College Hospital">Comilla Medical College Hospital</option>
                          <option value="250 Bed District Sadar Hospital, Cox's Bazar">250 Bed District Sadar Hospital, Cox's Bazar</option>
                          <option value="Dhaka Medical College Hospital">Dhaka Medical College Hospital</option>
                          <option value="Dinajpur 250 bed General Hospital">Dinajpur 250 bed General Hospital</option>
                          <option value="Bangabandhu Sheikh Mujib Medical College and Hospital">Bangabandhu Sheikh Mujib Medical College and Hospital</option>
                          <option value="Feni Government General Hospital">Feni Government General Hospital</option>
                          <option value="Zilla Government Hospital, Gaibandha">Zilla Government Hospital, Gaibandha</option>
                          <option value="Gazipur Sadar Upazila Health complex, Gazipur">Gazipur Sadar Upazila Health complex, Gazipur</option>
                          <option value="250 Bedded General Hospital, Gopalganj">250 Bedded General Hospital, Gopalganj</option>
                          <option value="Adhunik Zilla Sadar Hospital, Habiganj">Adhunik Zilla Sadar Hospital, Habiganj</option>
                          <option value="Joypurhat Adhunik Hospital">Joypurhat Adhunik Hospital</option>
                          <option value="250 Bed Jamalpur General Hospital, Jamalpur">250 Bed Jamalpur General Hospital, Jamalpur</option>
                          <option value="Jessore General Hospital">Jessore General Hospital</option>
                          <option value="Jhalokathi Sadar Hospital, Jhalokati">Jhalokathi Sadar Hospital, Jhalokati</option>
                          <option value="Jhenaidah Sadar Hospital">Jhenaidah Sadar Hospital</option>
                          <option value="Khagrachari District Sadar Hospital">Khagrachari District Sadar Hospital</option>
                          <option value="Khulna 250 Bed General Hospital">Khulna 250 Bed General Hospital</option>
                          <option value="Kishoreganj 250 Bed District Sadar Hospital">Kishoreganj 250 Bed District Sadar Hospital</option>
                          <option value="Kurigram General Hospital">Kurigram General Hospital</option>
                          <option value="Kushtia General Hospital">Kushtia General Hospital</option>
                          <option value="Lakshmipur Sadar Hospital">Lakshmipur Sadar Hospital</option>
                          <option value="Lalmonirhat Sadar Hospital">Lalmonirhat Sadar Hospital</option>
                          <option value="Madaripur Sadar Hospital">Madaripur Sadar Hospital</option>
                          <option value="Chittagong Medical College Hospital">Chittagong Medical College Hospital</option>
                          <option value="Sheikh Russel National Gastroliver Institute &amp; Hospital">Sheikh Russel National Gastroliver Institute &amp; Hospital</option>
                          <option value="Shaheed Suhrawardy Medical College &amp; Hospital">Shaheed Suhrawardy Medical College &amp; Hospital</option>
                          <option value="Kurmitola 500 Bed General Hospital">Kurmitola 500 Bed General Hospital</option>
                          <option value="Dhaka Metropolitan General Hospital">Dhaka Metropolitan General Hospital</option>
                          <option value="Central Police Hospital, Rajarbag, Dhaka">Central Police Hospital, Rajarbag, Dhaka</option>
                          <option value="Sheikh Hasina National Institute of Burn &amp; Plastic Surgery ">Sheikh Hasina National Institute of Burn &amp; Plastic Surgery </option>
                          <option value="Mugda 500 Bed General Hospital">Mugda 500 Bed General Hospital</option>
                          <option value="Sir Salimullah Medical College Mitford Hospital">Sir Salimullah Medical College Mitford Hospital</option>
                          <option value="DNCC Dedicated Covid-19 Hospital, Dhaka">DNCC Dedicated Covid-19 Hospital, Dhaka</option>
                          <option value="Police Hospital, Chittagong">Police Hospital, Chittagong</option>
                          <option value="Combined Military Hospital (CMH)">Combined Military Hospital (CMH)</option>
                          <option value="Bondar Tila Maternity Hospital">Bondar Tila Maternity Hospital</option>
                          <option value="City Corporation General Hospital, Chittagong">City Corporation General Hospital, Chittagong</option>
                          <option value="Safa Motaleb Maternity Hospital">Safa Motaleb Maternity Hospital</option>
                          <option value="Mostafa-Hakim Maternity Hospital">Mostafa-Hakim Maternity Hospital</option>
                          <option value="BNS Patenga, Chittagong">BNS Patenga, Chittagong</option>
                          <option value="Medical Squadron, BAF Zahur, Chittagong">Medical Squadron, BAF Zahur, Chittagong</option>
                          <option value="Chattogram Port Hospital">Chattogram Port Hospital</option>
                          <option value="Upazila Health Complex, Anowara">Upazila Health Complex, Anowara</option>
                          <option value="Upazila Health Complex, Karnafuli">Upazila Health Complex, Karnafuli</option>
                          <option value="Upazila Health Complex, Hathazari">Upazila Health Complex, Hathazari</option>
                          <option value="Barisal (sadar) Upazila Health Office">Barisal (sadar) Upazila Health Office</option>
                          <option value="Zilla Sadar Hospital, Barisal">Zilla Sadar Hospital, Barisal</option>
                          <option value="Police Hospital, Barisal">Police Hospital, Barisal</option>
                          <option value="Upazila Health Complex, Gauranadi">Upazila Health Complex, Gauranadi</option>
                          <option value="250 Bed General Hospital, Khulna">250 Bed General Hospital, Khulna</option>
                          <option value="Khulna Medical College Hospital">Khulna Medical College Hospital</option>
                          <option value="Police Hospital, Khulna">Police Hospital, Khulna</option>
                          <option value="BNS Upsham Khulna">BNS Upsham Khulna</option>
                          <option value="Shaheed Sheikh Abu Naser Specialized Hospital">Shaheed Sheikh Abu Naser Specialized Hospital</option>
                          <option value="Bogura (sadar) Upazila Health Office">Bogura (sadar) Upazila Health Office</option>
                          <option value="Rajshahi Medical College Hospital">Rajshahi Medical College Hospital</option>
                          <option value="Police Hospital, Rajshahi">Police Hospital, Rajshahi</option>
                          <option value="Combined Military Hospital (CMH), Rajshahi">Combined Military Hospital (CMH), Rajshahi</option>
                          <option value="Infected Disease Hospital">Infected Disease Hospital</option>
                          <option value="250 Bed Zilla Sadar Hospital, Feni">250 Bed Zilla Sadar Hospital, Feni</option>
                          <option value="Feni (sadar) Upazila Health Office">Feni (sadar) Upazila Health Office</option>
                          <option value="Upazila Health Complex, Dagonbhuiyan">Upazila Health Complex, Dagonbhuiyan</option>
                          <option value="Police Hospital, Feni">Police Hospital, Feni</option>
                          <option value="250 Bed General Hospital, Hobiganj">250 Bed General Hospital, Hobiganj</option>
                          <option value="Moulavibazar 250 Bed Zilla Sadar Hospital">Moulavibazar 250 Bed Zilla Sadar Hospital</option>
                          <option value="Sunamganj 250 Bed Zilla Sadar Hospital">Sunamganj 250 Bed Zilla Sadar Hospital</option>
                          <option value="Sylhet MAG Osmani Medical College Hospital-2">Sylhet MAG Osmani Medical College Hospital-2</option>
                          <option value="Combined Military Hospital (CMH), Jalalabad">Combined Military Hospital (CMH), Jalalabad</option>
                          <option value="Sylhet (sadar) Upazila Health Office">Sylhet (sadar) Upazila Health Office</option>
                          <option value="Sylhet M.A.G Osmani Medical College Hospital">Sylhet M.A.G Osmani Medical College Hospital</option>
                          <option value="Police Hospital, Sylhet">Police Hospital, Sylhet</option>
                          <option value="Zilla Sadar Hospital, Comilla">Zilla Sadar Hospital, Comilla</option>
                          <option value="Combined Military Hospital (CMH), Comilla">Combined Military Hospital (CMH), Comilla</option>
                          <option value="250 Bed General Hospital, Kishoreganj">250 Bed General Hospital, Kishoreganj</option>
                          <option value="Jessore 250 Bed General  Hospital">Jessore 250 Bed General Hospital</option>
                          <option value="250 bed General hospital, habiganj">250 bed General hospital, habiganj</option>
                          <option value="Magura 250 bed District Hospital">Magura 250 bed District Hospital</option>
                          <option value="250 Bed District Hospital, Manikganj">250 Bed District Hospital, Manikganj</option>
                          <option value="Meherpur 250 Bed District Hospital">Meherpur 250 Bed District Hospital</option>
                          <option value="Moulvibazar Sodor Hospital">Moulvibazar Sodor Hospital</option>
                          <option value="Munshiganj 250 bed District Hospital">Munshiganj 250 bed District Hospital</option>
                          <option value="Mymensingh gov Medical Hospital">Mymensingh gov Medical Hospital</option>
                          <option value="Naogaon 250 bed District Hospital">Naogaon 250 bed District Hospital</option>
                          <option value="Narail Sadar Hospital">Narail Sadar Hospital</option>
                          <option value="Narayanganj 300 Bed Hospital">Narayanganj 300 Bed Hospital</option>
                          <option value="Narsingdi 100 Bed Zilla Hospital">Narsingdi 100 Bed Zilla Hospital</option>
                          <option value="Natore Sadar Hospital">Natore Sadar Hospital</option>
                          <option value="Nawabganj Upazila Health Complex">Nawabganj Upazila Health Complex</option>
                          <option value="Netrakona Sadar Hospital">Netrakona Sadar Hospital</option>
                          <option value="Nilphamari 250 bed District Hospital">Nilphamari 250 bed District Hospital</option>
                          <option value="Noakhali 250 Bed General Hospital">Noakhali 250 Bed General Hospital</option>
                          <option value="Pabna 250 bed General Hospital">Pabna 250 bed General Hospital</option>
                          <option value="Panchagarh District Hospital">Panchagarh District Hospital</option>
                          <option value="Parbatya Chattagram Government Hospital">Parbatya Chattagram Government Hospital</option>
                          <option value="Patuakhali 250 bed Sadar Hospital">Patuakhali 250 bed Sadar Hospital</option>
                          <option value="Pirojpur District Hospital">Pirojpur District Hospital</option>
                          <option value="Rajbari General Hospital">Rajbari General Hospital</option>
                          <option value="Department Of Orthopedic Surgery And Traumatology (Gent's)">Department Of Orthopedic Surgery And Traumatology (Gent's)</option>
                          <option value="Upazila Health Complex, Sadar Rangpur">Upazila Health Complex, Sadar Rangpur</option>
                          <option value="Satkhira Sadar Hospital">Satkhira Sadar Hospital</option>
                          <option value="Shariatpur Sadar Hospital">Shariatpur Sadar Hospital</option>
                          <option value="District Hospital, Sherpur">District Hospital, Sherpur</option>
                          <option value="Sheikh Fazilatunnessa Mujib General Hospital, Sirajganj">Sheikh Fazilatunnessa Mujib General Hospital, Sirajganj</option>
                          <option value="Sunamganj Sadar Hospital">Sunamganj Sadar Hospital</option>
                          <option value="Sylhet District Hospital">Sylhet District Hospital</option>
                          <option value="Tangail 250 Bed District Hospital">Tangail 250 Bed District Hospital</option>
                          <option value="Adhunik Sadar Hospital">Adhunik Sadar Hospital</option>
                          <option value="other">Other</option>
                        </select>

                      </div>
                      <label> Other vaccination Center :</label>
                      <div class="mb-3" id="ifYes" style="display: none;">
                        <input type="text " class="form-control" name="vacc_center2">
                      </div>

                      <div class="mb-3">
                        <label> vaccination By :</label>
                        <input type="text " class="form-control" value="Directorate General of Health Services (DGHS)" name="vacc_by">
                      </div>

                      <div class="mb-3">
                        <label> Total Dose Given :</label>
                        <input type="text " class="form-control" placeholder="Total Dose Given" name="total_dose">
                      </div>
<?php
echo '<div class="alert alert-danger">
   <strong>Note:</strong> You will be charged ' . $ssprice . ' tk by clicking submit
 </div>';
?>

                      <input type="submit" name="submit" class="btn btn-primary" value="submit" />
                      
                   
                    </div>

                  
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
      <script>
    function center(that) {
      if (that.value == "other") {
        alert("Please enter the vaccination Center Name");
        document.getElementById("ifYes").style.display = "block";
      } else {
        document.getElementById("ifYes").style.display = "none";
      }
    }

    function vc1(that) {
      if (that.value == "other1") {
        alert("Please enter the vaccination Center Name");
        document.getElementById("ifYesv1").style.display = "block";
      } else {
        document.getElementById("ifYesv1").style.display = "none";
      }
    }

    function vc2(that) {
      if (that.value == "other2") {
        alert("Please enter the vaccine Name");
        document.getElementById("ifYesv2").style.display = "block";
      } else {
        document.getElementById("ifYesv2").style.display = "none";
      }
    }

    function vc3(that) {
      if (that.value == "other3") {
        alert("Please enter the vaccine Name");
        document.getElementById("ifYesv3").style.display = "block";
      } else {
        document.getElementById("ifYesv3").style.display = "none";
      }
    }
  </script>
</body>

</html>