<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

// Initialize messaging for login status to neutral (not logged in because no attempt to log in)
$loginStatus = "Please log in";

// If form submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get username and password from the form as variables
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Query records that have usernames and passwords that match those in the customers table
	$sql = file_get_contents('sql/attemptLogin.sql');
	$params = array(
		'users_username' => $username,
		'users_password' => $password
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	// If $users is not empty
	if(!empty($users)) {
		// Set $user equal to the first result of $users
		$user = $users[0];

		// Set a session variable with a key of customerID equal to the customerID returned
		$_SESSION['userID'] = $user['user_id'];

		// Change status of login messaging to success, but they're redirected in next line so won't see this. Still nice to have for future reference
		$loginStatus = "Login successful";

		// Redirect to the index.php file
		header('location: management.php');
	}
	else {
		// Change status of login messaging to fail
		$loginStatus = "Incorrect credentials";
	}
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">

  	<title>Login</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->

    <title>Insert Text Area</title>
    <!-- Bootstrap core CSS -->
    <link href='vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Custom fonts for this template -->
    <link href='https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i' rel='stylesheet'>
    <link href='vendor/fontawesome-free/css/all.min.css' rel='stylesheet'>

    <!-- Custom styles for this template -->
    <link href='css/style.css' rel='stylesheet'>
    <!-- ajax library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="page">
		<h1>Login</h1>
		<form method="POST">
			<input type="text" name="username" placeholder="Username" />
			<input type="password" name="password" placeholder="Password" />
			<input type="submit" value="Log In" />
		</form>
		<br>
		<div>(<?php echo $loginStatus ?>... I'll let you know of any problems logging in)<div>
	</div>
</body>
</html>
