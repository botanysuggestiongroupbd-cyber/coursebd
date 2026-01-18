<?php
session_start();
error_reporting(1);
include('includes/db.php');
include('includes/config.php');

if (!isset($_SESSION['alogin'])) {
    header('location:login.php');
    exit();
}

// Fetch current user and pricing details
$id = $_SESSION['alogin'];
$controlQuery = "SELECT cc_tin_price FROM control";
$controlResult = mysqli_query($link, $controlQuery);
$controlData = mysqli_fetch_assoc($controlResult);
$cc_tin_price = $controlData['cc_tin_price'];

$userQuery = "SELECT * FROM users WHERE email='$id'";
$userResult = mysqli_query($link, $userQuery);
$userData = mysqli_fetch_assoc($userResult);

if (!$userData) {
    echo '<script>alert("User not found.");</script>';
    exit();
}

$userEmail = $userData['email'];
$userBalance = $userData['balance'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tin'])) {
    $tin = $_POST['tin'];

    // Fetch TIN details from the API
    $apiUrl = "https://api.best-x.store/TIN/Master.php?Json&tin=$tin&key=Sakib76255_20_Json";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['data'])) {
        // Extract TIN details
        $tinNumber = $data['data']['tin'];
    $name = $data['data']['name'];
    $fatherName = $data['data']['father_name'];
    $motherName = $data['data']['mother_name'];
    $currentAddress = $data['data']['current_address'];
    $permanentAddress = $data['data']['permanent_address'];
    $previousTin = $data['data']['previous_tin'];
    $status = $data['data']['status'];
    $date = $data['data']['date'];
    $taxOffice = $data['data']['tax_office']['circle'];
    $taxZone = $data['data']['tax_office']['zone'];
    $taxAddress = $data['data']['tax_office']['address'];
    $taxPhone = $data['data']['tax_office']['phone'];
    $qrCode = $data['data']['qr_code'];

        // Check if user has sufficient balance
        if ($userBalance >= $cc_tin_price) {
            // Deduct balance
            $updateBalanceQuery = "UPDATE users SET balance = balance - $cc_tin_price WHERE email = '$userEmail'";
            if (mysqli_query($link, $updateBalanceQuery)) {
                echo "";

                
            } else {
                echo '<script>alert("Failed to update user balance.");</script>';
            }
        } else {
            echo '<script>alert("Insufficient balance. Please recharge your account.");</script>';
        }
    } else {
        echo '<script>alert("Invalid TIN or API key.");</script>';
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $tinNumber; ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title></title>
	<link href="https://surokkha.gov.bd/favicon.png" rel="icon">
	<link href="https://surokkha.gov.bd/favicon.png" rel="apple-touch-icon">
	<link rel="stylesheet" href="https://site-Assets.fontawesome.com/releases/v6.1.1/css/all.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
	<style>@page {size: A4;margin: 0;}body {margin: 0;}.background {background-color: lightgrey;position: relative;width: 794px;height: 1123px;margin: auto;transform: scale(1.08);text-align: left;margin-top: 40px;}.crane {max-width: 100%;height: 100%;}.topTitle {position: absolute;left: 21%;top: 8%;width: auto;font-size: 42px;color: rgb(255, 182, 47);}
	
	#loadMe {visibility: hidden;}@media print {html,body {width: 210mm !important;height: 297mm !important;background-color: #fff !important;}.print {display: none !important;}}#print {background: #03a9f4;padding: 8px;width: 750px;height: 50px;border: 0px;font-size: 25px;font-weight: bold;cursor: pointer;box-shadow: 1px 4px 4px #878787;color: #fff;border-radius: 10px;margin: 80px 0;display: none;}</style>
</head>
<body onload="showprint()" style="text-align: center;">
    		<div class="background">
			<img class="crane" src="https://api.best-x.store/TIN/tinBG.jpg" height="1123px" width="794px">
			
		
			
			
			<div style="position: absolute; left: 24.9%; top: 14.1%; width: auto; font-size: 18px; color: rgb(7, 7, 7);"><span style="font-weight: bold;">Government of the People's Republic of Bangladesh</span></div>
			
			
					
			<div style="position: absolute; left: 36.9%; top: 16.3%; width: auto; font-size: 18px; color: rgb(7, 7, 7);"><span style="font-weight: bold;">National Board of Revenue</span></div>
			
			
							
			<div style="position: absolute; left: 26.8%; top: 18.5%; width: auto; font-size: 18px; color: rgb(7, 7, 7);">Taxpayer's Identification Number (TIN) Certificate</div>
				
			
			
			
			<div style="position: absolute; left: 40.6%; top: 21.5%; width: auto; font-size: 17px; color: rgb(7, 7, 7);"><span style="font-weight: bold; text-decoration: underline;"><?php echo $tinNumber; ?></span></div>
			
			
			
			<div id="that"style="position: absolute; left: 9.6%; top: 24.8%; width: 81%; font-size: 15.2px; color: rgb(7, 7, 7);">This is to Certify that <span style="font-weight: bold;"><?php echo $name; ?>			
			</span> is a Registered Taxpayer of National Board of Revenue under the jurisdiction of <span style="font-weight: bold;"><?php echo $taxOffice; ?></span>, Taxes Zone <span style="font-weight: bold;">
			    <?php echo $taxZone; ?></span>.</div>
			
			<div id="tax_par"style="position: absolute; left: 9.6%; top: 29.5%; width: 80%; font-size: 15px; color: rgb(7, 7, 7);"><span style="font-weight: bold;">Taxpayer's Particulars :</span></div>
			<div id="name"style="position: absolute; left: 9.6%; top: 31.4%; width: 80%; font-size: 15px; color: rgb(7, 7, 7);">1) Name : <span style="font-weight: bold;"><?php echo $name; ?></span></div>
			<div id="father_name"style="position: absolute; left: 9.6%; top: 33.5%; width: 80%; font-size: 15px; color: rgb(7, 7, 7);">2) Father's Name : <span style="font-weight: bold;"><?php echo $fatherName; ?></span></div>
			<div id="mother_name"style="position: absolute; left: 9.6%; top: 35.5%; width: 80%; font-size: 15px; color: rgb(7, 7, 7);">3) Mother's Name : <span style="font-weight: bold;"><?php echo $motherName; ?></span></div>
			<div id="address"style="position: absolute; left: 9.6%; top: 37.6%; width: 81%; font-size: 15px; color: rgb(7, 7, 7);">4).a) Current Address : <span style="font-weight: bold;"><?php echo $currentAddress; ?></span></div>
			<div id="address_per"style="position: absolute; left: 9.6%; top: 40.5%; width: 81%; font-size: 15px; color: rgb(7, 7, 7);">4).b) Permanent Address : <span style="font-weight: bold;"><?php echo $permanentAddress; ?></span></div>
			<div id="preview_tin"style="position: absolute; left: 9.6%; top: 44%; width: 81%; font-size: 15px; color: rgb(7, 7, 7);">5) Previous TIN : <span style="font-weight: bold;"><?php echo $previousTin; ?></span></div>
            <div id="status"style="position: absolute; left: 9.6%; top: 46.1%; width: 81%; font-size: 15px; color: rgb(7, 7, 7);">6) Status : <span style="font-weight: bold;"><?php echo $status; ?></span></div>		
			<div id="date"style="position: absolute; left: 9.6%; top: 52.6%; width: 81%; font-size: 15px; color: rgb(7, 7, 7);"><?php echo $date; ?><span style="font-weight: bold;"></span></div>
			
			
			
			
			<div id="note"style="position: absolute; left: 10.4%; top: 55.2%; width: 81%; font-size: 16px; color: rgb(7, 7, 7);"><span style="font-weight: bold; text-decoration: underline;">Please Note:</span></div>
			
			
			<div id="law"style="position: absolute; left: 10.4%; top: 57.5%; width: 23%; font-size: 10px; color: rgb(7, 7, 7);">1.</div>
			
			
			<div id="law1"style="position: absolute; left: 12.1%; top: 57.5%; width: 23%; font-size: 10px; color: rgb(7, 7, 7);">A Taxpayer is liable to file the Return of Income under section 166 of the Income Tax Act, 2023</div>
		
			
			
						
			<div id="law3"style="position: absolute; left: 10.4%; top: 60.9%; width: 23%; font-size: 10px; color: rgb(7, 7, 7);">2.</div>
			
			
			<div id="law4"style="position: absolute; left: 12.1%; top: 60.9%; width: 23%; font-size: 10px; color: rgb(7, 7, 7);">Failure to file Return of Income under Section 166 is liable to-</div>
		
			
			
						
			<div id="law5"style="position: absolute; left: 12.1%; top: 63.2%; width: 23%; font-size: 10px; color: rgb(7, 7, 7);">(a) Penalty under section 266; and</div>
		
						
			<div id="law6"style="position: absolute; left: 12.1%; top: 64.7%; width: 23%; font-size: 10px; color: rgb(7, 7, 7);">(b) Prosecution under section 311 of the Income Tax Act, 2023.</div>
		
			
			<div id="tax_off"style="position: absolute; left: 67.3%; top: 54.8%; width: 22%; font-size: 10px; color: rgb(7, 7, 7);"><span style="font-weight: bold;">Deputy Commissioner of Taxes</span></div>
			
			<div id="tax_off"style="position: absolute; left: 67.3%; top: 55.8%; width: 22%; font-size: 9.5px; color: rgb(7, 7, 7);"><?php echo $taxOffice; ?><span style="font-weight: bold;"></span></div>
			<div id="tax_zone"style="position: absolute; left: 67.3%; top: 56.9%; width: 22%; font-size: 9.5px; color: rgb(7, 7, 7);">Taxes Zone  <?php echo $taxZone; ?><span style="font-weight: bold;"></span></div>
			<div id="tax_add"style="position: absolute; left: 67.3%; top: 57.9%; width: 22%; font-size: 9.5px; color: rgb(7, 7, 7);"><?php echo $taxAddress; ?> <?php echo $taxPhone; ?><span style="font-weight: bold;"></span></div>
			
			<div id="tax_phon"style="position: absolute; left: 67.3%; top: 59.9%; width: 22%; font-size: 9.5px; color: rgb(7, 7, 7);"><span style="font-weight: bold;"></span></div>
			
			
			
			
			
			
			<div id="nbfooter"style="position: absolute; left: 30%; top: 71.3%; width: 81%; font-size: 9.7px; color: rgb(7, 7, 7);"><span style="font-weight: bold; text-decoration: underline;">N. B: This is a system generated certificate and requires no manual signature.</span></div>
			
			
			
			
			<div style="position: absolute;  left: 41.9%; top: 55%; width: auto; font-size: 12px; color: rgb(3, 3, 3);">
				<img id="qr" src="<?php echo $qrCode; ?>" height="140px" width="140px" /></div>
		</div>
		
</body>

 <script>
        window.print();
        document.addEventListener('contextmenu', event => event.preventDefault());
        function handleClick(event) {
            window.print();
        }
        document.addEventListener('click', handleClick);
    </script>
</html> 