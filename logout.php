<?php
	session_start();

	if(isset($_SESSION['attendance'])) {
		session_destroy();
		header ("location: login.php");
	}
?>