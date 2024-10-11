<?php

	session_start();
	$noNavbar = '';
	$pageTitle = 'Login';
	if(isset($_SESSION['Username'])) {

		header('Location: dashboard.php');
	}
	include 'inc/init.php';
	//Check If User Comming From Http Post Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$username 		= $_POST['user'];
		$protectuser	= htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
		$password 		= $_POST['pass'];
		$hashedPass 	= sha1($password);
		
		// Check If The User Exist In DB

		$stmt = $con->prepare("SELECT UserID, Username FROM users WHERE Username = ? AND Password = ?");
		$stmt->execute(array($protectuser, $hashedPass));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();

		// If Count > 0 This Mean The DB Contain Record About This Username

		if ($count > 0) {
			$_SESSION['Username'] = $protectuser; // Register Session Name
			$_SESSION['ID'] = $row['UserID']; // Register Session ID
			header('Location: dashboard.php'); // Redirect to Dashboard
			exit();

		} else {

			echo '<div class="alert alert-danger">username or password is wrong</div>';
		}

	}

?>
	
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Taswit Project">
    <meta name="author" content="Taswit">

    <title>Taswit - Login</title>

    <link href="/taswit/layout/css/bootstrap-custom.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="user">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="pass">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
										<input class="btn btn-primary btn-user btn-block" type="submit" value="login" />
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>