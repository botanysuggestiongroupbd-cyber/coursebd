<?php
// Include header and sidebar
require_once("includes/html-header.php");
?>

<style>
/* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

/* Scope all styles to the photo editor section */
.photo-editor-container {
  display: flex;
  justify-content: center;
  align-items: center;
  background: #E3F2FD;
  padding: 20px;
  min-height: 100vh;
}

.photo-editor-container * {
  font-family: 'Poppins', sans-serif;
  box-sizing: border-box;
}

.photo-editor-container .container {
  width: 100%;
  max-width: 850px;
  padding: 20px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.photo-editor-container .container.disable .editor-panel,
.photo-editor-container .container.disable .controls .reset-filter,
.photo-editor-container .container.disable .controls .save-img {
  opacity: 0.5;
  pointer-events: none;
}

.photo-editor-container .container h2 {
  font-size: 22px;
  font-weight: 500;
  text-align: center;
}

.photo-editor-container .wrapper {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
}

.photo-editor-container .editor-panel {
  padding: 15px;
  width: 100%;
  max-width: 280px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.photo-editor-container .editor-panel .title {
  display: block;
  font-size: 16px;
  margin-bottom: 12px;
  color: #333;
}

.photo-editor-container .editor-panel .options,
.photo-editor-container .controls {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  justify-content: space-between;
}

.photo-editor-container .editor-panel button {
  outline: none;
  height: 40px;
  font-size: 14px;
  color: #6C757D;
  background: #fff;
  border-radius: 3px;
  border: 1px solid #aaa;
  flex: 1 1 calc(50% - 10px);
  transition: background 0.3s ease;
}

.photo-editor-container .editor-panel button:hover {
  background: #f5f5f5;
}

.photo-editor-container .filter button.active {
  color: #fff;
  border-color: #5372F0;
  background: #5372F0;
}

.photo-editor-container .filter .slider {
  margin-top: 12px;
}

.photo-editor-container .filter .slider .filter-info {
  display: flex;
  color: #464646;
  font-size: 14px;
  justify-content: space-between;
}

.photo-editor-container .filter .slider input {
  width: 100%;
  height: 5px;
  accent-color: #5372F0;
}

.photo-editor-container .editor-panel .rotate {
  margin-top: 17px;
}

.photo-editor-container .rotate .options button {
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 1 1 22%;
  font-size: 18px;
}

.photo-editor-container .rotate .options button:active {
  color: #fff;
  background: #5372F0;
  border-color: #5372F0;
}

.photo-editor-container .preview-img {
  flex-grow: 1;
  display: flex;
  overflow: hidden;
  border-radius: 5px;
  align-items: center;
  justify-content: center;
  background: #f8f8f8;
  max-width: 490px;
  width: 100%;
}

.photo-editor-container .preview-img img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

.photo-editor-container .controls button {
  padding: 10px;
  font-size: 14px;
  border-radius: 3px;
  outline: none;
  color: #fff;
  cursor: pointer;
  background: none;
  text-transform: uppercase;
  transition: all 0.3s ease;
}

.photo-editor-container .controls .reset-filter {
  color: #6C757D;
  border: 1px solid #6C757D;
}

.photo-editor-container .controls .reset-filter:hover {
  color: #fff;
  background: #6C757D;
}

.photo-editor-container .controls .choose-img {
  background: #6C757D;
  border: 1px solid #6C757D;
}

.photo-editor-container .controls .save-img {
  background: #5372F0;
  border: 1px solid #5372F0;
}

@media screen and (max-width: 768px) {
  .photo-editor-container .container {
    padding: 15px;
  }
  .photo-editor-container .wrapper {
    flex-direction: column;
  }
  .photo-editor-container .editor-panel,
  .photo-editor-container .preview-img {
    width: 100%;
  }
  .photo-editor-container .controls button {
    width: 100%;
    margin-bottom: 10px;
  }
  .photo-editor-container .editor-panel button {
    flex: 1 1 48%;
  }
}

@media screen and (max-width: 480px) {
  .photo-editor-container .container {
    padding: 10px;
  }
  .photo-editor-container .wrapper {
    gap: 15px;
  }
  .photo-editor-container .editor-panel {
    padding: 10px;
  }
  .photo-editor-container .controls button {
    padding: 8px;
    font-size: 13px;
  }
  .photo-editor-container .editor-panel button {
    height: 35px;
    font-size: 13px;
  }
  .photo-editor-container .preview-img {
    max-width: 100%;
  }
}


</style>
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
<div class="photo-editor-container">
                <!-- Image Editor Section -->
                <div class="card w-100 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 text-center">Image Editor</h5>

                        <div class="container disable">
                            <h2>Easy Image Editor</h2>
                            <div class="wrapper">
                                <div class="editor-panel">
                                    <div class="filter">
                                        <label class="title">Filters</label>
                                        <div class="options">
                                            <button id="brightness" class="active">Brightness</button>
                                            <button id="saturation">Saturation</button>
                                            <button id="inversion">Inversion</button>
                                            <button id="grayscale">Grayscale</button>
                                        </div>
                                        <div class="slider">
                                            <div class="filter-info">
                                                <p class="name">Brightness</p>
                                                <p class="value">100%</p>
                                            </div>
                                            <input type="range" value="100" min="0" max="200">
                                        </div>
                                    </div>
                                    <div class="rotate">
                                        <label class="title">Rotate & Flip</label>
                                        <div class="options">
                                            <button id="left"><i class="fa-solid fa-rotate-left"></i></button>
                                            <button id="right"><i class="fa-solid fa-rotate-right"></i></button>
                                            <button id="horizontal"><i class='bx bx-reflect-vertical'></i></button>
                                            <button id="vertical"><i class='bx bx-reflect-horizontal'></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-img">
                                    <img src="image-placeholder.svg" alt="preview-img">
                                </div>
                            </div>
                            <div class="controls">
                                <button class="reset-filter">Reset Filters</button>
                                <div class="row">
                                    <input type="file" class="file-input" accept="image/*" hidden>
                                    <button class="choose-img">Choose Image</button>
                                    <button class="save-img">Save Image</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                <!-- Image Editor Section End -->
            <
        </div>
    </div>

    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="image.js"></script>
</body>
</html>
