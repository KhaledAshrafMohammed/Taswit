<?php
session_start();
$pageTitle = 'Dashboard';
if (!isset($_SESSION['Username'])) {

  header('Location: index.php');
  exit;
}
include 'inc/init.php';

if (isset($_SESSION['Username'])) {

  $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

  if ($do == 'Manage') { // Start Manage Page
    // Select Data from users
    $stmt = $con->prepare("SELECT admins.*, companies.Name as coName FROM admins INNER JOIN companies ON admins.companyID = companies.ID ORDER BY admins.UserID DESC");
    // Execute data
    $stmt->execute();
    // Assign To Variable
    $rows = $stmt->fetchAll();
  } elseif ($do == 'delete') { // Start Delete page

    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
    // check if userid is exist
    $checkid = checkItem('UserID', 'users', $userid);
    // If there is such ID Show The Form
    if ($checkid > 0) {

      include 'errors.php';
      // check if we didn't have errors
      if (empty($deletemErrors)) {

        // Update the DB with this Info
        $stmt = $con->prepare("DELETE FROM admins WHERE admins.UserID = ?");
        $stmt->execute(array($userid));
        // echo success message
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
      }
    } else {
      $theMsg = '<div class="alert alert-danger">No Such User ID</div>';
      redirectHome($theMsg, $_SERVER['HTTP_REFERER']);
    }
  }
}

?>
<?php include 'inc/templates/header.php'; ?>

<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fab fa-tumblr"></i>
      </div>
      <div class="sidebar-brand-text mx-3">TASWIT</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Customers Area</div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="manage_companies.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Manage Companies</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="manage_users.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Manage Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Admins Area</div>

    <li class="nav-item">
      <a class="nav-link" href="manage_admins.php">
        <i class="fas fa-users-cog"></i>
        <span>Manage Administrators</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
              <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid ">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Administrator Management</h1>

        <!-- DataTales Example -->
        <div class="card shadow  mb-4">
          <div class="card-header py-3 ">
            <a href="Add_users_admin.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">New User</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Company</th>
                    <th>Position</th>
                    <th>Registerd Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($rows as $row) { ?>
                    <tr>
                      <td><?php echo $row['UserID']; ?></td>
                      <td><?php echo $row['Name']; ?></td>
                      <td><?php echo $row['Email']; ?></td>
                      <?php
                      if ($row['roleID'] == 1) {
                        echo '<td>Application Admin</td>';
                      } else {
                        echo '<td>Company Admin</td>';
                      }
                      ?>
                      <td><?php echo $row['coName']; ?></td>
                      <td><?php echo $row['Position']; ?></td>
                      <td><?php echo $row['Date']; ?></td>
                      <td>
                        <div>
                          <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#"><i class="fas fa-edit"></i> Edit</a>

                          <a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm confirm" href="?do=delete&userid=<?php echo $row['UserID']; ?>"> <i class="fas fa-times"></i> Delete</a>
                        </div>
                      </td>
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
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?php include 'inc/templates/footer.php'; ?>