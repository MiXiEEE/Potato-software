<?php
include("function.php");
$test = new DB_movie();
session_start();
if(isset($_SESSION['username'])){ 
    header("Location: movies.php");
}

$msg = "Enter username and password!";

if(isset($_POST["login"])){

	$myusername = mysqli_real_escape_string($test->getCon(), $_POST["username"]);
	$mypassword = md5(mysqli_real_escape_string($test->getCon(), $_POST["password"]));
	$i = 0;
	$sql = "SELECT user_name, password FROM user WHERE user_name = '$myusername' AND password = '$mypassword'";
	$result = mysqli_query($test->getCon(), $sql);

	//UserID iegūšana
	$sql = "SELECT id FROM user WHERE user_name = '$myusername' AND password = '$mypassword'";
	$getUserID = mysqli_query($test->getCon(), $sql);
	while($row = mysqli_fetch_assoc($getUserID)){
		$userID = $row['id'];
	}
	

	//Lomas ID iegūšana
	$sql = "SELECT roles_id FROM user_has_roles as r INNER JOIN user as u ON u.id = r.user_id WHERE r.user_id = '$userID'";
	$getRoleID = mysqli_query($test->getCon(), $sql);
		while($row = mysqli_fetch_assoc($getRoleID)){
		$roleID = $row['roles_id'];
	}

	while(mysqli_fetch_array($result)){
		$i++;
	}
	if($i == 0) {$msg = "Wrong USERNAME or PASSWORD!";}
	if($i == 1) { 
	header("location: movies.php");
	session_start();
	$_SESSION['username'] = $myusername;
	$_SESSION['role'] = $roleID;
	}

}
	?>
<html lang="en">
	<head>
		 <link rel="stylesheet" type="text/css" href="css/stylesheets.css">
 		 <script src="/js/javascript.js" charset="utf-8" async defer></script>
   		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  		 <link rel="icon" type="image/png" href="favicon.png" />
  		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		 <title>Login</title>
	</head>

	<body>
		<style>
			body {
				background-image: url(img/background.jpg);
				background-repeat: repeat-x;
			}

		</style>
		
<div class="container">
<div class="row">
<aside class="col-md-3"></aside>

<main>
<div class="col-md-6">

	  <h1 class="text-center well well-lg">Welcome to the most secret movie website <b>ever</b>!</h1>

	<div class="container-fluid well well-lg">
		<form method = "post" action = "">
		  <div class="form-group">
		    <label for="username">Email address:</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
		  </div>

		  	<div class="btn-group btn-group-justified" role="group" aria-label="...">
			  <div class="btn-group" role="group">
			    <button type="submit" class="btn btn-primary" name="login">Login</button>
			  </div>
			</div>
			
		</form>
		<p class="text-center"><b><?php echo $msg ?></b></p>
	</div>

	<h1 class="text-center well well-lg">To join us click below!</h1>

	<div class="btn-group btn-group-justified" role="group" aria-label="...">

	  <div class="btn-group" role="group">
	    <a href="register.php"><button type="button" class="btn btn-success">Register</button></a>
	  </div>

	</div>
</div>
</main>
<aside class="col-md-3"></aside>
</div>
</div>

</body>
</html>