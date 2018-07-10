<?php
session_start();
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

$message = "";
if(isset($_POST['login'])) {
	

	// 2. Define your query (Define what you want to do with the database)
	// i, insert to database
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
	

	// 3. Perform the query
	// 1. prepare the query
	$sql = $connection->prepare($query);
	$sql->execute();

	// 4. Handle data from query (Retrieve - showing/displaying information)
	$count = $sql->rowCount();
	if($count > 0) { // if data was present
		echo "you have logged in successfully";
		//fetch users info
		$result = $sql->fetch();

		// save in a session
		$_SESSION['attendance'] = $result;

		//redirect to main.php
		header("location: index.php"); // redirect to main
	} else {
		$message = "<div class='alert alert-danger' role='alert'>
					  Incorrect Login Details
				  </div>";
	}
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

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet" >

    <!-- Custom styles for this template -->
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="">
      <img class="mb-4" src="images/lighthouse.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <?php echo $message; ?>

      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>


      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
     
           <button class="mt-3 btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>

      <label>Dont have an account?  </label>
		<!--anchor tag-->
	  <a href="signup.php">Sign up</a>

      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
  </body>
</html>