<?php

$message = "";
if(isset($_POST['submit'])) {
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

	// 2. Define your query (Define what you want to do with the database)
	// i, insert to database
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$date = date("Y-m-d H:i:s");
	
	
	$query = "SELECT * FROM `users` WHERE username = '$username' AND email = '$email' AND lastname = '$lastname'";


	$sql = $connection->prepare($query);
	$sql->execute();

	// 4. Handle data from query (Retrieve - showing/displaying information)
	$count = $sql->rowCount();
	if($count > 0) { // if data was selected
			$message = "<div class='alert alert-danger' role='alert'>
					 User already exists
				  </div>";
	}
	else {

		$query = "INSERT INTO users(firstname, lastname, username, email, password, date_created) 
		VALUES ('$firstname','$lastname','$username','$email','$password', '$date')";

		$sql = $connection->prepare($query);
		$sql->execute();

		// 4. Handle data from query (Retrieve - showing/displaying information)
		$insertcount = $sql->rowCount();
		if($insertcount > 0) {

			$message = "<div class='alert alert-success' role='alert'>
					 Sign up succesful
				  </div>";		  
		} else {
			$message = "<div class='alert alert-danger' role='alert'>
					 Problem Occurred
				  </div>";	
		}
	}


	
	// $query = "INSERT INTO users";
	// $query .= " (firstname, lastname, username, email, password, date_created)";
	// $query .= " VALUES(";
	// $query .= " '$firstname',";
	// $query .= " '$lastname',";
	// $query .= " '$username',";
	// $query .= " '$email',";
	// $query .= " '$password',";
	// $query .= " '$date'";
	// $query .= ")";

}



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Sign up</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet" >

    <!-- Custom styles for this template -->
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="">
      <img class="mb-4" src="images/lighthouse.jpg" alt="" width="72" height="72">

      <?php echo $message; ?>

      <h1 class="h3 mb-3 font-weight-normal">Please sign up here</h1>
      <label for="inputFirstName" class="sr-only">First name</label>
      <input type="text" name="firstname" id="inputFirstName" class="form-control" placeholder="First name" required autofocus>
     
      <label for="inputLastName" class="sr-only">Last name</label>
      <input type="text" name="lastname" id="inputLastName" class="form-control" placeholder="Last name" required>
      
      <label for="inputUserName" class="sr-only">User name</label>
      <input type="text" name="username" id="inputUserName" class="form-control" placeholder="User name" required>
      
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      
      <div class="checkbox mb-3">
       
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign up</button>
      <label>Already have an account?  </label>
		<!--anchor tag-->
	  <a href="login.php">Sign in</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
  </body>
</html> 	