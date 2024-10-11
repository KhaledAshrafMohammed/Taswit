<?php

	// Main Settings
	$siteName = 'Taswit';
	$defaultUpdates = '10'; // Number For latest Comments in Dashboard Page

	// Website Setting
	// Error reporting
	ini_set('display_errors', 'On'); // make it off to hidden errors
	error_reporting(E_ALL);


	// DB Settings and connect
	$dsn = 'mysql:host=localhost;dbname=taswit'; 
	$user = 'root';
	$pass = '';
	$option = array(

		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

		);

	try {

		$con = new PDO($dsn, $user, $pass, $option);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {

		echo 'failed to connect ' . $e->getmessage();
	}

	// class DatabaseService{

	// 	private $db_host = "localhost";
	// 	private $db_name = "taswit";
	// 	private $db_user = "root";
	// 	private $db_password = "";
	// 	private $connection;
	
	// 	public function getConnection(){
	
	// 		$this->connection = null;
	
	// 		try{
	// 			$this->connection = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
			
	// 		}catch(PDOException $exception){
	// 			echo "Connection failed: " . $exception->getMessage();
	// 		}
	
	// 		return $this->connection;
	// 	}
	// }