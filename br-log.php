<?php

//include html header
require_once("includes/html-header.php");

?>

<?php
        include('includes/whatsapp.php');
?>
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
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">হিস্টোরি</h5>
                        <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">ক্রমিক নাম্বার</h6>
                                </th>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Name</h6>
                                </th>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Birth Registration Number</h6>
                                </th>
                                
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Father Name</h6>
                                </th>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">ঠিকানা</h6>
                                </th>
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">অ্যাাকশন</h6>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                        <?php 
                            $sql = "SELECT * from birth_log where user = (:email) ORDER BY id DESC;";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':email', $email, PDO::PARAM_STR);

                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {	
                        ?>
                                    <tr>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?php echo htmlentities($cnt); ?></h6></td>
                                        
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4"><?php echo htmlentities($result->nameEnglish); ?></h6>
                                        </td>

                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">0<?php echo htmlentities($result->birthRegistrationNumber); ?></h6>                      
                                        </td>
                                        
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4"><?php echo htmlentities($result->fatherNameEnglish); ?></h6>
                                        </td>

                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4"><?php echo htmlentities($result->permanentAddressEnglish); ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="edit-brn.php?lid=<?php echo htmlentities($result->id); ?>" >সংশোধন</a>
                                        </td>

                                        
                                    </tr>
                        <?php
                             $cnt = $cnt + 1;
                                    }
                                } 
                        ?>

                             
                                                
                            </tbody>
                        </table>
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


    
</body>

</html>