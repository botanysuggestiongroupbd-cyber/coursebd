<?php
// Include header and sidebar
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
        <?php
        // Include sidebar
        require_once("includes/sidebar.php");
        ?>

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <?php
            // Include header
            require_once("includes/header.php");
            ?>

            <div class="container-fluid">
                 <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                <?php $se = "SELECT * FROM notice";
                $data = mysqli_query($link, $se);
                $d = mysqli_fetch_assoc($data);
                echo $d['notice']; ?>
            </marquee>
                <!-- YouTube Thumbnail Downloader Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">YouTube Thumbnail Downloader</h5>

                        <?php
                        // Function to extract video ID from YouTube URL (standard and short URLs)
                        function extractVideoID($url) {
                            // Check if the URL is a standard YouTube URL
                            if (preg_match('/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([^&]+)/', $url, $matches)) {
                                return $matches[1];
                            }
                            // Check if the URL is a short YouTube URL (youtu.be)
                            elseif (preg_match('/(?:https?:\/\/)?(?:www\.)?youtu\.be\/([^?]+)/', $url, $matches)) {
                                return $matches[1];
                            }
                            return null; // Return null if no valid ID is found
                        }

                        // Initialize variables
                        $thumbnailURL = null;

                        // Handling form submission
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $youtube_url = $_POST['youtube_url'];
                            $quality = $_POST['quality'];
                            $videoID = extractVideoID($youtube_url);

                            if ($videoID) {
                                $thumbnailURL = "https://img.youtube.com/vi/$videoID/$quality.jpg";
                            } else {
                                echo '<p class="text-danger">Error: Please enter a valid YouTube URL.</p>';
                            }
                        }
                        ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label for="youtube_url" class="form-label">YouTube URL:</label>
                                <input type="url" id="youtube_url" name="youtube_url" class="form-control" placeholder="Enter YouTube video URL" required>
                            </div>
                            <div class="mb-3">
                                <label for="quality" class="form-label">Thumbnail Quality:</label>
                                <select id="quality" name="quality" class="form-select" required>
                                    <option value="maxresdefault">Max Resolution</option>
                                    <option value="mqdefault">Medium Quality</option>
                                    <option value="hqdefault">High Quality</option>
                                    <option value="sddefault">Standard Quality</option>
                                    <option value="default">Default Quality</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Get Thumbnail</button>
                        </form>
                    </div>
                </div>
                
                <!-- Thumbnail Preview Section -->
                <?php if ($thumbnailURL): ?>
                    <div class="card w-100 mt-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title fw-semibold mb-4">Thumbnail Preview</h5>
                            <div class="thumbnail-preview mb-3">
                                <img src="<?php echo $thumbnailURL; ?>" alt="Thumbnail" class="img-fluid" style="max-width: 100%; height: auto; border: 1px solid #ddd; padding: 5px;" />
                            </div>
                            <a href="download.php?url=<?php echo urlencode($thumbnailURL); ?>&filename=<?php echo $videoID . '_' . $quality; ?>.jpg" class="btn btn-primary">Download Thumbnail</a>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Thumbnail Preview Section End -->

            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
