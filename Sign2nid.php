<?php

//include html header
require_once("includes/html-header.php");

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
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZ5T0SmHx4dJ6YZF7Q/nE8/9TPE5dD+6tbBfS" crossorigin="anonymous">
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
                         <h5 class="card-title fw-semibold mb-4 text-center">এন.আই.ডি কার্ড তৈরী করার জন্য সাইন কপি আপলোড করুন</h5>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="nid.php" id="signUploadForm">
                                    <div class="mb-3 text-center">
                                        <label for="signCopyBox" class="alert alert-info d-block cursor-pointer" style="margin-bottom: 0;border-radius:0;border-bottom:none;" >
                                            <img src="https://media.tenor.com/w2RXshjPCgwAAAAi/folder-walk.gif" style="max-width: 100px; max-height:100px" alt="">
                                            <p class="">এখানে ক্লিক করে লোড করুন।</p>
                                    
                                        </label>
                                        <input type="file" class="form-control d-block" id="signCopyBox" style="border-radius:0;border:1px solid #bad7ff;border-top:none;background:#ddebff;box-shadow:none;">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">


                            <div class="card-body detailsForm">
                                <div class="alert alert-info" role="alert">
                                    ফাইল আপলোড করুন।
                                </div>
                            </div>

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
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(data) {
                    //console.log(data);
                    
                    detailsForm.empty();

                    $("#signCopyBox").val(null);

                    detailsForm.append(data);
                   
                }
            });



        });
    </script>
</body>

</html>