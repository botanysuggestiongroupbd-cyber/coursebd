<?php  
// Include header and sidebar
require_once("includes/html-header.php");
?>


<body>
    
    <script>!function(){var e,t,n,a;window.MyAliceWebChat||((t=document.createElement("div")).id="myAliceWebChat",(n=document.createElement("script")).type="text/javascript",n.async=!0,n.src="https://widget.myalice.ai/index.js",(a=(e=document.body.getElementsByTagName("script"))[e.length-1]).parentNode.insertBefore(n,a),a.parentNode.insertBefore(t,a),n.addEventListener("load",(function(){MyAliceWebChat.init({selector:"myAliceWebChat",number:"Sakib76255",message:"",color:"#2AABEE",channel:"tg",boxShadow:"none",text:"Message Us",theme:"light",position:"right",mb:"20px",mx:"20px",radius:"20px"})})))}();</script> 
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
                <!-- notice -->
            <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                <?php $se = "SELECT * FROM notice";
                $data = mysqli_query($link, $se);
                $d = mysqli_fetch_assoc($data);
                echo $d['notice']; ?>
            </marquee>
            <!-- notice end -->

                <!-- IP Details Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">IP Details</h5>

                        <!-- Form to enter IP address -->
                        <form id="ipForm" method="POST">
                            <div class="mb-3">
                                <label for="ip" class="form-label">IP Address:</label>
                                <input type="text" id="ip" name="ip" class="form-control" placeholder="Enter IP Address" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <?php
                        // Check if the form is submitted
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $ip = htmlspecialchars(trim($_POST['ip']));

                            // Fetch IP details from the API
                            $apiUrl = "http://ip-api.com/json/{$ip}";
                            $response = file_get_contents($apiUrl);
                            $ipDetails = json_decode($response, true);

                            if ($ipDetails['status'] === 'success') {
                                ?>
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>Field</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>IP Address</td>
                                            <td><?php echo $ipDetails['query']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><?php echo $ipDetails['country']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Region</td>
                                            <td><?php echo $ipDetails['regionName']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td><?php echo $ipDetails['city']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Zip Code</td>
                                            <td><?php echo $ipDetails['zip']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td><?php echo $ipDetails['lat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Longitude</td>
                                            <td><?php echo $ipDetails['lon']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Timezone</td>
                                            <td><?php echo $ipDetails['timezone']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>ISP</td>
                                            <td><?php echo $ipDetails['isp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Organization</td>
                                            <td><?php echo $ipDetails['org']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>AS</td>
                                            <td><?php echo $ipDetails['as']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<p class='text-danger'>Failed to retrieve IP details.</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- IP Details Section End -->

            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>

    <!-- JavaScript to fetch the user's public IP and autofill the form -->
    <script>
        // Use an external API to get the user's IP address
        fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => {
                // Autofill the IP input field with the user's IP
                document.getElementById('ip').value = data.ip;
            })
            .catch(error => {
                console.error('Error fetching IP:', error);
            });
    </script>
</body>
</html>
