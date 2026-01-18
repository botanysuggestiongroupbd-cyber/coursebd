<?php
require_once("includes/html-header.php");

if (!isset($_GET['lid']) || !is_numeric($_GET['lid'])) {
    header('Location: log.php');
}else{
    $lid = $_GET['lid'];
    $sql = "SELECT * from log where id = (:id)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $lid, PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount() == 0){
        header('Location: log.php');
    }else{
		$_SESSION['editID'] = $lid;
	}

    $resultslog = $query->fetchAll(PDO::FETCH_OBJ);
}


error_reporting(1);

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
                <marquee class="alert alert-dark text-white" onmouseover="this.stop()" onmouseout="this.start()" role="alert" style="font-size: 1rem;">
                    <?php $se = "SELECT * FROM notice";
                    $data = mysqli_query($link, $se);
                    $d = mysqli_fetch_assoc($data);
                    echo $d['notice']; ?>
                </marquee>
                <!-- notice end -->

                <form method="POST" action="nid-bn.php" target="_blank" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ছবি এবং সিগনাচার</label>
                        <br />

                        <div class="d-sm-block text-center d-md-flex d-lg-flex justify-content-between align-items-center">
							<img style="max-width: 150px; max-height: 150px" id="ImgPreview_1" class="img-thumbnail rounded" src="<?php echo $resultslog[0]->userImg ?>" alt="" />
							<input type="hidden" value="<?php echo $resultslog[0]->userImg ?>" name="imageUrl12"/>
							<input type="file" id="Img_1" style="margin: 10px 0;" name="imageUrl1"  onchange="validateImage(1)"/>
							<img style="max-width: 100%; max-height: 100px" id="ImgPreview_2" class="img-thumbnail rounded" src="<?php echo $resultslog[0]->signatureImg ?>" />
							<input type="hidden" id="imageUrl22" value="<?php echo $resultslog[0]->signatureImg ?>" name="imageUrl22" />
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
                        <input type="text" class="form-control" value="<?php echo $resultslog[0]->nameBangla; ?>" name="nameBangla" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">নামঃ (ইংরেজী)</label>
                        <input type="text" class="form-control" value="<?php echo $resultslog[0]->nameEnglish ?>" name="nameEnglish" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">আইডি নাম্বারঃ</label>
                        <input type="number" class="form-control" value="<?php echo $resultslog[0]->nid; ?>" name="nid" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">পিন নাম্বারঃ</label>
                        <input type="number" class="form-control" value="<?php echo $resultslog[0]->pin; ?>" name="pin" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">পিতার নামঃ</label>
                        <input type="text" class="form-control" value="<?php echo $resultslog[0]->fatherName; ?>" name="nameFather" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">মাতার নামঃ</label>
                        <input type="text" class="form-control" value="<?php echo $resultslog[0]->motherName; ?>" name="nameMother" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">জন্ম স্থানঃ</label>
                        <input type="text" class="form-control" value="<?php echo $resultslog[0]->birthPlace; ?>" name="birthPlace" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">জন্ম তারিখঃ</label>
                        <input type="text" class="form-control" value="<?php echo $resultslog[0]->dateOfBirth; ?>" name="dob" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">প্রধানের তারিখঃ</label>
                        <input type="text" class="form-control" value="<?php $newDate = date('d/m/Y');
                                                                        echo $newDate; ?>" name="issued" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">রক্তের গ্রপঃ</label>
                        <input type="text" class="form-control" value="<?php echo $resultslog[0]->bloodGroup; ?>" name="bloodGroup" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ঠিকানাঃ</label>
                        <textarea name="fulladdress" id="" class="form-control" cols="30" rows="3"><?php echo $resultslog[0]->address; ?></textarea>
                    </div>

                    <input type="hidden" name="gender" value="<?php echo $resultslog[0]->gender; ?>">
                    <input type="hidden" name="maritalStatus" value="<?php echo $resultslog[0]->maritalStatus; ?>">
                    <input type="hidden" name="spouseName" value="<?php echo $resultslog[0]->spouseName; ?>">
                    <input type="hidden" name="religion" value="<?php echo $resultslog[0]->religion; ?>">
                    <!--<input type="hidden" name="editID" value="<?php echo $_GET['lid']; ?>">--->
					
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





            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>



</body>

</html>