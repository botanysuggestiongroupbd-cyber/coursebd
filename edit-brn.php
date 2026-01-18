<?php
require_once("includes/html-header.php");

$id = $_SESSION['alogin'];

if (!isset($_GET['lid']) || !is_numeric($_GET['lid'])) {
    header('Location: br-log.php');
}else{
    $lid = $_GET['lid'];
    $sql = "SELECT * from birth_log where id = (:id)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $lid, PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount() == 0){
        header('Location: br-log.php');
    }else{
		$_SESSION['editID'] = $lid;
	}

    $resultslog = $query->fetchAll(PDO::FETCH_OBJ);
}

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
						<form method="POST" action="birth-bn.php" id="BrnBN" target="_blank" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Register Office Address</label>
										<input type="text" name="officeAddressFirst" id="officeAddressFirst" class="form-control" placeholder="রেজিস্টার অফিসের ঠিকানা" value="<?php echo $resultslog[0]->officeAddressFirst; ?>" required>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Upazila/Pourashava/City Corporation, Zila</label>
										<input type="text" name="officeAddressSecond" id="officeAddressSecond" class="form-control" placeholder="উপজেলা/পৌরসভা/সিটি কর্পোরেশন, জেলা" value="<?php echo $resultslog[0]->officeAddressSecond; ?>" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Birth Registration Number</label>
										<input type="text" name="birthRegistrationNumber" id="birthRegistrationNumber" class="form-control" placeholder="XXXXXXXXXXXXXXXXX" value="<?php echo $resultslog[0]->birthRegistrationNumber; ?>" required>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Gender </label>
										<input type="text" name="gender" id="gender" class="form-control" placeholder="XXXX" value="<?php echo $resultslog[0]->gender; ?>" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Date of Registration </label>
										<input type="text" class="form-control" id="dateOfRegistration" name="dateOfRegistration" placeholder="DD/MM/YYYY" value="<?php echo $resultslog[0]->dateOfRegistration; ?>" required>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Date of Issuance </label>
										<input type="text" class="form-control" name="dateOfIssuance" id="dateOfIssuance" placeholder="DD/MM/YYYY" value="<?php echo $resultslog[0]->dateOfIssuance; ?>" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Left Bar Code</label><br>
										<input type="checkbox" id="barCodeInput" name="barCode" checked value="<?php echo $resultslog[0]->barCode; ?>" onchange="handleBarcodeInputChange()"> <label for="barCodeInput">Input</label>
										<input type="checkbox" id="barCode1" name="barCode" value="DZIH" onclick="autoSelect(1)"> <label for="barCode1">1</label>
										<input type="checkbox" id="barCode2" name="barCode" value="DMIQ" onclick="autoSelect(2)"> <label for="barCode2">2</label>
										<input type="checkbox" id="barCode3" name="barCode" value="AEMA" onclick="autoSelect(3)"> <label for="barCode3">3</label>
										<input type="checkbox" id="barCode4" name="barCode" value="RQHQ" onclick="autoSelect(4)"> <label for="barCode4">4</label>
										<input type="checkbox" id="barCode5" name="barCode" value="IRIA" onclick="autoSelect(5)"> <label for="barCode5">5</label>
										<input type="checkbox" id="barCode6" name="barCode" value="ERRD" onclick="autoSelect(6)"> <label for="barCode6">6</label>
										<input type="text" id="barcodeInputField" name="barcodeInputField" value="<?php echo $resultslog[0]->barCode; ?>" class="form-control">
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>QR Link</label><br>
										<input type="checkbox" id="qrLinkInput" name="qrLink" checked value="<?php echo $resultslog[0]->qrLink; ?>" onchange="handleQrLinkInputChange()"> <label for="qrLinkInput">Input</label>
										<input type="checkbox" id="qrLink1" name="qrLink" value="https://bdris.gov.bd/certificate/verify?key=Y2p7chu0b0iI8aWymonnhfkpKoOKE3J5kRsiGb0ZVOe0SqgyoCnMtFT+wx+Ikn/O" onclick="autoSelect(1)"> <label for="qrLink1">1</label>
										<input type="checkbox" id="qrLink2" name="qrLink" value="https://bdris.gov.bd/certificate/verify?key=5gsdKUqk6MwdcGXYQrJJ3oFDeWtXYcK8sjPw9HTPyimw/CAb4Mia41mwDYBdwU/z" onclick="autoSelect(2)"> <label for="qrLink2">2</label>
										<input type="checkbox" id="qrLink3" name="qrLink" value="https://bdris.gov.bd/certificate/verify?key=NstWvr0h0rOGf84T/VVLyG/k4N0SH4MULThJN9NKQzrcZXdnNjfrHy3f6R3cKkcP" onclick="autoSelect(3)"> <label for="qrLink3">3</label>
										<input type="checkbox" id="qrLink4" name="qrLink" value="https://bdris.gov.bd/certificate/verify?key=KU32mvimW7KmtS/jr0hNN1VZHRwISZmcLnrzJYmadhEkpmcxFDEqLIy0exp3OVbG" onclick="autoSelect(4)"> <label for="qrLink4">4</label>
										<input type="checkbox" id="qrLink5" name="qrLink" value="https://bdris.gov.bd/certificate/verify?key=znKwFj1Z1NAmN1Pgt4f/wcjTogYsu7aOytY8p2pk3OvTRDJkegjZjefRlv1GgJ+u" onclick="autoSelect(5)"> <label for="qrLink5">5</label>
										<input type="checkbox" id="qrLink6" name="qrLink" value="https://bdris.gov.bd/certificate/verify?key=S/m6tkNVXq24lDXol5XRdF6zC/FRDZq327Fk7Ur9UJX94kJHLkB5tA2nX83QsVYF" onclick="autoSelect(6)"> <label for="qrLink6">6</label>
										<input type="text" id="qrLinkInputField" name="qrLinkInputField" value="<?php echo $resultslog[0]->qrLink; ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Date of Birth </label>
										<input type="text" class="form-control" name="dateOfBirth" id="dateOfBirth" placeholder="DD/MM/YYYY" value="<?php echo $resultslog[0]->dateOfBirth; ?>" required>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Date of Birth in Word</label>
										<input type="text" class="form-control" id="dateOfBirthText" name="dateOfBirthText" placeholder="Eleventh August two thousand three" value="<?php echo $resultslog[0]->dateOfBirthText; ?>" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>নাম </label>
										<input type="text" name="nameBangla" id="nameBangla" class="form-control" placeholder="সম্পুর্ন নাম বাংলায়" value="<?php echo $resultslog[0]->nameBangla; ?>" required>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Name</label>
										<input type="text" id="nameEnglish" name="nameEnglish" class="form-control" placeholder="Full Name in English" value="<?php echo $resultslog[0]->nameEnglish; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>পিতার নাম </label>
										<input type="text" id="fatherNameBangla" name="fatherNameBangla" class="form-control" placeholder="পিতার নাম বাংলায়" value="<?php echo $resultslog[0]->fatherNameBangla; ?>" required>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Father Name</label>
										<input type="text" id="fatherNameEnglish" name="fatherNameEnglish" class="form-control" placeholder="Father Name in English" value="<?php echo $resultslog[0]->fatherNameEnglish; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>পিতার জাতীয়তা</label>
										<input type="text" class="form-control" name="fatherNationalityBangla" id="fatherNationalityBangla" placeholder="পিতার জাতীয়তা বাংলায়" value="<?php echo $resultslog[0]->fatherNationalityBangla; ?>">
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Father Nationality</label>
										<input type="text" class="form-control" id="fatherNationalityEnglish" name="fatherNationalityEnglish" placeholder="Father Nationality in English" value="<?php echo $resultslog[0]->fatherNationalityEnglish; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>মাতার নাম </label>
										<input type="text" id="motherNameBangla" name="motherNameBangla" class="form-control" placeholder="মাতার নাম বাংলায়" value="<?php echo $resultslog[0]->motherNameBangla; ?>" required>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Mother Name</label>
										<input type="text" id="motherNameEnglish" name="motherNameEnglish" class="form-control" placeholder="Mother Name in English" value="<?php echo $resultslog[0]->motherNameEnglish; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>মাতার জাতীয়তা</label>
										<input type="text" class="form-control" id="motherNationalityBangla" name="motherNationalityBangla" placeholder="মাতার জাতীয়তা বাংলায়" value="<?php echo $resultslog[0]->motherNationalityBangla; ?>">
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Mother Nationality</label>
										<input type="text" class="form-control" id="motherNationalityEnglish" name="motherNationalityEnglish" placeholder=">Mother Nationality in English" value="<?php echo $resultslog[0]->motherNationalityEnglish; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>জন্মস্থান </label>
										<input type="text" class="form-control" id="birthplaceBangla" name="birthplaceBangla" placeholder="জন্মস্থান বাংলায়" value="<?php echo $resultslog[0]->birthplaceBangla; ?>">
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Place of Birth</label>
										<input type="text" class="form-control" id="birthplaceEnglish" name="birthplaceEnglish" placeholder="Place of Birth in English" value="<?php echo $resultslog[0]->birthplaceEnglish; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>স্থায়ী ঠিকানা </label>
										<textarea id="permanentAddressBangla" name="permanentAddressBangla" rows="4" class="form-control" placeholder="স্থায়ী ঠিকানা বাংলায়"><?php echo $resultslog[0]->permanentAddressBangla; ?></textarea>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label>Permanent Address</label>
										<textarea id="permanentAddressEnglish" name="permanentAddressEnglish" rows="4" class="form-control" placeholder="Permanent Address in English"><?php echo $resultslog[0]->permanentAddressEnglish; ?></textarea>
									</div>
								</div>
							</div>
							<div class="alert alert-info" role="alert">
									আপনার একাউন্ট থেকে 
									<?php 
									  $sql = "SELECT * FROM control WHERE id='1'";
									  if ($resulttt = mysqli_query($link, $sql)) {
										  if (mysqli_num_rows($resulttt) > 0) {
											  while ($row = mysqli_fetch_array($resulttt)) {
												  echo $row['cc_card_price'];
											  }
										  }
									  }    
									?> 
									টাকা কাটা হবে।
								</div>
							<button type="submit" class="btn btn-primary text-center d-block mx-auto">ডাউনলোড করুন</button>
						</form>
                        <script>
							const checkboxes = document.getElementsByName('barCode');
                            document.getElementById('BrnBN').addEventListener('submit', function (e) {
                                e.preventDefault(); 
								let isChecked = false;
								for(let i = 0; i < checkboxes.length; i++){
									if(checkboxes[i].checked){
										isChecked = true;
										break;
									}
								}
								if(!isChecked){
									alert('Select a Left Bar Code or QR Link');
								}else{
									this.submit();
								}
                            });

							function handleBarcodeInputChange() {
								var barcodeInputCheckbox = document.getElementById('barCodeInput');
								var barcodeInputField = document.getElementById('barcodeInputField');
								if (barcodeInputCheckbox.checked) {
									barcodeInputField.value = "";
									barcodeInputField.readOnly = false;
									uncheckBarcodeCheckboxes(barcodeInputCheckbox);
								} else {
									barcodeInputField.value = "";
									barcodeInputField.readOnly = true;
								}
							}

							function handleBarcodeCheckChange(checkbox) {
								if (checkbox.checked) {
									document.getElementById('barCodeInput').checked = false;
									document.getElementById('barcodeInputField').value = checkbox.value;
									document.getElementById('barcodeInputField').readOnly = true;
									uncheckOtherBarcodeCheckboxes(checkbox);
								}
							}

							function uncheckBarcodeCheckboxes(checkboxToKeep) {
								var checkboxes = document.getElementsByName('barCode');
								checkboxes.forEach(function(checkbox) {
									if (checkbox !== checkboxToKeep) {
										checkbox.checked = false;
									}
								});
							}

							function uncheckOtherBarcodeCheckboxes(checkboxToKeep) {
								var checkboxes = document.getElementsByName('barCode');
								checkboxes.forEach(function(checkbox) {
									if (checkbox !== checkboxToKeep && checkbox.checked) {
										checkbox.checked = false;
									}
								});
							}

							function handleQrLinkInputChange() {
								var qrLinkInputCheckbox = document.getElementById('qrLinkInput');
								var qrLinkInputField = document.getElementById('qrLinkInputField');
								if (qrLinkInputCheckbox.checked) {
									qrLinkInputField.value = "";
									qrLinkInputField.readOnly = false;
									uncheckQrLinkCheckboxes(qrLinkInputCheckbox);
								} else {
									qrLinkInputField.value = "";
									qrLinkInputField.readOnly = true;
								}
							}

							function handleQrLinkCheckChange(checkbox) {
								if (checkbox.checked) {
									document.getElementById('qrLinkInput').checked = false;
									document.getElementById('qrLinkInputField').value = checkbox.value;
									document.getElementById('qrLinkInputField').readOnly = true;
									uncheckOtherQrLinkCheckboxes(checkbox);
								}
							}

							function uncheckQrLinkCheckboxes(checkboxToKeep) {
								var checkboxes = document.getElementsByName('qrLink');
								checkboxes.forEach(function(checkbox) {
									if (checkbox !== checkboxToKeep) {
										checkbox.checked = false;
									}
								});
							}

							function uncheckOtherQrLinkCheckboxes(checkboxToKeep) {
								var checkboxes = document.getElementsByName('qrLink');
								checkboxes.forEach(function(checkbox) {
									if (checkbox !== checkboxToKeep && checkbox.checked) {
										checkbox.checked = false;
									}
								});
							}

							function autoSelect(value) {
								// Check the corresponding barcode checkbox
								var barcodeCheckbox = document.getElementById('barCode' + value);
								if (barcodeCheckbox) {
									barcodeCheckbox.checked = true;
									handleBarcodeCheckChange(barcodeCheckbox);
								}
								
								var qrLinkCheckbox = document.getElementById('qrLink' + value);
								if (qrLinkCheckbox) {
									qrLinkCheckbox.checked = true;
									handleQrLinkCheckChange(qrLinkCheckbox);
								}
							}	
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
</body>

</html>