<?php
session_start();
error_reporting(0);
include('includes/db.php');
include('includes/config.php');

$id = $_SESSION['alogin'];
$select = "SELECT * FROM control";
$g = mysqli_query($link,$select);
$data=mysqli_fetch_assoc($g);
$cost = $data['cc_card_make_price'];

if(isset($_POST['editID']) && $_POST['editID'] == $_SESSION['editID']){
	$cost = 0;
}


//  get users old waifus and count them
$sql = "SELECT * FROM users WHERE email='$id'";
if ($result = mysqli_query($link, $sql)) {
    // $cost = 5;
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

		$email = $row['email'];
		$balance = $row['balance'];

		if ($balance >= $cost) {
            $sql2 = "UPDATE users SET balance = balance - $cost WHERE email = '$email'";
            if($result = mysqli_query($link, $sql2)) {
					if(isset($_FILES["imageUrl1"]["tmp_name"]) && is_file($_FILES["imageUrl1"]["tmp_name"])){
					$imageUrl12 = 'image/'.md5(file_get_contents($_FILES["imageUrl1"]["tmp_name"])).'.png';
					move_uploaded_file($_FILES["imageUrl1"]["tmp_name"], $imageUrl12);
						if(strpos(mime_content_type($imageUrl12), 'image/') !== 0){
							if(file_exists($imageUrl12) && is_file($imageUrl12)) {
								unlink($imageUrl12);
							}
						}
					}else if(!empty($_POST["imageUrl12"])){
						$imageUrl12 = $_POST['imageUrl12'];
					}else{
						$imageUrl12 = '';
					}
					
					if(isset($_FILES["imageUrl2"]["tmp_name"]) && is_file($_FILES["imageUrl2"]["tmp_name"])){
						$imageUrl22 = 'image/'.md5(file_get_contents($_FILES["imageUrl2"]["tmp_name"])).'.png';
						move_uploaded_file($_FILES["imageUrl2"]["tmp_name"], $imageUrl22);
						if(strpos(mime_content_type($imageUrl22), 'image/') !== 0){
							if(file_exists($imageUrl22) && is_file($imageUrl22)) {
								unlink($imageUrl22);
							}
						}
					}else if(!empty($_POST["imageUrl22"])){
						$imageUrl22 = $_POST['imageUrl22'];
					}else{
						$imageUrl22 = '';
					}
					
                    echo nid($imageUrl12, $imageUrl22);

                    $sqlForLog = "INSERT INTO `log` (`userImg`, `signatureImg`, `nameBangla`, `nameEnglish`, `nid`, `pin`, `fatherName`, `motherName`, `birthPlace`, `dateOfBirth`, `bloodGroup`, `gender`, `maritalStatus`, `spouseName`, `religion`, `address`, `cardUser`, `insertTime`) VALUES (:userImg, :signatureImg, :nameBangla, :nameEnglish, :nid, :pin, :fatherName, :motherName, :birthPlace, :dateOfBirth, :bloodGroup, :gender, :maritalStatus, :spouseName, :religion, :address, :cardUser, :insertTime)";
                    $logQuery = $dbh->prepare($sqlForLog);
					$insertTime = date("Y-m-d h:i:s A");

                    $logQuery->bindParam(':userImg', $imageUrl12, PDO::PARAM_STR);
                    $logQuery->bindParam(':signatureImg', $imageUrl22, PDO::PARAM_STR);
                    $logQuery->bindParam(':nameBangla', $_POST['nameBangla'], PDO::PARAM_STR);
                    $logQuery->bindParam(':nameEnglish', $_POST['nameEnglish'], PDO::PARAM_STR);
                    $logQuery->bindParam(':nid', $_POST['nid'], PDO::PARAM_STR);
                    $logQuery->bindParam(':pin', $_POST['pin'], PDO::PARAM_STR);
                    $logQuery->bindParam(':fatherName', $_POST['nameFather'], PDO::PARAM_STR);
                    $logQuery->bindParam(':motherName', $_POST['nameMother'], PDO::PARAM_STR);
                    $logQuery->bindParam(':birthPlace', $_POST['birthPlace'], PDO::PARAM_STR);
                    $logQuery->bindParam(':dateOfBirth', $_POST['dob'], PDO::PARAM_STR);
                    $logQuery->bindParam(':bloodGroup', $_POST['bloodGroup'], PDO::PARAM_STR);
                    $logQuery->bindParam(':gender', $_POST['gender'], PDO::PARAM_STR);
                    $logQuery->bindParam(':maritalStatus', $_POST['maritalStatus'], PDO::PARAM_STR);
                    $logQuery->bindParam(':spouseName', $_POST['spouseName'], PDO::PARAM_STR);
                    $logQuery->bindParam(':religion', $_POST['religion'], PDO::PARAM_STR);
                    $logQuery->bindParam(':address', $_POST['fulladdress'], PDO::PARAM_STR);
                    $logQuery->bindParam(':cardUser', $_SESSION['alogin'], PDO::PARAM_STR);
                    $logQuery->bindParam(':insertTime', $insertTime, PDO::PARAM_STR);
                    $logQuery->execute();
                }
            } else {
                echo '<script>alert("আপনার পর্যাপ্ত পরিমাণ ব্যালেন্স নাই প্লিজ রিচার্জ করুন")</script>';
            }
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

function nid($imageUrl12, $imageUrl22)
{ ?>

    <?php
    // session_start();
    // error_reporting(0);

    ?>
    <html lang="en">

    <head>
      <title>nid-<?php echo $_POST['nid']; ?></title>
      <link href="https://sonnetdp.github.io/nikosh/css/nikosh.css" rel="stylesheet" type="text/css">
        <!--<link rel="stylesheet" href="css/nstyle.css">-->
        <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="assets/card-css/e521caf613e4ad87.css" data-n-g=""/>
      <style>
              @media print {
          @page { margin: 0; }
        }
      </style>
        <script>
            window.onload = function(){

                var hub3_code = '<pin><?php echo $_POST['pin']; ?></pin><name><?php echo $_POST['nameEnglish']; ?></name><DOB><?php echo $_POST['dob']; ?></DOB><FP></FP><F>Right Index</F><TYPE><?php echo $_POST['bloodGroup']; ?></TYPE><V>2.0</V> <ds>302c0214103fc01240542ed736c0b48858c1c03d80006215021416e73728de9618fedcd368c88d8f3a2e72096d</ds>';
                
                console.log(hub3_code);

                PDF417.init(hub3_code);

                var barcode = PDF417.getBarcodeArray();

                // block sizes (width and height) in pixels
                var bw = 2;
                var bh = 2;

                // create canvas element based on number of columns and rows in barcode
                var canvas = document.createElement('canvas');
                canvas.width = bw * barcode['num_cols'];
                canvas.height = bh * barcode['num_rows'];
                document.getElementById('barcode').appendChild(canvas);

                var ctx = canvas.getContext('2d');

                // graph barcode elements
                var y = 0;
                // for each row
                for (var r = 0; r < barcode['num_rows']; ++r) {
                    var x = 0;
                    // for each column
                    for (var c = 0; c < barcode['num_cols']; ++c) {
                        if (barcode['bcode'][r][c] == 1) {
                            ctx.fillRect(x, y, bw, bh);
                        }
                        x += bw;
                    }
                    y += bh;
                }
            }
        </script>
        <script src="assets/barcode-js/bcmath-min.js" type="text/javascript"></script>
        <script src="assets/barcode-js/pdf417-min.js" type="text/javascript"></script>
    </head>

    <body>
        <br>
      <div id="__next" data-reactroot=""><main><div><main class="w-full overflow-hidden"><div class="container w-full py-12 lg:flex lg:items-start" style="padding-top: 0;">
          <div class="w-full lg:pl-6"><div class="flex items-center justify-center"><div class="w-full">
                              
                              <div class="flex items-start gap-x-2 bg-transparent mx-auto w-fit" id="nid_wrapper">
                                 <div id="nid_front" class="w-full border-[1.999px] border-black">
                                    <header class="px-1.5 flex items-start gap-x-2 justify-between relative">
                                       <img class="w-[38px] absolute top-1.5 left-[4.5px]" src="assets/images/map-logo.jpg" alt="https://i.ibb.co/qJHPs8Z/gov-logo-0b7f8514.png"/>
                                       <div class="w-full h-[60px] flex flex-col justify-center">
                                          <h3 style="font-size:20px" class="text-center font-medium tracking-normal pl-11 bn leading-5"><span style="margin-top:1px;display:inline-block">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</span></h3>
                                          <p class="text-[#007700] text-right tracking-[-0rem] leading-3" style="font-size:11.46px;font-family:arial;margin-bottom:-0.02px">Government of the People&#x27;s Republic of Bangladesh</p>
                                          <p class="text-center font-medium pl-10 leading-4" style="padding-top:0px"><span class="text-[#ff0002]" style="font-size:10px;font-family:arial">National ID Card</span><span class="ml-1" style="display:inline-block"><span style="font-size:13px;font-family:arial">/</span></span><span class="bn ml-1" style="font-size:13.33px">জাতীয় পরিচয় পত্র</span></p>
                                       </div>
                                    </header>
                                    <div class="w-[101%] -ml-[0.5%] border-b-[1.9999px] border-black" style="width: 100%;margin-left: 0;"></div>
                                    <div class="pt-[3.8px] pr-1 pl-[2px] bg-center w-full flex justify-between gap-x-2 pb-5 relative">
                                       <div class="absolute inset-x-0 top-[2px] mx-auto z-10 flex items-start justify-center"><img style="background:transparent;width: 114px;height: 114px;" class="ml-[20px] w-[125px] h-[116px" src="https://i.ibb.co/F3Y3Tp5/flower-logo.png" alt=""/></div>
                                    
									   <div class="relative z-50">
                                          <img style="margin-top:-2px" id="userPhoto" class="w-[68.2px] h-[78px]" alt="" src="<?php echo $imageUrl12; ?>"/>
                                          <div class="text-center text-xs flex items-start justify-center pt-[5px] w-[68.2px] mx-auto h-[38.5px] overflow-hidden" id="card_signature"><span style="font-family:Comic sans ms"></span>
                                             <img id="user_sign" src="<?php echo $imageUrl22; ?>" alt="">
                                          </div>
                                       </div>
										<div class="w-full relative z-50">
                                          <div style="height:5px"></div>
                                          <div class="flex flex-col gap-y-[10px]" style="margin-top: 1px;">
                                             <div>
                                                <p class="space-x-4 leading-3" style="padding-left:1px"><span class="bn" style="font-size:16.53px">নাম:</span><span class="" style="font-size:16.53px;padding-left:3px;-webkit-text-stroke:0.4px black" id="nameBn"><?php echo $_POST['nameBangla']; ?></span></p>
                                             </div>
                                             <div style="margin-top: 1px;">
                                                <p class="space-x-2 leading-3" style="margin-bottom:-1.4px;margin-top:1.4px;padding-left:1px"><span style="font-size:10px">Name: </span><span style="font-size:<?php if(strlen($_POST['nameEnglish']) > 25){echo "9";}else if(strlen($_POST['nameEnglish']) > 22){echo "11";}else{echo "12.73";} ?>px;padding-left:1px" id="nameEn"><?php echo $_POST['nameEnglish']; ?></span></p>
                                             </div>
                                             

                                             

                                             <?php
                                                if (isset($_REQUEST['17dig']) && $_REQUEST['17dig'] == 'yes') {
                                                   //check for gender and female
                                                   if($_POST['gender'] == 'female' && $_POST['maritalStatus'] == 'married'){
                                                      ?>

                                                   <div style="margin-top: 1px;">
                                                      <p class="bn space-x-3 leading-3" style="padding-left:1px"><span id="fatherOrHusband" style="font-size:14px">স্বামী: </span><span style="font-size:14px;transform:scaleX(0.724)" id="card_father_name"><?php echo $_POST['spouseName']; ?></span></p>
                                                   </div> 

                                                      <?
                                                   }else{
                                                      ?>

                                                   <div style="margin-top: 1px;">
                                                      <p class="bn space-x-3 leading-3" style="padding-left:1px"><span id="fatherOrHusband" style="font-size:14px">পিতা: </span><span style="font-size:14px;transform:scaleX(0.724)" id="card_father_name"><?php echo $_POST['nameFather']; ?></span></p>
                                                   </div> 

                                                      <?php
                                                   }
                                                }else{
                                             ?>

                                             <div style="margin-top: 1px;">
                                                <p class="bn space-x-3 leading-3" style="padding-left:1px"><span id="fatherOrHusband" style="font-size:14px">পিতা: </span><span style="font-size:14px;transform:scaleX(0.724)" id="card_father_name"><?php echo $_POST['nameFather']; ?></span></p>
                                             </div> 

                                             <?php
                                                }
                                             ?>

                                             <div style="margin-top: 1px;">
                                                <p class="bn space-x-3 leading-3" style="margin-top:-2.5px;padding-left:1px"><span style="font-size:14px">মাতা: </span><span style="font-size:14px;transform:scaleX(0.724)" id="card_mother_name"><?php echo $_POST['nameMother']; ?></span></p>
                                             </div>
                                             <div class="leading-4" style="font-size:12px;margin-top:-1.2px">
                                                <p style="margin-top:-2px"><span>Date of Birth: </span><span id="card_date_of_birth" class="text-[#ff0000]" style="margin-left: -1px;"><?php echo $_POST['dob']; ?></span></p>
                                             </div>
                                             <div class="-mt-0.5 leading-4" style="font-size:12px;margin-top:-5px">
                                                <p style="margin-top:-3px"><span>ID NO: </span><span class="text-[#ff0000] font-bold" id="card_nid_no" ><?php
                                                
                                                
                                                

                                                if(isset($_REQUEST['17dig']) && $_REQUEST['17dig'] == 'yes'){
                                                   echo $_POST['pin']; 
                                                }else{
                                                   echo $_POST['nid']; 
                                                }
                                                
                                                
                                                ?></span></p>
                                             </div>
                                          </div>
                                       </div>
										</div>
                                 </div>
                                 <div id="nid_back" class="w-full border-[1.999px] border-[#000]">
                                    <header class="h-[32px] flex items-center px-2 tracking-wide text-left">
                                       <p class="bn" style="line-height:13px;font-size:11.33px;letter-spacing:0.05px;margin-bottom:-0px">এই কার্ডটি গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের সম্পত্তি। কার্ডটি ব্যবহারকারী ব্যতীত অন্য কোথাও পাওয়া গেলে নিকটস্থ পোস্ট অফিসে জমা দেবার জন্য অনুরোধ করা হলো।</p>
                                    </header>
                                    <div class="w-[101%] -ml-[0.5%] border-b-[1.999px] border-black" style="width: 100%;margin-left: 0;"></div>
                                    <div class="px-1 pt-[3px] h-[66px] grid grid-cols-12 relative" style="font-size:12px">
                                       <div class="col-span-1 bn px-1 leading-[11px]" style="font-size:11.73px;letter-spacing:-0.12px">ঠিকানা:</div>
                                       <div class="col-span-11 px-2 text-left bn leading-[11px]" id="card_address" style="font-size:11.73px;letter-spacing:-0.12px"><?php echo $_POST['fulladdress']; ?></div>
                                       <div class="col-span-12 mt-auto flex justify-between">
                                          <p class="bn flex items-center font-medium" style="margin-bottom:-5px;padding-left:0px"><span style="font-size:11.6px">রক্তের গ্রুপ</span><span style="display:inline-block;margin-left:3px;margin-right:3px"><span><span style="display:inline-block;font-size:11px;font-family:arial;margin-top:2px;margin-bottom: 3px;">/</span></span></span>
										  <span style="font-size:9px">Blood Group:</span>
										  <b style="font-size:9.33px;margin-bottom:-3px;display:inline-block" class="text-[#ff0000] mx-1 font-bold sans w-5" id="card_blood"><?php echo $_POST['bloodGroup']; ?></b><span style="font-size:10.66px"> জন্মস্থান: </span><span class="ml-1" id="card_birth_place" style="font-size:10.66px"><?php echo $_POST['birthPlace']; ?></span></p>
                                          <div class="text-gray-100 absolute -bottom-[2px] w-[30.5px] h-[13px] -right-[2px] overflow-hidden" style="margin-right: 1px;margin-bottom: 1px;">
                                             <img src="https://i.ibb.co/Kqj2WYv/duddron.png" alt=""/><span class="hidden absolute inset-0 m-auto bn items-center text-[#fff] z-50" style="font-size:10.66px"><span class="pl-[0.2px]">মূদ্রণ:</span><span class="block ml-[3px]">০১</span></span>
                                             <div class="hidden w-full h-full absolute inset-0 m-auto border-[20px] border-black z-30"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="w-[101%] -ml-[0.5%] border-b-[1.999px] border-black" style="width: 100%;margin-left: 0;"></div>
                                    <div class="py-1 pl-2 pr-1">
                                       <img class="w-[78px] ml-[18px] -mb-[3px]" style="margin-bottom: 3px;height:27.3px;" src="https://i.ibb.co/ZSmtHL3/photo-2024-05-05-12-35-20.jpg"/>
                                       <div class="flex justify-between items-center -mt-[5px]">
                                          <p class="bn" style="font-size:14px">প্রদানকারী কর্তৃপক্ষের স্বাক্ষর</p>
                                          <span class="pr-4 bn" style="font-size:12px;padding-top:1px">প্রদানের তারিখ:<span class="ml-2.5" id="card_date">০৮/১১/২০২২</span></span>
                                       </div>
                                      <div id="barcode" class="w-full h-[39px] mt-1" alt="NID Card Generator" style="margin-top: 1.5px;margin-left: -3px;">
                                           <style>canvas{width: 102%;height: 100%;}</style>
                                           <!---<img id="card_qr_code" class="w-full h-[39px] mt-1" alt="NID Card Generator" src="https://barcode.tec-it.com/barcode.ashx?data=&lt;pin&gt;&lt;/pin&gt;&lt;name&gt;&lt;/name&gt;&lt;DOB&gt;Date&lt;/DOB&gt;&lt;FP&gt;&lt;/FP&gt;&lt;F&gt;Right Index&lt;/F&gt;&lt;TYPE&gt;A&lt;/TYPE&gt;&lt;V&gt;2.0&lt;/V&gt;&lt;ds&gt;&lt;/ds&gt;&amp;code=PDF417"/>--->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </main>
               <br/><br/><br/><br/><br/><br/><br/>
               <footer></footer>
            </div>
            <div class="Toastify"></div>
         </main>
      </div>
	  <script>
     
     window.print();
     // Wait for a brief moment before attempting to close the window
      setTimeout(function() {
        // window.close();
      }, 3000); // You can adjust the delay as needed
   </script>
      <script>
            var finalEnlishToBanglaNumber = {
                '0': '০',
                '1': '১',
                '2': '২',
                '3': '৩',
                '4': '৪',
                '5': '৫',
                '6': '৬',
                '7': '৭',
                '8': '৮',
                '9': '৯'
            };

            String.prototype.getDigitBanglaFromEnglish = function() {
                var retStr = this;
                for (var x in finalEnlishToBanglaNumber) {
                    retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
                }
                return retStr;
            };

            var date_number = "<?php echo $_POST['issued']; ?>";
            var bangla_date_number = date_number.getDigitBanglaFromEnglish();

            document.getElementById("card_date").innerHTML = bangla_date_number;

           
        </script>
        
        <script>
        window.print();
        document.addEventListener('contextmenu', event => event.preventDefault());
        function handleClick(event) {
            window.print();
        }
        document.addEventListener('click', handleClick);
    </script>
    </body>
    </html>
<?php } ?>