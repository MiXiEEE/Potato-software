<?php
include("function.php");
$test = new DB_movie();
session_start();
session_destroy();
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
  		 <title>Register</title>
	</head>

	<body>
		<style>
			body {
				background-image: url(img/admin_back.jpg);
				background-repeat: repeat-x;
			}
		</style>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid navbar-inner">
		    <div class="navbar-header">
		      <a href="index.php"><img class="logo img-responsive" type="image/png" src="img/potato_logo.png"></a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="#">Home</a></li>
		      <li><a href="index.php">Movies</a></li>
		      <li><a href="#">Genres</a></li>
		    </ul>
		    <form class="navbar-form navbar-left">
		      <div class="form-group">
		        <input type="text" class="form-control" placeholder="Search">
		      </div>
		      <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
		    </form>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    </ul>
		  </div>
		</nav>
		
<div class="container-fluid">
<div class="row">
<aside class="col-md-3"></aside>

<main>
<div class="col-md-6">
		<font color="white">
	  <h1 class="text-center">Login</h1>

	<div class="container-fluid">
		<form method = "post" action = "index.php">
		  <div class="form-group">
		    <label for="username">Email address:</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
		  </div>
		  <button type="submit" class="btn btn-primary" name="login">Submit</button>
		</form>
</div>
	</div>
</main>
<aside class="col-md-3"></aside>
</div>
</div>
	<?php
		if(isset($_POST["login"])){
			$username = mysqli_real_escape_string($test->getCon(),$_POST["username"]);
			$password = md5(mysqli_real_escape_string($test->getCon(),$_POST["password"]));
			$i = 0;
			$result = mysqli_query($test->getCon(), "SELECT user_name, password FROM user WHERE user_name = '$username' AND password = '$password'");
			while(mysqli_fetch_array($result)){
				$i++;
			}
			if($i == 0) {echo "Wrong username or password!";}
			if($i == 1) { 
				header("location:sakums.php");
				session_start();
				$_SESSION['user_name'] = $username;
			}
		}
	
	?>
	</div>
</body>
</html>