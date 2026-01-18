<?php
session_start();
error_reporting(1);
include('includes/db.php');
include('includes/config.php');

if (!isset($_SESSION['alogin'])) {
    header('location:login.php');
    die();
}

function image($api){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $api);
    curl_setopt($curl, CURLOPT_TIMEOUT, 60);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    $contents = curl_exec($curl);
    curl_close($curl);
    
    $img = 'image/' . md5($contents) . '.png';
    file_put_contents($img, $contents);
    return $img;
}

$id = $_SESSION['alogin'];
$select = "SELECT * FROM control";
$g = mysqli_query($link, $select);
$data = mysqli_fetch_assoc($g);
$cc_server_unofficial_price = $data['cc_server_unofficial_price'];

$sql = "SELECT * FROM users WHERE email='$id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$email = $row['email'];
$balance = $row['balance'];

if (isset($_POST['nid']) && isset($_POST['dob'])) {
    $nid = $_POST['nid'];
    $dob = $_POST['dob'];

    // First API
    $apiUrl = "https://api-store.top/svbalance/Api.php?key=sakib&nid=" . $nid . "&dob=" . $dob;
    $response = file_get_contents($apiUrl); 
    $responseData = json_decode($response, true);

    // Check if valid data is returned from the API
    if (isset($responseData['data']) && !empty($responseData['data'])) {
        // User info
        $reqid = $responseData['data']['requestId'] ?? 'N/A';
        $name  = $responseData['data']['name'] ?? 'N/A';
        $nameEn  = $responseData['data']['nameEn'] ?? 'N/A';
        $pin = $responseData['data']['pin'] ?? 'N/A';
        $nationalId  = $responseData['data']['nationalId'] ?? 'N/A';
        $vsl = $responseData['data']['voter_sl_no'] ?? 'N/A'; 
        $voterNo = $responseData['data']['voter_no'] ?? 'N/A'; 
        $voterArea = $responseData['data']['voterAreaCode'] ?? 'N/A';
        $dateOfBirth  = $dob;
        $photo = $responseData['data']['photo'] ?? 'N/A';
        $gender = $responseData['data']['gender'] ?? 'N/A';
        $spouse = $responseData['data']['spouse'] ?? 'N/A';  
        $occupation = $responseData['data']['occupation'] ?? 'N/A';
        $mobile = $responseData['data']['mobile'] ?? 'N/A';
        $bloodGroup = "<span style='color:red;'>" . ($responseData['data']['bloodGroup'] ?? 'N/A') . "</span>";
        $religion = $responseData['data']['religion'] ?? 'N/A';
        $birthPlace = $responseData['data']['permanentAddress']['district'] ?? 'N/A';

        // Father and mother info
        $father = $responseData['data']['father'] ?? 'N/A';
        $mother = $responseData['data']['mother'] ?? 'N/A';
        $nidFather = $responseData['data']['nidFather'] ?? 'N/A';
        $nidMother = $responseData['data']['nidMother'] ?? 'N/A';

        // Address Line
        $permanentAddress = $responseData['data']['permanentAddress']['addressLine'] ?? 'N/A';
        $presentAddress = $responseData['data']['presentAddress']['addressLine'] ?? 'N/A';

        // Deduct balance only if data is found
        if ($balance >= $cc_server_unofficial_price) {
            $newBalance = $balance - $cc_server_unofficial_price;
            $updateQuery = "UPDATE users SET balance='$newBalance' WHERE email='$id'";
            mysqli_query($link, $updateQuery);
        } else {
            echo "Insufficient balance.";
        }

    } else {
        echo "No data found for the provided NID and DOB.";
    }
} else {
    echo json_encode(array("error" => "NID or DOB not provided"), JSON_UNESCAPED_UNICODE);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $nameEn; ?></title>
<style>
        * {
            margin: 0;
            padding: 0;

        }

        .container {
            position: relative;
        }

        .bgImg {
            width: 210mm;
            height: 297mm;
        }

        .avatar {
            width: 130px;
            height: 151px;
            position: absolute;
            top: 187px;
            left: 333px;
            background: red;
            border-radius: 16px;
        }

        p {
            font-size: 15px;
        }

        p.inLeft {
            position: absolute;
            left: 110px;
            opacity: 0.9;
        }

        p.relagionKey.inLeft {
            top: 790px;
        }

        p.mobileKey.inLeft {
            top: 817px;
        }



        p.inRight {
            max-height: 0.393in;
            max-width: 6.33in;
        }

        .inRight {
            position: absolute;
            left: 264px;
        }

        p.nid.inRight {
            top: 400px;
        }

        p.pin.inRight {
            top: 428px;
        }

        p.formNo.inRight {
            top: 457px;
        }
        p.pinNo.inRight {
            top: 430px;
        }
        p.VoterNo.inRight {
            top: 482px;
        }

        p.vArea.inRight {
            top: 510px;
        }

        p.nameBn.inRight {
            top: 567px;
            font-weight: bold;
        }

        p.nameEn.inRight {
            top: 595px;
        }

        p.dob.inRight {
            top: 623px;
        }

        p.fName.inRight {
            top: 649px;
        }

        p.mName.inRight {
            top: 677px;
        }

        p.husWif.inRight {
            top: 703px;
        }

        p.gender.inRight {
            top: 762px;
        }

        p.phone.inRight {
            top: 819px;
        }

        p.relagion.inRight {
            top: 791px;
        }

        p.birthPlace.inRight {
            top: 845px;
        }

        p.address {
            max-width: 575px;
            position: absolute;

            left: 110px;
            font-size: 12px;
            line-height: 18px;
        }

        .presentAddr {
            top: 902px;
        }

        .permanentAddr {
            top: 975px;
        }

        button.PrintBtn {
            width: 150px;
            background: #8a00ff;
            padding: 10px;
            font-weight: bold;
            cursor: pointer;
            display: block;
            margin: auto;
            margin-bottom: 100px;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
        }


        @media print {
            @page {
                size: A4;
                /* Set the page size to 'auto' to match the content size */
                margin: 0;
                /* Set margin to 0 to remove header and footer */
            }

            button.PrintBtn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="bgImg" src="v2.jpg" alt="">
        <img src="<?php echo $photo ?>" alt="" class="avatar">
        
        <p class="relagionKey inLeft">ধর্ম</p>
        <p class="mobileKey inLeft">পেশা</p>
        <p class="nid inRight"><?php echo $nationalId ?></p>
        <p class="pin inRight"><?php echo $pin ?></p>
        <p class="formNo inRight"><?PHP echo $vsl ?></p>
        <p class="VoterNo inRight"><?php echo $voterNo ?></p>
        <p class="vArea inRight"><?php echo $voterArea ?></p>
        <p class="nameBn inRight"><?php echo $name ?></p>
        <p class="nameEn inRight"><?php echo $nameEn ?></p>
        <p class="dob inRight"><?php echo $dateOfBirth ?></p>
        <p class="fName inRight"><?php echo $father ?></p>
        <p class="mName inRight"><?php echo $mother ?></p>
        <p class="husWif inRight"><?php echo $spouse ?></p>
        <p class="gender inRight"><?php echo $gender ?></p>
        <p class="relagion inRight"><?php echo $religion ?></p>
        <p class="phone inRight"><?php echo $occupation ?></p>
        <p class="birthPlace inRight"><?php echo $birthPlace ?></p>
        <p class="address presentAddr"><?php echo $presentAddress ?></p>
        <p class="address permanentAddr"><?php echo $permanentAddress ?></p>
    </div>
    <button class="PrintBtn" onclick="window.print()">Print</button>
</body>
</html>