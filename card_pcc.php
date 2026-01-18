<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('includes/db.php');
include('includes/config.php');

// Ensure the session variable is set
$id = $_SESSION['alogin'] ?? null;
if (!$id) {
    die("Error: Session not set. Please log in.");
}

// Fetch control data
$select = "SELECT * FROM control";
$g = mysqli_query($link, $select) or die("Error fetching control data: " . mysqli_error($link));
$data = mysqli_fetch_assoc($g);
$cost = $data['cc_card_price'] ?? 0;

// Fetch user data
$sql = "SELECT * FROM users WHERE email='$id'";
$result = mysqli_query($link, $sql) or die("Error fetching user data: " . mysqli_error($link));

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    $email = $row['email'];
    $balance = $row['balance'];

    if ($balance >= $cost) {
        // Deduct balance
        $sql2 = "UPDATE users SET balance = balance - $cost WHERE email = '$email'";
        if (mysqli_query($link, $sql2)) {
            // Collect form data
            $unique_id = $_POST['unique_id'] ?? '';
            $name = ucwords(strtolower($_POST['name'] ?? ''));
            $father = ucwords(strtolower($_POST['father'] ?? ''));
            $village = $_POST['village'] ?? '';
            $post_office = $_POST['post_office'] ?? '';
            $issue_date = $_POST['issue_date'] ?? '';
            $ref_no = $_POST['ref_no'] ?? '';
            $date = $_POST['date'] ?? '';
            $police_station = $_POST['police_station'] ?? '';
            $district = $_POST['district'] ?? '';
            $passport = ucwords(strtolower($_POST['passport'] ?? ''));

            // Ensure $unique_id is set before generating the qrLink
            if (!empty($unique_id)) {
                $qrLink = "https://pcc.police.gov.bd.bdtoolbd.xyz/verify.php?uniqueid=$unique_id";

                // Insert data into pcc_log
                $sql3 = "INSERT INTO pcc_log (id, user, unique_id, name, father, village, post_office, issue_date, ref_no, qrLink, date, police_station, district, passport) 
                VALUES (NULL, '$id', '$unique_id', '$name', '$father', '$village', '$post_office', '$issue_date', '$ref_no', '$qrLink', '$date', '$police_station', '$district', '$passport')";
               if (mysqli_query($link, $sql3)) {
                echo "";
            } else {
                die("Error inserting data: " . mysqli_error($link));
            }
        } else {
            die("Error updating balance: " . mysqli_error($link));
        }
    } else {
        die("Error: Insufficient balance.");
    }
} else {
    die("Error: User not found.");
}
?>

<html><head><title>Police Clearance Certificate</title></head><body>
                                    <style>
                                    @page  {
                                        margin: 0 !important;
                                        size: A4 !important;
                                        color-adjust: exact !important;
                                        -webkit-print-color-adjust: exact !important;
                                        print-color-adjust: exact !important;
                                        background-color: #fff !important;
                                    }

                                    @media  print {

                                        html,
                                        body {
                                            width: 210mm !important;
                                            height: 297mm !important;
                                            background-color: #fff !important;
                                            font-family: 'arial' !important;
                                        }
                                    }

                                   .main
              {
              
              background-repeat: no-repeat;
              background-position: center center;
              width: 580px; 
              margin: 0 auto;
              
              
      }
      .font_size1
      {
       font-size:19px;
      }
       
	#seal {
		width:100%;
		height:250px;
		float:left;
	}
	.seal_pad {
		width:50%;
		height:100%;
		float:left;
	}
	.seal_officer {
		width:49%;
		height:100%;
		float:left;
	}
	#img {
		width:100px;
		margin:0px auto;
	}
	#img img {
		width:100px;
		
	}
	.text_p {
		text-align:center;
	}
      .cr_code
      {
       float:left;
      }
                                    </style>
                                     <div class="main">
                                        <div id="img">
                                            <img src="https://demo.courcenet.my.id/assets/police/img/bangladesh_govt_logo.png">
                                        </div>

                                        <div class="text_p">
                                            <p style="font-size: 22px">
                                                <b>GOVERNMENT OF THE PEOPLE'S REPUBLIC OF <br />BANGLADESH</b>
                                            </p>
                                        </div>

                                        <!--This QR is not for verify purpus -->

                                        <!--img style="float: left; margin-top: 5px"
                                            src="https://chart.googleapis.com/chart?chs=190x190&amp;cht=qr&amp;chl=ords/f?p=&501:155:::NO:RP:P155_PID:3155350"
                                            alt="" title="PCC" width="80" height="80" /-->
                                       <img style="float: left; margin-top: 5px"
                                            src="https://api.qrserver.com/v1/create-qr-code/?data=https://pcc.police.gov.bd.bdtoolbd.xyz/verify.php?uniqueid=<?php echo $unique_id; ?>" alt="" title="PCC"
                                            width="80" height="80" />

                                        <div style="text-align:center;                      
                      /* float: left; */
                      margin-right: 80px;">
                                            <p class="font_size"><?php echo $police_station; ?>
                                            </p>
                                            <p class="font_size"><?php echo $district; ?></p>
                                        </div>
                                        <table width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td class="font_size">Ref No. <?php echo $ref_no; ?></td>
                                                    <td class="font_size" style="text-align: right">
                                                        Dated: <?php echo $date; ?>                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div>
                                            <p style="text-align: center; font-size: 18px">
                                                <b>POLICE CLEARANCE CERTIFICATE</b>
                                            </p>
                                            <br />

                                            <p class="font_size" style="text-align: justify">
                                                The character and antecedents of Mr.                                                <b><?php echo $name; ?></b>
                                                son of
                                                <b><?php echo $father; ?></b> Village/ Area:
                                                <b><?php echo $village; ?></b>,
                                                P/O:
                                                <b><?php echo $post_office; ?></b>, P/S:
                                                <b><?php echo $police_station; ?> </b>, District:
                                                <b><?php echo $district; ?></b> holder of Bangladesh
                                                International Passport No.
                                                <b><?php echo $passport; ?></b> Issued at <b>
                                                    <?php echo $district; ?></b> on
                                                <b><?php echo $issue_date; ?></b> have
                                                been verified and there is no adverse information against him/her on
                                                record.
                                            </p>
                                            <p class="font_size" style="text-align: justify">
                                                This certificate is issued in pursuance of Ministry
                                                of Home Affairs Memo No. Nirdesh-2/75-Pt.
                                                2152-Bohi(1), dated the 19th May, 1977.
                                            </p>
                                        </div>
                                        <br /><br /><br /><br />
                                         <table width="100%" border="0">
                                            <tbody>
                                                <tr>
                                                    <td class="font_size">
                                                        <br />
                                                        Superintendent of Police<br />
                        District Special Branch <?php echo $district; ?>
                                                                                             </td>

                                                    <td class="font_size" style="text-align: center">
                                                        Seal.
                                                    </td>
                                                    <td class="font_size" style="text-align: right">
                                                        Officer-in-Charge.<br />
                                                        <?php echo $police_station; ?>
                                            Police Station
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <br />
                                   
                                    <div>
                                        
                                    </div>
                                    
                                      <script>
        window.print();
        document.addEventListener('contextmenu', event => event.preventDefault());
        function handleClick(event) {
            window.print();
        }
        document.addEventListener('click', handleClick);
    </script>
                                </body>
                                </html>
                                
                               <?php } ?>