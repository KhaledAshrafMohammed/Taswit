<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Edit Company</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

  <!-- Custom styles for this template-->
  <link href="css/bootstrap-custom.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-tumblr"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TASWIT</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Customers Area</div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="manage_companies.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Manage Companies</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="manage_users.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Manage Users</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Admins Area</div>

      <li class="nav-item">
        <a class="nav-link" href="manage_admins.html">
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
            <!-- Edit Users -->
            <div class="col-md-9">
              <div class="Edituser-form">
                <!-- form Edit Company -->
                <form actions="" class="card mt-4 border p-5 bg-light shadow">
                  <h3 class=" card-header-pills mb-4 text-gray-800"> Edit User</h3>
                  
                  <div class="form-group row">
                    <label for="usr" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                    <div class="col-md-10 py-1">
                      <input type="text" class="form-control form-control-lg" id="usr">
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
                      <input type="tel" class="form-control form-control-lg" id="phone" name="phone"
                        pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                    </div>
                  </div>

                   
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Position</label>
                    <div class="col-md-10 py-1">
                      <input type="email" class="form-control form-control-lg" id="email" name="email">
                    </div>
                  </div>
                     
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Status</label>
                    <div class="col-md-10 py-1">
                      <input type="email" class="form-control form-control-lg" id="email" name="email">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Company</label>
                    <div class="col-md-10 py-1">
                      <select class="browser-default custom-select custom-select-lg" size="1"
                        aria-label="size 3 select example">
                        <option selected></option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                  
   
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary btn-rounded shadow-sm btn-lg mt-3" type="button" herf="#">Edit</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      <br>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer mt-2 bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Taswit 2022</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">
              Cancel
            </button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/bootstrap-custom.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>