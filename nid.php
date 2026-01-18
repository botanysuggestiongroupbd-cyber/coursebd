<?php

session_start();
error_reporting(1);
include_once('includes/db.php');

if (!isset($_SESSION['alogin'])) {
    header('location:login.php');
    die();
}


if (isset($_FILES['pdf'])) {


    if ($_FILES['pdf']['type'] === "application/pdf") {

        $pdf ="pdf/". md5(rand(1111, 9999)) . ".pdf";
        
        move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf);

        $apiKey = 'Jfdj355sdsd565';
        $cfile = curl_file_create($pdf, mime_content_type($pdf), basename($pdf));
        $postData = array(
            'pdf' => $cfile,
            'key' => $apiKey,
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://btbapi.xyz/api/sign/data.php');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
            'REFFER:'.$_SERVER['HTTP_HOST'],
            'LOCKURL: https://bdtoolbd.xyz/',
        ));
        $content = curl_exec($curl);
        curl_close($curl);

        // unlink($pdf);
        

        // Check for cURL errors
        if (curl_errno($curl)) {
            $error = curl_error($curl);

            // Handle the error as needed
        } else {
            // Process the response
            $deco = json_decode($content, true);
            
            // echo "<pre>";
            // var_dump($deco);
            // echo "</pre>";
            
            
            $statuss = $deco['success'];
            
            

            if ($statuss) {
                $userImg = $deco['data']['userIMG'];
                $signatureImg = $deco['data']['signIMG'];
                $nameBangla = $deco['data']['nameBangla'];
                $nameEnglish = $deco['data']['nameEnglish'];
                $nid = $deco['data']['nationalId'];
                $pin = $deco['data']['pin'];
                $fatherName = $deco['data']['fatherName'];
                $motherName = $deco['data']['motherName'];
                $birthPlace = $deco['data']['birthPlace'];
                $dateOfBirth = $deco['data']['dateOfBirth'];
                $bloodGroup = $deco['data']['bloodGroup'];
                $gender = $deco['data']['gender'];
                $maritalStatus = $deco['data']['marital'];
                $spouseName = $deco['data']['spouseName'] ? $deco['data']['spouseName'] : "N/A";
                $religion = $deco['data']['religion'];
                $address = $deco['data']['address'];
                
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
                <div class="alert alert-success text-center h2" role="alert"><img src="https://media.tenor.com/p_LxdrmtSbQAAAAi/ok.gif" style="width: 100px;margin-right:15px">ডাটা লোড হয়েছে।</div>
                <form method="POST" action="nid-bn.php" target="_blank">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ছবি এবং সিগনাচার</label>
                        <br />

                        <div class="d-sm-block text-center d-md-flex d-lg-flex justify-content-between align-items-center">
                            <img style="max-width: 150px; max-height: 150px" class="img-thumbnail rounded" src="<?php echo $userImg ?>" alt="" />
                            <input type="hidden" value="<?php echo $userImg ?>" name="imageUrl12" />


                            <img style="max-width: 100%; max-height: 100px" class="img-thumbnail rounded" src="<?php echo $signatureImg ?>" name="imageUrl22" />
                            <input type="hidden" value="<?php echo $signatureImg ?>" name="imageUrl22" />

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">নামঃ (বাংলা)</label>
                        <input type="text" class="form-control" value="<?php echo $nameBangla ?>" name="nameBangla" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">নামঃ (ইংরেজী)</label>
                        <input type="text" class="form-control" value="<?php echo $nameEnglish ?>" name="nameEnglish" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">আইডি নাম্বারঃ</label>
                        <input type="number" class="form-control" value="<?php echo $nid; ?>" name="nid" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">পিন নাম্বারঃ</label>
                        <input type="number" class="form-control" value="<?php echo $pin; ?>" name="pin" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">পিতার নামঃ</label>
                        <input type="text" class="form-control" value="<?php echo $fatherName; ?>" name="nameFather" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">স্বামী অথবা স্ত্রীর নামঃ</label>
                        <input type="text" class="form-control" name="spouseName" value="<?php echo $spouseName; ?>" />
                        
                    </div>

                    <div class="mb-3">
                        <label class="form-label">মাতার নামঃ</label>
                        <input type="text" class="form-control" value="<?php echo $motherName; ?>" name="nameMother" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">জন্ম স্থানঃ</label>
                        <input type="text" class="form-control" value="<?php echo $birthPlace; ?>" name="birthPlace" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">জন্ম তারিখঃ</label>
                        <input type="text" class="form-control" value="<?php echo $dateOfBirth; ?>" name="dob" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">প্রধানের তারিখঃ</label>
                        <input type="text" class="form-control" value="<?php $newDate = date('d/m/Y');
                                                                        echo $newDate; ?>" name="issued" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">রক্তের গ্রপঃ</label>
                        <input type="text" class="form-control" value="<?php echo $bloodGroup; ?>" name="bloodGroup" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ঠিকানাঃ</label>
                        <textarea name="fulladdress" id="" class="form-control" cols="30" rows="3"><?php echo $address; ?></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-check-label" for="17digt">১৭ ডিজিট পুরাতন কার্ড হলে টিকমার্ক দিন।</label>
                        <input class="form-check-input" type="checkbox"  name="17dig" value='yes' id='17digt' />
                    </div>
                    
                    <input type="hidden" name="gender" value="<?php echo $gender; ?>">
                    <input type="hidden" name="maritalStatus" value="<?php echo $maritalStatus; ?>">
                    
                    <input type="hidden" name="religion" value="<?php echo $religion; ?>">
                        <div class="alert alert-info" role="alert">
                            আপনার একাউন্ট থেকে 
                            <?php 
                              $sql = "SELECT * FROM control WHERE id='1'";
                              if ($resulttt = mysqli_query($link, $sql)) {
                                  if (mysqli_num_rows($resulttt) > 0) {
                                      while ($row = mysqli_fetch_array($resulttt)) {
                                          echo $row['cost'];
                                      }
                                  }
                              }    
                            ?> 
                            টাকা কাটা হবে।
                        </div>
                    <button type="submit" class="btn btn-primary text-center d-block mx-auto">
                        ডাউনলোড করুন
                    </button>
                </form>
            <?php

            } else {
                $msg = json_encode($deco);
                echo "<div class=\"alert alert-danger\" role=\"alert\">{$msg}</div>";

            }

        }

        // Close the cURL session
        curl_close($curl);
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">সঠিক ফাইল আপলোড করুন।</div>";
    }
} else {
    echo "<div class=\"alert alert-danger\" role=\"alert\">সঠিক ফাইল আপলোড করুন।</div>";
}
