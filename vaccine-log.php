<?php
// Start session and include necessary files
session_start();
require_once("includes/db.php"); // Database connection
require_once("includes/html-header.php");

// Check if user is logged in and define user ID
if (!isset($_SESSION['alogin'])) {
    header('location: login.php');
    die();
}

$id = $_SESSION['alogin']; // Logged-in user's email

// Insert logged-in user's email into tbl_submission if it's not already inserted
$check_query = "SELECT * FROM tbl_submission WHERE created_by = '$id'";
$check_result = mysqli_query($link, $check_query);

if (!$check_result || mysqli_num_rows($check_result) == 0) {
    $insert_query = "INSERT INTO tbl_submission (created_by) VALUES ('$id')";
    mysqli_query($link, $insert_query);
}

// Handle deletion
if (isset($_GET['delete'])) {
    $delete_id = mysqli_real_escape_string($link, $_GET['delete']);
    $delete_query = "DELETE FROM tbl_submission WHERE certi_no = '$delete_id' AND created_by = '$id'";
    mysqli_query($link, $delete_query);
    header("Location: vaccine-log.php");
    exit;
}

// Handle search functionality
$search_query = "";
if (isset($_GET['search'])) {
    $search_value = mysqli_real_escape_string($link, $_GET['search']);
    $search_query = "AND (certi_no LIKE '%$search_value%' OR name LIKE '%$search_value%' OR date_birth LIKE '%$search_value%')";
}

// Fetch submissions data related to the logged-in user with search criteria
$select = "SELECT * FROM tbl_submission WHERE created_by = '$id' $search_query";
$g = mysqli_query($link, $select);
?>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  
  <!-- Include Sidebar -->
  <?php require_once("includes/sidebar.php"); ?>

  <!-- Main Wrapper -->
  <div class="body-wrapper">
    
    <!-- Include Header -->
    <?php require_once("includes/header.php"); ?>

    <div class="container-fluid">
      <!-- Notice Section -->
      <marquee class="alert alert-dark text-white" onmouseover="this.stop()" onmouseout="this.start()" role="alert" style="font-size: 1rem;">
        <?php 
        $se = "SELECT * FROM notice";
        $data = mysqli_query($link, $se);
        $d = mysqli_fetch_assoc($data);
        echo $d['notice']; 
        ?>
      </marquee>

      <!-- Search Form -->
      <div class="card w-100 mb-4">
        <div class="card-body">
          <form method="GET" action="">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Certificate No, Name, or DOB" value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : ''; ?>">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Submission List -->
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4 text-center">My Submission List</h5>
          
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle table-striped">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">#</th>
                  <th class="border-bottom-0">CERTIFICATE</th>
                  <th class="border-bottom-0">NAME</th>
                  <th class="border-bottom-0">DOB</th>
                  <th class="border-bottom-0">ACTIONS</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $cnt = 1;
                if ($g && mysqli_num_rows($g) > 0) {
                    while ($row = mysqli_fetch_assoc($g)) {
                ?>
                  <tr>
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo isset($row['certi_no']) ? $row['certi_no'] : '-'; ?></td>
                    <td><?php echo isset($row['name']) ? $row['name'] : '-'; ?></td>
                    <td><?php echo isset($row['date_birth']) ? $row['date_birth'] : '-'; ?></td>
                    <td>
                      <a href="print-details.php?no=<?php echo htmlentities($row['certi_no']); ?>" class="btn btn-info btn-sm">Download</a>
                      <a href="?delete=<?php echo htmlentities($row['certi_no']); ?>" onclick="return confirm('Are you sure you want to delete this entry?');" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                <?php
                      $cnt++;
                    }
                } else {
                ?>
                  <tr>
                    <td colspan="5" class="text-center">No submissions found for you.</td>
                  </tr>
                <?php
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