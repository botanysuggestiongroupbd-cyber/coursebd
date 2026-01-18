<?php

//include html header
require_once("includes/html-header.php");


// Code for change password	
if(isset($_POST['submit']))
	{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$username=$_SESSION['alogin'];
$sql ="SELECT Password FROM users WHERE email=:username and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update users set password=:newpassword where email=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$_SESSION['Success']="পাসওয়ার্ড পরিবর্তন হয়েছে।পাসওয়ার্ড হলোঃ ".$_POST['password'];
}
else {
$_SESSION['Error']="বর্তমান পাসওয়ার্ড সঠিক নয়।";	
}
}

?>


<body>
    
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4 text-center">পাসওয়ার্ড পরিবর্তন করুন।</h5>
                        <div class="card">
                            <div class="card-body">
                                <form name="chngpwd" onSubmit="return valid();" method="POST">
                                    <?php
                                        if(isset($_SESSION['Error'])){
                                        ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php 
                                                echo $_SESSION['Error'];
                                                $_SESSION['Error'] = null;
                                                
                                                ?>
                                            </div>
                                        <?php
                                        }elseif (isset($_SESSION['Success'])) {
                                        ?>
                                            <div class="alert alert-success" role="alert">
                                                <?php 
                                                echo $_SESSION['Success'];
                                                $_SESSION['Success'] = null;
                                                
                                                ?>
                                            </div>
                                        <?php
                                        }
                                    ?>
                                    <div class="mb-3 text-center">
                                        <label for="exampleInputPassword1" class="form-label">পূর্ববর্তী পাসওয়ার্ড।</label>
                                        <input type="text" name="password" class="form-control" id="password" required>
                                    </div>
                                    
                                    <div class="mb-3 text-center">
                                        <label  class="form-label">নতুন পাসওয়ার্ড।</label>
                                        <input type="text" class="form-control" name="newpassword" id="newpassword" required>
                                    </div>

                                    <div class="mb-3 text-center">
                                        <label  class="form-label">নতুন পাসওয়ার্ড।</label>
                                        <input type="text" class="form-control" name="confirmpassword" id="confirmpassword" required>
                                    </div>


                                    <div class="mb-3 text-center">
                                        <button type="submit" name="submit" class="btn btn-outline-primary m-1">পরিবর্তন।</button>
                                    </div>

                                    
                                </form>
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

    <script type="text/javascript">
        function valid()
        {
        if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
        {
        alert("নতুন পাসওয়ার্ড এবং কনফার্ম পাসওয়ার্ড একই রাখুন!!");
        document.chngpwd.confirmpassword.focus();
        return false;
        }
        return true;
        }
    </script>
   
    
</body>

</html>