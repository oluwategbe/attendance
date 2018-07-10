<?php
session_start();
include('connection.php');
if(isset($_POST['addAttendance'])) {
	
// 1. Connect to database - mysql, mysqli, pdo
	// 2. Define your query (Define what you want to do with the database)
	// i, insert to database
	// $user = $_SESSION['attendance'];
	// $user_id = $user['id'];
	$user_id = $_SESSION['attendance']['id'];
	$no_of_adults = $_POST['no_of_adults'];
	$no_of_children = $_POST['no_of_children'];
	$no_of_newcomers = $_POST['no_of_newcomers'];
	$total = $no_of_adults + $no_of_children + $no_of_newcomers;
	$service_date = $_POST['service_date'];
	$date = date("Y-m-d H:i:s");

	$query = "INSERT INTO `attendance`(`user_id`,`no_of_adults`, `no_of_children`, `no_of_newcomers`, `total_attendance`, `service_date`, `date_created`) VALUES ('$user_id','$no_of_adults','$no_of_children','$no_of_newcomers', '$total', '$service_date','$date')";
	

	// 3. Perform the query
	// 1. prepare the query
	$sql = $connection->prepare($query);
	$sql->execute();

	// 4. Handle data from query (Retrieve - showing/displaying information)
	$count = $sql->rowCount();
	if($count > 0) { // if data was inserted
		echo "you have added attendance successfully";
	} else {
		echo "There was a problem with the attendance addition";
	}
}
?>


<?php include('header.php') ?>
<div class="row">
	<div class="offset-4">
		
	</div>
	<div class="col-4">
		<h1 class="text-center">Add Attendance</h1><br/>
		<!--form tag-->
		<form class="form-signin" method= "POST" action="">
			<div class="form-group">
				<label>Number of adult</label><br/>
				<input class="form-control" name="no_of_adults" type="text"	/>
			</div>
			
			<div class="form-group">
				<label>Number of children</label><br/>
			<input class="form-control" name="no_of_children" type="text"/>
			</div>
			

			<div class="form-group">
				<label>Number of newcomers/visitors</label>
			<input class="form-control" name="no_of_newcomers" type="text"/>

			</div>
			
			<div class="form-group">
				<label>Service Date</label><br/>
			<input class="form-control" name="service_date" type="date"/>
			</div>
			

			<div class="form-group">
				<input class="btn btn-info" name="addAttendance" type="submit" value="Submit"/>
			</div>
			
		</form>
		<div class="text-center">
			<label>Go to main page?  </label>
			<!--anchor tag-->
			<a href="index.php">Main page</a>
		</div>
	</div>
</div>

	

<?php include('footer.php') ?>