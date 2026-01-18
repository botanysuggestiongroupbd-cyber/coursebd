<?php   
//include html header
require_once("includes/html-header.php");
?>

<body>
    
    <script>!function(){var e,t,n,a;window.MyAliceWebChat||((t=document.createElement("div")).id="myAliceWebChat",(n=document.createElement("script")).type="text/javascript",n.async=!0,n.src="https://widget.myalice.ai/index.js",(a=(e=document.body.getElementsByTagName("script"))[e.length-1]).parentNode.insertBefore(n,a),a.parentNode.insertBefore(t,a),n.addEventListener("load",(function(){MyAliceWebChat.init({selector:"myAliceWebChat",number:"Sakib76255",message:"",color:"#2AABEE",channel:"tg",boxShadow:"none",text:"Message Us",theme:"light",position:"right",mb:"20px",mx:"20px",radius:"20px"})})))}();</script> 
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <?php
        //include sidebar
        require_once("includes/sidebar.php");
        ?>

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <?php
            //include header
            require_once("includes/header.php");
            ?>

            <div class="container-fluid">
                 <marquee class="alert alert-dark text-white" role="alert" onmouseover="this.stop()" onmouseout="this.start()" style="font-size: 1rem;">
                <?php $se = "SELECT * FROM notice";
                $data = mysqli_query($link, $se);
                $d = mysqli_fetch_assoc($data);
                echo $d['notice']; ?>
            </marquee>
                <!-- EIIN Information Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">EIIN নম্বার দিয়ে বিদ্যালয়ের তথ্য খুঁজুন</h5>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="eiinNumber" class="form-label">EIIN নম্বার দিন:</label>
                                <input type="text" id="eiinNumber" name="eiinNumber" class="form-control" placeholder="EIIN নম্বার লিখুন">
                            </div>
                            <button type="submit" name="findSchoolInfo" class="btn btn-primary">তথ্য খুঁজুন</button>
                        </form>

                        <!-- School Result Section -->
                        <?php
                        if (isset($_POST['findSchoolInfo'])) {
                            $eiin = $_POST['eiinNumber'];
                            $apiUrl = "https://mdrobiul.xyz/eiin/api.php?eiin=$eiin";
                            
                            // Initialize cURL session
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $apiUrl);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($ch);
                            curl_close($ch);

                            // Decode JSON response
                            $data = json_decode($response, true);

                            if ($data && isset($data['institute_list'])) {
                                $school = $data['institute_list'];
                        ?>
                            <div id="schoolResult" class="mt-4">
                                <div class="card p-3">
                                    <div class="text-center">
                                        <h6><strong><?php echo htmlspecialchars($school['instituteNameBn'] ?? 'নাম পাওয়া যায়নি'); ?></strong></h6>
                                        <p><strong>EIIN নম্বর:</strong> <?php echo htmlspecialchars($school['eiinNo'] ?? 'N/A'); ?></p>
                                    </div>
                                    <div>
                                        <p><strong>বিভাগ:</strong> <?php echo htmlspecialchars($school['divisionNameBn'] ?? 'N/A'); ?></p>
                                        <p><strong>জেলা:</strong> <?php echo htmlspecialchars($school['districtNameBn'] ?? 'N/A'); ?></p>
                                        <p><strong>থানা:</strong> <?php echo htmlspecialchars($school['thanaNameBn'] ?? 'N/A'); ?></p>
                                        <p><strong>ইনস্টিটিউট টাইপ:</strong> <?php echo htmlspecialchars($school['instituteTypeNameBn'] ?? 'N/A'); ?></p>
                                        <p><strong>ইমেইল:</strong> <a href="mailto:<?php echo htmlspecialchars($school['email'] ?? 'N/A'); ?>"><?php echo htmlspecialchars($school['email'] ?? 'N/A'); ?></a></p>
                                        <p><strong>টেলিফোন:</strong> <?php echo htmlspecialchars($school['telephone'] ?? 'N/A'); ?></p>
                                        <p><strong>মোবাইল:</strong> <?php echo htmlspecialchars($school['mobile'] ?? 'N/A'); ?></p>
                                        <p><strong>পূর্বের সার্ভে তারিখ:</strong> <?php echo htmlspecialchars($school['startDate'] ?? 'N/A'); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Teacher List Section -->
                            <h5 class="card-title fw-semibold mt-4 text-center">শিক্ষকগণের তথ্য</h5>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ছবি</th>
                                            <th>নাম</th>
                                            <th>ইনডেক্স নং</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $teacherApiUrl = "https://mdrobiul.xyz/eiin/api2.php?eiin=$eiin";
                                        $teacherResponse = file_get_contents($teacherApiUrl);
                                        $teachersData = json_decode($teacherResponse, true);
                                        
                                        if ($teachersData) {
                                            foreach ($teachersData as $teacher) {
                                                $image = $teacher['Image'] ?: 'avatar/default.jpg'; // Default image if not found
                                                $fullName = $teacher['FullName'] ?: 'N/A';
                                                $nid = $teacher['IndexNo'] ?: 'N/A';
                                                $dob = $teacher['DateofBirth'] ?: 'N/A';
                                                $empId = $teacher['EmpId'] ?: 'N/A';
                                    ?>
                                        <tr>
                                            <td><img src="<?php echo $image; ?>" alt="Teacher Photo" class="rounded-circle" width="40"></td>
                                            <td><?php echo htmlspecialchars($fullName); ?></td>
                                            <td><?php echo htmlspecialchars($nid); ?></td>
                                            <td><button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#teacherModal<?php echo $teacher['Id']; ?>">View</button></td>
                                        </tr>

                                        <!-- Teacher Modal -->
                                        <div class="modal fade" id="teacherModal<?php echo $teacher['Id']; ?>" tabindex="-1" aria-labelledby="teacherModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="teacherModalLabel"><?php echo htmlspecialchars($fullName); ?> - Full Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Name:</strong> <?php echo htmlspecialchars($fullName); ?></p>
                                                        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($dob); ?></p>
                                                        <p><strong>Email:</strong> <?php echo htmlspecialchars($teacher['Email']); ?></p>
                                                        <p><strong>Designation:</strong> <?php echo htmlspecialchars($teacher['DesignationNameBn']); ?></p>
                                                        <p><strong>Mobile:</strong> <?php echo htmlspecialchars($teacher['MobileNo']); ?></p>
                                                        <p><strong>Employe Id:</strong> <?php echo htmlspecialchars($teacher['EmpId']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='4' class='text-center'>কোন শিক্ষক তথ্য পাওয়া যায়নি।</td></tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                            } else {
                                echo "<p class='text-danger mt-4'>তথ্য পাওয়া যায়নি। EIIN নম্বর আবার পরীক্ষা করুন।</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- EIIN Information Section End -->
            </div>
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
