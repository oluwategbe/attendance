<?php

	// check SESSION[]
	if(!isset($_SESSION['attendance'])) {
		header ("location: login.php");
	}
// 1. Connect to database - mysql, mysqli, pdo

	// i. define database variables
	$host = "localhost";
	$dbname = "church";
	$username = "root";
	$password = "";

	// ii. connect to database
	try {
		$connection = "";
		$connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$connection->exec("set names utf8");
	} catch(PDOException $exception) {
		echo "Connection error: " . $exception->getMessage();
	}
?>