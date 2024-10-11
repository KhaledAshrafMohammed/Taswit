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
    $stmt = $con->prepare("SELECT * FROM companies ORDER BY companies.ID DESC");
    // Execute data
    $stmt->execute();
    // Assign To Variable
    $rows = $stmt->fetchAll();
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
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['Username']; ?></span>
              <img class="img-profile rounded-circle" src="/taswit/layout/img/undraw_profile.svg">
            </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
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
        <div class="card-fluid ">
          <!-- Content Row -->
          <div class="row justify-content-center">
            <!-- Add Users -->
            <div class="col-md-9">
              <div class="adduser-form">
                <!-- form Add Users -->
                <form action="" class="card mt-3 border p-4 bg-light shadow" method="POST">
                  <h3 class=" card-header-pills mb-4 text-gray-800"> Add User</h3>

                  <div class="form-group row">
                    <label for="usr" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                    <div class="col-md-10 py-1">
                      <input type="text" class="form-control form-control-lg" id="usr" name="name">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                    <div class="col-md-10 py-1">
                      <input type="email" class="form-control form-control-lg" id="email" name="email">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label col-form-label-lg">Mobile</label>
                    <div class="col-md-10 py-1">
                      <input type="tel" class="form-control form-control-lg" id="phone" name="phone">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="position" class="col-sm-2 col-form-label col-form-label-lg">Position</label>
                    <div class="col-md-10 py-1">
                      <input type="text" class="form-control form-control-lg" id="email" name="position">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Company</label>
                    <div class="col-md-10 py-1">
                      <select name="company" class="browser-default custom-select custom-select-lg" size="1" aria-label="size 3 select example">
                        <option selected></option>
                        <?php foreach ($rows as $row) { ?>
                        <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                        
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input class="btn btn-primary btn-rounded shadow-sm btn-lg" type="submit" value="Add">
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        <br>
        <!-- End of Main Content -->

        <?php
        if (isset($_SESSION['Username'])) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Get Variables From the form
            $name          = $_POST['name'];
            $protectName   = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $email         = $_POST['email'];
            $protectEmail   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            $phone         = $_POST['phone'];
            $protectPhone   = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
            $position         = $_POST['position'];
            $protectPosition   = htmlspecialchars($position, ENT_QUOTES, 'UTF-8');
            $company         = $_POST['company'];
            $protectCompany   = htmlspecialchars($company, ENT_QUOTES, 'UTF-8');

            include 'inc/errors.php';
            // check if we didn't have errors
            if (empty($newitemErrors)) {
              // Insert into the DB this Info
              $stmt = $con->prepare("INSERT INTO users(Name, Email, regDate, companyID, Position, Phone) VALUES (?, ?, now(), ?, ?, ?)");
              $stmt->execute(array($protectName, $protectEmail, $protectCompany, $protectPosition, $protectPhone));

              // echo success message
              echo '<div class="alert alert-success">User Added Successfully</div>';
            }
          }
        }
        ?>

        <?php include 'inc/templates/footer.php'; ?>