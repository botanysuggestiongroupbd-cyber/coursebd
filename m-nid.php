<?php
require_once("includes/html-header.php");

$id = $_SESSION['alogin'];
$select = "SELECT * FROM control";
$g = mysqli_query($link,$select);
$data = mysqli_fetch_assoc($g);
$cc_server_unofficial_price = $data['cc_sign2server_price'];
$sql = "SELECT * FROM users WHERE email='$id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$email = $row['email'];
$balance = $row['balance'];

function image($api){
    /*
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $api);
	curl_setopt($curl, CURLOPT_TIMEOUT, 60);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	$contents = curl_exec($curl);
	curl_close($curl);
	*/
	$contents = base64_decode(str_replace(['data:image/jpg;base64,', 'data:image/jpeg;base64,', 'data:image/png;base64,'], '', $api));
	
	$img = 'image/'.md5($contents).'.png';
	file_put_contents($img, $contents);
	return $img;
}

if(isset($_POST['nid'], $_POST['dob'])){
	if($balance >= $cc_server_unofficial_price) {

		$nidInfo = nidInfo($_POST['nid'], $_POST['dob']);

		// dd($nidInfo);

		$data = $nidInfo->data;

		if(
			isset($data->name) AND
			!empty($data->name) AND
			isset($data->nameEn) AND
			!empty($data->nameEn)
		) {
			
			$userImg = $data->photo;
			$nameBangla = $data->name;
			$nameEnglish = $data->nameEn;
			$nid = $data->nationalId;
			$pin = $data->pin;
			$fatherName = $data->father;
			$spouseName = $data->spouse;
			$motherName = $data->mother;
			$birthPlace = $data->permanentAddress->district;

			$dateOfBirth = date("d M Y", strtotime($_POST['dob']));

			$bloodGroup = $data->bloodGroup;

			$address = "বাসা/হোল্ডিং: ".$data->presentAddress->homeHolding.", গ্রাম/রাস্তা: ".$data->presentAddress->villageOrRoad.", ডাকঘর: ".$data->presentAddress->postOffice.",  - ".$data->presentAddress->postalCode.", ".$data->presentAddress->upozila.", ".$data->presentAddress->district;

			$gender = $data->gender;
			$maritalStatus = "";
			$religion = $data->religion;

			$sql2 = "UPDATE users SET balance = balance - $cc_server_unofficial_price WHERE email = '$email'";
            mysqli_query($link, $sql2);

		} else {
			echo '<script>alert("Failed to load info, Try again!")</script>';
		}
	}else{
		echo '<script>alert("আপনার পর্যাপ্ত পরিমাণ ব্যালেন্স নাই প্লিজ রিচার্জ করুন")</script>';
	}
}
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
						<form method="POST" action="#">
							<div class="mb-3">
								<label class="form-label">আইডি নাম্বারঃ</label>
								<input type="number" class="form-control" value="" name="nid" />
							</div>
							<div class="mb-3">
								<label class="form-label">জন্ম তারিখঃ</label>
								<input type="text" class="form-control" value="" name="dob" />
							</div>
							<div class="alert alert-info" role="alert">অনুসন্ধানের জন্য আপনার একাউন্ট থেকে <?php echo $cc_server_unofficial_price; ?> টাকা কাটা হবে।</div>
							<button type="submit" class="btn btn-primary text-center d-block mx-auto">অনুসন্ধান করুন</button>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<form method="POST" action="nid-bn.php" id="nidBN" target="_blank" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label">ছবি এবং সিগনাচার</label>
								<br/>
								<div class="d-sm-block text-center d-md-flex d-lg-flex justify-content-between align-items-center">
									<img style="max-width: 150px; max-height: 150px" id="ImgPreview_1" class="img-thumbnail rounded" src="<?php echo isset($userImg) ? $userImg : ''; ?>" alt="" />
									<input type="hidden" value="<?php echo isset($userImg) ? $userImg : ''; ?>" name="imageUrl12"/>
									<input type="file" id="Img_1" style="margin: 10px 0;" name="imageUrl1"  onchange="validateImage(1)"/>
									<img style="max-width: 100%; max-height: 100px" id="ImgPreview_2" class="img-thumbnail rounded" src="<?php echo isset($signatureImg) ? $signatureImg : ''; ?>" />
									<input type="hidden" id="imageUrl22" value="<?php echo isset($signatureImg) ? $signatureImg : ''; ?>" name="imageUrl22" />
									<input type="file" id="Img_2" style="margin: 10px 0;" name="imageUrl2" onchange="validateImage(2)"/>
									<script>
										function validateImage(id) {
											const input = document.getElementById(`Img_${id}`);
											const preview = document.getElementById(`ImgPreview_${id}`);
											const file = input.files[0];

											// Check if a file is selected
											if (file) {
												const fileType = file.type;

												// Validate the file type
												const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
												if (validImageTypes.includes(fileType)) {
													// If valid, create a URL for the image and set it as the src for the preview
													const imageUrl = URL.createObjectURL(file);
													preview.src = imageUrl;
													preview.style.display = 'block'; // Show the preview
												} else {
													// If invalid, reset the input and hide the preview
													input.value = ''; // Clear the input
													preview.src = ''; // Clear the preview src
													preview.style.display = 'none'; // Hide the preview
													alert('Please select a valid image file (JPEG, PNG, GIF, or WEBP).');
												}
											} else {
												// If no file selected, hide the preview
												preview.src = '';
												preview.style.display = 'none';
											}
										}
									</script>

								</div>
							</div>

							<div class="mb-3">
								<label class="form-label">নামঃ (বাংলা)</label>
								<input type="text" class="form-control" value="<?php echo isset($nameBangla) ? $nameBangla : ''; ?>" name="nameBangla" />
							</div>

							<div class="mb-3">
								<label class="form-label">নামঃ (ইংরেজী)</label>
								<input type="text" class="form-control" value="<?php echo isset($nameEnglish) ? $nameEnglish : ''; ?>" name="nameEnglish" />
							</div>
							<div class="mb-3">
								<label class="form-label">আইডি নাম্বারঃ</label>
								<input type="number" class="form-control" value="<?php echo isset($nid) ? $nid : ''; ?>" name="nid" />
							</div>

							<div class="mb-3">
								<label class="form-label">পিন নাম্বারঃ</label>
								<input type="number" class="form-control" value="<?php echo isset($pin) ? $pin : ''; ?>" name="pin" />
							</div>
							<div class="mb-3">
								<label class="form-label">পিতার নামঃ</label>
								<input type="text" class="form-control" value="<?php echo isset($fatherName) ? $fatherName : ''; ?>" name="nameFather" />
							</div>
							<div class="mb-3">
								<label class="form-label">স্বামী অথবা স্ত্রীর নামঃ</label>
								<input type="text" class="form-control" name="spouseName" value="<?php echo isset($spouseName) ? $spouseName : ''; ?>" />
								
							</div>

							<div class="mb-3">
								<label class="form-label">মাতার নামঃ</label>
								<input type="text" class="form-control" value="<?php echo isset($motherName) ? $motherName : ''; ?>" name="nameMother" />
							</div>

							<div class="mb-3">
								<label class="form-label">জন্ম স্থানঃ</label>
								<input type="text" class="form-control" value="<?php echo isset($birthPlace) ? $birthPlace : ''; ?>" name="birthPlace" />
							</div>
							<div class="mb-3">
								<label class="form-label">জন্ম তারিখঃ</label>
								<input type="text" class="form-control" value="<?php echo isset($dateOfBirth) ? $dateOfBirth : ''; ?>" name="dob" />
							</div>
							<div class="mb-3">
								<label class="form-label">প্রধানের তারিখঃ</label>
								<input type="text" class="form-control" value="<?php $newDate = date('d/m/Y'); echo $newDate; ?>" name="issued" />
							</div>
							<div class="mb-3">
								<label class="form-label">রক্তের গ্রপঃ</label>
								<input type="text" class="form-control" value="<?php echo isset($bloodGroup) ? $bloodGroup : ''; ?>" name="bloodGroup" />
							</div>
							<div class="mb-3">
								<label class="form-label">ঠিকানাঃ</label>
								<textarea name="fulladdress" id="" class="form-control" cols="30" rows="3"><?php echo isset($address) ? convertToBanglaNumerals(str_replace(['  ', '-'], [' ', '- '], $address)) : ''; ?></textarea>
							</div>
							<!-- <div class="form-check mb-3">
								<label class="form-check-label" for="17digt">১৭ ডিজিট পুরাতন কার্ড হলে টিকমার্ক দিন।</label>
								<input class="form-check-input" type="checkbox"  name="17dig" value='yes' id='17digt' />
							</div> -->
							
							<input type="hidden" name="gender" value="<?php echo isset($gender) ? $gender : ''; ?>">
							<input type="hidden" name="maritalStatus" value="<?php echo isset($maritalStatus) ? $maritalStatus : ''; ?>">
							
							<input type="hidden" name="religion" value="<?php echo isset($religion) ? $religion : ''; ?>">
								<div class="alert alert-info" role="alert">
									আপনার একাউন্ট থেকে 
									<?php 
									  $sql = "SELECT * FROM control WHERE id='1'";
									  if ($resulttt = mysqli_query($link, $sql)) {
										  if (mysqli_num_rows($resulttt) > 0) {
											  while ($row = mysqli_fetch_array($resulttt)) {
												  echo $row['cc_card_make_price'];
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
                        <script>
                            document.getElementById('nidBN').addEventListener('submit', function (e) {
                                e.preventDefault(); 
                                const imageUrl = document.getElementById('imageUrl22').value.trim();
                                const imageFile = document.getElementById('Img_2').files[0];
                                if (imageUrl || imageFile) {
                                    this.submit();
                                } else {
                                    alert('Please select sing image file.');
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>

    <script>
        var signCopy = $("#signCopyBox");
        var detailsForm = $(".detailsForm");

        signCopy.change(function(e) {
            //e.preventDefault();
            //$("#signUploadForm").submit();

            var formData = new FormData();
            var fileInput = $("#signCopyBox")[0].files[0];
            formData.append("pdf", fileInput);

            detailsForm.empty();
            detailsForm.append('<div class=\"alert alert-warning text-center\" role=\"alert\"><img src=\"https://media.tenor.com/wpSo-8CrXqUAAAAj/loading-loading-forever.gif\" style="width: 20px;margin-right:15px">ডাটা লোড হচ্ছে।</div>');


            $.ajax({
                url: 'nid.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    detailsForm.empty();
                    $("#signCopyBox").val(null);
                    detailsForm.append(data);
                   
                }
            });
        });
    </script>
    
</body>

</html>