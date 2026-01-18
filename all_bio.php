<?php
// Include HTML header
require_once("includes/html-header.php");
?>

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

        <?php
        include('includes/whatsapp.php');
?>

            <!-- Include Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

            <!-- Main Content -->
            <div class="content-wrapper" style="padding: 20px; display: flex; justify-content: center; align-items: flex-start; height: 100vh; overflow-y: auto;">
                <div class="button-grid">

                    <a href="gp_bio.php" class="card"><i class="fas fa-server"></i> GP BIOMETRIC</a>
                    <a href="robi_bio.php" class="card"><i class="fas fa-id-card"></i> ROBI AIRTEL BIOMETRIC</a>
                    <a href="bl_bio.php" class="card"><i class="fas fa-pen-square"></i> BANGLALINK BIOMETRIC</a>
                    <a href="tele_bio.php" class="card"><i class="fas fa-envelope-open-text"></i> TELETALK BIOMETRIC</a>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button onclick="topFunction()" id="scrollToTopBtn" title="Go to top">↑</button>

    <!-- Custom Styles -->
    <style>
        body {
            margin: 0;
            background-color: #f0f0f0; /* Light grey background */
        }
        .button-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            width: 90%;
            max-width: 900px;
            margin: 80px auto;
        }
        .button-grid a.card {
            text-decoration: none;
            padding: 25px 30px;
            border-radius: 15px;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        .button-grid a.card i {
            font-size: 24px;
        }
        .button-grid a.card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(45deg, #ff6b6b, #ff4757);
        }
        .button-grid a.card:nth-child(odd) { background: linear-gradient(45deg, #ff6b6b, #ff4757); }
        .button-grid a.card:nth-child(even) { background: linear-gradient(45deg, #54a0ff, #2e86de); }
        .button-grid a.card::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 150%;
            height: 150%;
            background: rgba(255, 255, 255, 0.1);
            transform: translate(-50%, -50%) rotate(45deg);
            transition: opacity 0.3s ease;
            opacity: 0;
        }
        .button-grid a.card:hover::before {
            opacity: 1;
        }
        #scrollToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 15px;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }
        #scrollToTopBtn:hover {
            background-color: #0056b3;
        }
    </style>

    <!-- Scroll to Top Script -->
    <script>
        var mybutton = document.getElementById("scrollToTopBtn");
        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        };
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        // Function to generate a random color in hexadecimal format
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Function to change the background color of elements
        function changeColors() {
            const buttonLinks = document.querySelectorAll('.button-grid a.card');
            buttonLinks.forEach(link => {
                link.style.background = `linear-gradient(45deg, ${getRandomColor()}, ${getRandomColor()})`;
            });

            // Change the scroll to top button background color
            const scrollToTopBtn = document.getElementById('scrollToTopBtn');
            scrollToTopBtn.style.backgroundColor = getRandomColor();
        }

        // Call the changeColors function every minute (60000ms)
        setInterval(changeColors, 60000);

        // Initial call to set the colors when the page loads
        changeColors();
    </script>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>
