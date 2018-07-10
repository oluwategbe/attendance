<?php

	session_start();
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
	$query ="SELECT  `no_of_adults`, `no_of_children`, `no_of_newcomers`, `total_attendance` FROM `attendance` WHERE id =  $id";
	$res = $connection->prepare($query);
	$res->execute();
	$count = $res->rowCount();
	if($count > 0)
		$result = $res->fetch();
	// print_r($result);


	if(isset($_POST['editattendance'])) {
			
		$no_of_adults = $_POST['no_of_adults'];
		$no_of_children = $_POST['no_of_children'];
		$no_of_newcomers = $_POST['no_of_newcomers'];
		$total = $_POST['total_attendance'];

		$sql = "UPDATE attendance SET no_of_adults = '$no_of_adults',  no_of_children = '$no_of_children',  no_of_newcomers = '$no_of_newcomers',  total_attendance = '$no_of_adults' + '$no_of_children' + '$no_of_newcomers'  WHERE id = '$id'";
		$res = $connection->prepare($sql);
		$res->execute();
		header('location: index.php');
	
	}
?>

<?php include ('header.php') ?>

<div class="row">
	<div class="offset-4">
		
	</div>
	<div class="col-4">
		<h1 class="text-center">Edit Attendance</h1><br/>
	<form class="form-signin" method= "POST" action="">
	<?php if (isset($errors)) { ?>
		<p><?php echo $errors; ?></p>
	<?php } ?>
		<div class="form-group">
				<label>Number of adult</label><br/>
				<input class="form-control" name="no_of_adults" type="text" value="<?php echo $result['no_of_adults'] ?>" autofocus	/><br/>
		</div>
		
		<div class="form-group">
				<label>Number of children</label><br/>
				<input class="form-control" name="no_of_children" type="text" value="<?php echo $result['no_of_children'] ?>"	/><br/>
		</div>

		<div class="form-group">
				<label>Number of newcomers</label><br/>
				<input class="form-control" name="no_of_newcomers" type="text" value="<?php echo $result['no_of_newcomers'] ?>" /><br/>
		</div>
		

		<div class="form-group">
				<input class="btn btn-info" name="editattendance" type="submit" value="Edit attendance"/>
		</div>

		<!-- <input name="editattendance" type="submit" value="Edit attendance"/><br/> -->
	</form>
</body>
</html>		



