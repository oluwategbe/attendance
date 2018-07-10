<?php
$errors = "";
	
	$host = "localhost";
	$dbname = "church";
	$username = "root";
	$password = "";

	try {
		$connection = "";
		$connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$connection->exec("set names utf8");
	} catch(PDOException $exception) {
		echo "Connection error: " . $exception->getMessage();
	}

	$id = $_GET['id'];
	$sql = "DELETE FROM attendance WHERE id = '$id'";
	$res = $connection->prepare($sql);
	$res->execute();
	header('location: index.php');


?>