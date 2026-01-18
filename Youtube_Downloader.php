<?php 
// Include the HTML header
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
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php include("includes/sidebar.php"); ?>
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <?php include("includes/header.php"); ?>
            <div class="container-fluid">
                 <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                <?php $se = "SELECT * FROM notice";
                $data = mysqli_query($link, $se);
                $d = mysqli_fetch_assoc($data);
                echo $d['notice']; ?>
            </marquee>
                <!-- YouTube Video Downloader Section -->
                <div class="card w-100 mb-4 mt-5">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">All Format YouTube Video Downloader</h5>
                        <form class="form-download" method="POST" action="">
                            <div class="mb-3">
                                <label for="videoLink" class="form-label"><b>Enter YT Video Link:</b></label>
                                <input type="text" id="videoLink" name="videoLink" class="form-control link" placeholder="Enter YouTube Video Link" required>
                            </div>
                            <div class="mb-3">
                                <label for="videoFormat" class="form-label"><b>Select Video Format:</b></label>
                                <select id="videoFormat" name="videoFormat" class="form-control formte" required>
                                    <option selected disabled>Select Video Format</option>
                                    <option value="mp3">Mp3</option>
                                    <option value="mp4a">144 Mp4</option>
                                    <option value="360">360 Mp4</option>
                                    <option value="480">480 Mp4</option>
                                    <option value="720">720 Mp4</option>
                                    <option value="1080">1080 Mp4</option>
                                    <option value="4k">4k Mp4</option>
                                    <option value="8k">8k Mp4</option>
                                </select>
                            </div>
                            <div class="mt-4 download-video">
                                <button type="button" class="btn btn-success btn-block click-btn-down">Click Here</button>
                            </div>
                        </form>
                        <!-- Result Section -->
                        <div id="downloadResult" class="mt-4"></div>
                    </div>
                </div>
                <!-- YouTube Video Downloader Section End -->
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <script type="text/javascript">
        // JavaScript for downloading video
        $(".click-btn-down").click(function(){
            var link = $("#videoLink").val();
            var format = $("#videoFormat").children("option:selected").val();
            downloadVideo(link, format);
        });

        function downloadVideo(link, format) {
            $('#downloadResult').html('<iframe style="width:100%;height:60px;border:0;overflow:hidden;" scrolling="no" src="https://loader.to/api/button/?url=' + link + '&f=' + format + '"></iframe>');
        }
    </script>
</body>
</html>
