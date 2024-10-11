<?php

	include 'config.php';
	header('Cache-Control: private,no-store,no-cache');
	// Routes
	// $tpl = 'inc/templates/'; // Template Directory
	$func = 'inc/func/'; // Functions Directory

	// // Include important files
	// include $lang . 'en.php';
	include $func . 'functions.php';

	// // include Navbar On All Pages Expect The one with $noVariable variable
	// if(!isset($noNavbar)) { include $tpl . 'navbar.php'; }