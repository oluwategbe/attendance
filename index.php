<?php
session_start();
// print_r($_SESSION['attendance']);
include('connection.php');

// function getUserInfo($userid) {
// 	$query = "SELECT * FROM users WHERE id = '$userid'"
// 	$sql = $connection->prepare($query);
// 	$sql->execute();
// 	$userinfo = $sql->fetch();
// 	return $userinfo;
// }

// 2. Define your query (Define what you want to do with the database)
$query = "SELECT * FROM `attendance`";


// 3. Perform the query
// 1. prepare the query
$sql = $connection->prepare($query);
$sql->execute();

// 4. Handle data from query (Retrieve - showing/displaying information)
$count = $sql->rowCount();
if($count > 0) { // if data was present
	$result = $sql->fetchall();
}

?>

<?php include('header.php') ?>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Attendance</h1>
        <table class= "table table-bordered">
		<thead>
			<tr>
				<th>S/N</th>
				<th>User id</th>
				<th>No of adults</th>
				<th>No of children</th>
				<th>No of newcomers</th>
				<th>Total number</th>
				<th>Service Date</th>
				<th>Date</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$count = 0;
				foreach ($result as $attendance) {
					?>
					<tr>
						<td><?php echo ++$count; ?></td>
						<td><?php echo $attendance['user_id']; ?></td>
						<td><?php echo $attendance['no_of_adults']; ?></td>
						<td><?php echo $attendance['no_of_children']; ?></td>
						<td><?php echo $attendance['no_of_newcomers']; ?></td>
						<td><?php echo $attendance['total_attendance']; ?></td>
						<td><?php echo $attendance['service_date']; ?></td>
						<td><?php echo $attendance['date_created']; ?></td>
						<td><input class="btn btn-primary" name = "edit" type ="button" value = "EDIT" onclick="window.location.href='editattendance.php?id=<?php echo $attendance['id'] ?>'"></td>
						<td><a class="btn btn-danger" name = "delete" href ="deleteattendance.php?id=<?php echo $attendance['id'] ?>" onclick="return confirm('Are you sure you want to delete this attendance?')">DELETE</a></td>
					</tr>
					<?php
				}
			?>
		</tbody>
		</table>
      </div>

    </main><!-- /.container -->

<?php include('footer.php') ?>