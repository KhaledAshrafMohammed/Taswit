<?php
	
	/*
	** Title Function v1.0
	** Title function that echo the page title in case the page
	** Has the variable $pageTitle And echo default title for other pages
	*/

	function pageTitle() {

		include 'config.php';

		global $pageTitle;

		if (isset($pageTitle)) {

			echo $siteName . ' | ' . $pageTitle;
		} else {

			echo 'Default';
		}


	}

	/*
	**	Redirect Function v1.0
	** 	This Function Accept Parameters
	**	$errorMsg = Echo the error message
	**	$seconds = Seconds before redirect
	*/
	function redirectHome($theMsg,$url = 'index.php', $seconds = 2) {

		echo $theMsg;

		echo '<div class="alert alert-info">You Will Be Redirect After ' . $seconds . ' Seconds.</div>';
		header('refresh:' . $seconds . ';url=' . $url);
		exit();
	}

		/*
	**	CountItems Function v1.0
	**	Function to check item in database [ Function accept parameters ]
	**	$item = The item to select [ Example: user, item, category ]
	**	$table = The table to select from [ Example: users, items, categories]
	*/

	function countItems($item, $table) {

		global $con;

		$statement = $con->prepare("SELECT COUNT($item) FROM $table");

		$statement->execute();

		return $statement->fetchColumn();
	}

	/*
	**	CheckItem Function v1.0
	**	Function to check item in database [ Function accept parameters ]
	**	$select = The item to select [ Example: user, item, category ]
	**	$from = The table to select from [ Example: users, items, categories]
	**	$value = The value of select [ Example: khaled, box, electronics ]
	*/

	function checkItem($select, $from, $value, $additional = '') {

		global $con;

		$statement2 = $con->prepare("SELECT $select FROM $from WHERE $select = ? $additional");

		$statement2->execute(array($value));

		$count = $statement2->rowCount();

		return $count;
	}

	/*
	** Get Latest Records Function v1.0
	** Function To Get Latest items From DB [ Users, items, Comments]
	** $select = Field to select
	** $table = The table to choose from
	** $order = Field to orederd
	** $limit = Number oF Records to get
	*/

	function getLatest($select, $table,$order, $limit) {

		global $con;

		$getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

		$getStmt->execute();
		
		$rows = $getStmt->fetchAll();

		return $rows;
	}