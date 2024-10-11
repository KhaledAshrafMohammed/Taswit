<?php 

	// Add New Member Errors
	$newmemberErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'members.php' && $do == 'insert') {
		if (strlen($protectname) < 5) {

			$newmemberErrors[] = 'Full Name Can\'t be less than <strong>5 letters </strong>';
		} elseif (strlen($protectname) > 30) {

			$newmemberErrors[] = 'Full Name Can\'t be more than <strong>30 letters</strong>';
		}
		if (strlen($protectuser) < 4) {

			$newmemberErrors[] = 'Username Can\'t be less than <strong>4 letters</strong>';
		} elseif (strlen($protectuser) > 20) {

			$newmemberErrors[] = 'Username Can\'t be more than <strong>20 letters</strong>';
		}
		if (empty($email)) {

			$newmemberErrors[] = 'Email Can\'t be <strong>empty</strong>';
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$newmemberErrors[] = 'Wrong Email';
		}
		if (!is_numeric($group)) {
			$newmemberErrors[] = 'Wrong Group';
		}
		if (empty($pass)) {
			$newmemberErrors[] = 'Password Can\'t be <strong>empty</strong>';
		} elseif (strlen($pass) < 8) {

			$newmemberErrors[] = 'Password Can\'t be less than <strong>8 letters</strong>';
		} elseif ($pass != $confirmpass) {
			$newmemberErrors[] = 'Password Didn\'t Match';
		}
		if (!empty($avatarName) && !in_array($avatarextension, $avatarElist)) {
			$newmemberErrors[] = 'Extension not allowed , allowed extensions are : <strong>png, jpg or gif</strong>';
		} elseif ($avatarSize > 5242880) {
			$newmemberErrors[] = 'Max size for img is <strong>5 MB</strong>';
		}
		// Loop into error array and echo it
		foreach($newmemberErrors as $error) {
		echo '<div class="alert alert-danger"> ' . $error . ' </div>';
		}
		header('refresh:2;url=members.php?do=add');

	}
	// Members Edit Errors
	$memberErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'members.php' && $do == 'update') {
		if (strlen($protectname) < 5) {

			$memberErrors[] = 'Full Name Can\'t be less than <strong>5 letters </strong>';
		} elseif (strlen($protectname) > 30) {

			$memberErrors[] = 'Full Name Can\'t be more than <strong>30 letters</strong>';
		}
		if (strlen($protectuser) < 4) {

			$memberErrors[] = 'Username Can\'t be less than <strong>4 letters</strong>';
		} elseif (strlen($protectuser) > 20) {

			$memberErrors[] = 'Username Can\'t be more than <strong>20 letters</strong>';
		}
		if (empty($email)) {

			$memberErrors[] = 'Email Can\'t be <strong>empty</strong>';
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$memberErrors[] = 'Wrong Email';
		}
	 	if (!is_numeric($group)) {
			$memberErrors[] = 'Wrong Group';
		}
		if (!is_numeric($trust)) {
			$memberErrors[] = 'Wrong Trust Status';
		}
		if (!is_numeric($reg)) {
			$memberErrors[] = 'Wrong Register Status';
		}
		// Loop into error array and echo it
		foreach($memberErrors as $error) {
		echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=' . $_SERVER['HTTP_REFERER']);

	}
	// Edit Profile Errors
	$profileErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'members.php' && $do == 'update') {
		if (strlen($protectname) < 5) {

			$profileErrors[] = 'Full Name Can\'t be less than <strong>5 letters </strong>';
		} elseif (strlen($protectname) > 30) {

			$profileErrors[] = 'Full Name Can\'t be more than <strong>30 letters</strong>';
		}
		if (strlen($protectuser) < 4) {

			$profileErrors[] = 'Username Can\'t be less than <strong>4 letters</strong>';
		} elseif (strlen($protectuser) > 20) {

			$profileErrors[] = 'Username Can\'t be more than <strong>20 letters</strong>';
		}
		if (empty($email)) {

			$profileErrors[] = 'Email Can\'t be <strong>empty</strong>';
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$profileErrors[] = 'Wrong Email';
		}
		// Loop into error array and echo it
		foreach($profileErrors as $error) {
		echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=' . $_SERVER['HTTP_REFERER']);

	}
	// Change Password Errors
	$chgpassErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'members.php' && $do == 'updatepass') {

		if (empty($newpass)) {

			$chgpassErrors[] = 'New Password Can\'t be <strong>empty</strong>';
		} elseif (strlen($newpass) < 8) {

			$chgpassErrors[] = 'New Password Can\'t be less than <strong>8 letters</strong>';
		}
		if (empty($newpass2)) {

			$chgpassErrors[] = 'New Password Can\'t be <strong>empty</strong>';
		} elseif ($newpass != $newpass2) {

			$chgpassErrors[] = 'Password Didn\'t Match';
		}
		// Loop into error array and echo it
		foreach($chgpassErrors as $error) {
			echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=' . $_SERVER['HTTP_REFERER']);

	}
	// Delete Member Errors
	$deletemErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'members.php' && $do == 'delete') {

		if (!is_numeric($userid)) {

			$deletemErrors[] = 'Wrong ID';
		}
		foreach($deletemErrors as $error) {
			echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=members.php');
	}
	// Add New Category Errors
	$newcategoryErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'categories.php' && $do == 'insert') {
		if (strlen($protectname) < 3) {

			$newcategoryErrors[] = 'Category Name Can\'t be less than <strong>3 letters </strong>';
		} elseif (strlen($protectname) > 20) {

			$newcategoryErrors[] = 'Category Name Can\'t be more than <strong>20 letters</strong>';
		}
		if (strlen($protectdesc) > 50) {

			$newcategoryErrors[] = 'Description Can\'t be more than <strong>50 letters</strong>';
		}
		if (!is_numeric($order)) {
			$newcategoryErrors[] = 'Wrong Ordering';
		}
		if (!is_numeric($visible)) {
			$newcategoryErrors[] = 'Wrong Visible';
		}
		if (!is_numeric($comment)) {
			$newcategoryErrors[] = 'Wrong Allow-Comment';
		}
		if (!is_numeric($ads)) {
			$newcategoryErrors[] = 'Wrong Allow-Ads';
		}
		// Loop into error array and echo it
		foreach($newcategoryErrors as $error) {
		echo '<div class="alert alert-danger"> ' . $error . ' </div>';
		}
		header('refresh:2;url=categories.php?do=add');

	}
	// Category Edit Errors
	$categoryErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'categories.php' && $do == 'update') {
		if (strlen($protectname) < 3) {

			$categoryErrors[] = 'Category Name Can\'t be less than <strong>3 letters </strong>';
		} elseif (strlen($protectname) > 20) {

			$categoryErrors[] = 'Category Name Can\'t be more than <strong>20 letters</strong>';
		}
		if (strlen($protectdesc) > 50) {

			$categoryErrors[] = 'Description Can\'t be more than <strong>50 letters</strong>';
		}
		if (!is_numeric($order)) {
			$categoryErrors[] = 'Wrong Ordering';
		}
		if (!is_numeric($visible)) {
			$categoryErrors[] = 'Wrong Visible';
		}
		if (!is_numeric($comment)) {
			$categoryErrors[] = 'Wrong Allow-Comment';
		}
		if (!is_numeric($ads)) {
			$categoryErrors[] = 'Wrong Allow-Ads';
		}
		// Loop into error array and echo it
		foreach($categoryErrors as $error) {
		echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=' . $_SERVER['HTTP_REFERER']);

	}
	// Delete Category Errors
	$deletecErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'categories.php' && $do == 'delete') {

		if (!is_numeric($catid)) {

			$deletecErrors[] = 'Wrong ID';
		}
		foreach($deletecErrors as $error) {
			echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=categories.php');
	}
	// Add New Item Errors
	$newitemErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'items.php' && $do == 'insert') {
		if (strlen($protectname) < 3) {

			$newitemErrors[] = 'Item Name Can\'t be less than <strong>3 letters </strong>';
		} elseif (strlen($protectname) > 20) {

			$newitemErrors[] = 'Item Name Can\'t be more than <strong>20 letters</strong>';
		}
		if (strlen($protectdesc) > 100) {

			$newitemErrors[] = 'Description Can\'t be more than <strong>100 letters</strong>';
		}
		if (!is_numeric($price)) {
			$newitemErrors[] = 'Wrong Price';
		} elseif (strlen($price) > 10) {

			$newitemErrors[] = 'Price Can\'t be more than <strong>10 numbers</strong>';
		}
		if (empty($protectcountry)) {
			$newitemErrors[] = 'Wrong Country';
		}
		if (!is_numeric($status)) {
			$newitemErrors[] = 'Wrong status';
		}
		if (!is_numeric($member)) {
			$newitemErrors[] = 'Wrong Owner';
		}
		if (!is_numeric($category)) {
			$newitemErrors[] = 'Wrong category';
		}
		// Loop into error array and echo it
		foreach($newitemErrors as $error) {
		echo '<div class="alert alert-danger"> ' . $error . ' </div>';
		}
		header('refresh:2;url=items.php?do=add');

	}

	// item Edit Errors
	$itemErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'items.php' && $do == 'update') {
		if (strlen($protectname) < 3) {

			$itemErrors[] = 'Item Name Can\'t be less than <strong>3 letters </strong>';
		} elseif (strlen($protectname) > 20) {

			$itemErrors[] = 'Item Name Can\'t be more than <strong>20 letters</strong>';
		}
		if (strlen($protectdesc) > 100) {

			$itemErrors[] = 'Description Can\'t be more than <strong>100 letters</strong>';
		}
		if (!is_numeric($price)) {
			$itemErrors[] = 'Wrong status';
		} elseif (strlen($price) > 10) {

			$itemErrors[] = 'Price Can\'t be more than <strong>10 numbers</strong>';
		}
		if (empty($protectcountry)) {
			$itemErrors[] = 'Wrong Country';
		}
		if (!is_numeric($status)) {
			$itemErrors[] = 'Wrong status';
		}
		if (!is_numeric($member)) {
			$itemErrors[] = 'Wrong Owner';
		}
		if (!is_numeric($category)) {
			$itemErrors[] = 'Wrong category';
		}
		// Loop into error array and echo it
		foreach($itemErrors as $error) {
		echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=' . $_SERVER['HTTP_REFERER']);

	}
	// Delete item Errors
	$deleteiErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'items.php' && $do == 'delete') {

		if (!is_numeric($itemid)) {

			$deleteiErrors[] = 'Wrong ID';
		}
		foreach($deleteiErrors as $error) {
			echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=items.php');
	}
	// Comment Edit Errors
	$commErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'comments.php' && $do == 'update') {
		if (strlen($protectcomm) < 3) {

			$commErrors[] = 'Comment Can\'t be less than <strong>3 letters </strong>';
		} elseif (strlen($protectcomm) > 500) {

			$commErrors[] = 'Comment Can\'t be more than <strong>500 letters</strong>';
		}
		if (!is_numeric($member)) {
			$commErrors[] = 'Wrong Owner';
		}
		if (!is_numeric($item)) {
			$commErrors[] = 'Wrong item';
		}
		// Loop into error array and echo it
		foreach($commErrors as $error) {
		echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=' . $_SERVER['HTTP_REFERER']);

	}
	// Delete item Errors
	$deletecoErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'comments.php' && $do == 'delete') {

		if (!is_numeric($commentid)) {

			$deletecoErrors[] = 'Wrong ID';
		}
		foreach($deletecoErrors as $error) {
			echo '<div class="alert alert-danger">' . $error . ' </div>';
		}
		header('refresh:2;url=comments.php');
	}
	// Register New Member Errors
	$registerErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'login.php' && isset($_POST['signup'])) {
		if (strlen($protectname) < 5) {

			$registerErrors[] = 'Full Name Can\'t be less than <strong>5 letters </strong>';
		} elseif (strlen($protectname) > 30) {

			$registerErrors[] = 'Full Name Can\'t be more than <strong>30 letters</strong>';
		}
		if (strlen($protectuser) < 4) {

			$registerErrors[] = 'Username Can\'t be less than <strong>4 letters</strong>';
		} elseif (strlen($protectuser) > 20) {

			$registerErrors[] = 'Username Can\'t be more than <strong>20 letters</strong>';
		}
		if (empty($email)) {

			$registerErrors[] = 'Email Can\'t be <strong>empty</strong>';
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$registerErrors[] = 'Wrong Email';
		}
		if (empty($pass)) {
			$registerErrors[] = 'Password Can\'t be <strong>empty</strong>';
		} elseif (strlen($pass) < 8) {

			$registerErrors[] = 'Password Can\'t be less than <strong>8 letters</strong>';
		} elseif ($pass != $confirmpass) {
			$registerErrors[] = 'Password Didn\'t Match';
		}
		// Loop into error array and echo it
		foreach($registerErrors as $error) {
		echo '<div class="alert alert-danger"> ' . $error . ' </div>';
		}
	}
	// Add New ad Errors
	$newadErrors = array();
	if (basename($_SERVER['PHP_SELF']) == 'newad.php') {
		if (strlen($protectname) < 3) {

			$newadErrors[] = 'Item Name Can\'t be less than <strong>3 letters </strong>';
		} elseif (strlen($protectname) > 20) {

			$newadErrors[] = 'Item Name Can\'t be more than <strong>20 letters</strong>';
		}
		if (strlen($protectdesc) > 100) {

			$newadErrors[] = 'Description Can\'t be more than <strong>100 letters</strong>';
		}
		if (strlen($protectprice) > 10) {

			$newadErrors[] = 'Price Can\'t be more than <strong>10 numbers</strong>';
		}
		if (empty($protectcountry)) {
			$newadErrors[] = 'Wrong Country';
		}
		if (!is_numeric($status)) {
			$newadErrors[] = 'Wrong status';
		}
		if (!is_numeric($category)) {
			$newadErrors[] = 'Wrong category';
		}
		// Loop into error array and echo it
		foreach($newadErrors as $error) {
		echo '<div class="alert alert-danger"> ' . $error . ' </div>';
		}
	}