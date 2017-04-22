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
	  <h1 class="text-center">Register to open a whole new world!</h1>

	<div class="container-fluid">
	<form class="form-horizontal" action = "register.php" method = "post" enctype="multipart/form-data">

		<fieldset>
	<div class="row">
		<div class="form-group">
	      	<label class="control-label col-md-2" for="username" >Username:</label>
	      <div class="col-md-9">          
	        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username"></br>
	      </div>
	    </div>
	</div>
	
	<div class="row">
		<div class="form-group">
	      	<label class="control-label col-md-2" for="password1">Password:</label>
	      <div class="col-md-9">          
	        <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter your password"><br>
	      </div>
	    </div>
	</div>

	<div class="row">
		<div class="form-group">
	      	<label class="control-label col-md-2" for="password2">Repeat password:</label>
	      <div class="col-md-9">          
	        <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat password"><br>
	      </div>
	    </div>
	</div>
	
	
	<div class="row">
	   	<div class="form-group">
	      	<label class="control-label col-md-2" for="mail">E-mail:</label>
	      <div class="col-md-9">          
	        <input type="email" class="form-control" id="mail" name="email" placeholder="Enter e-mail"><br>
	      </div>
	    </div>
	</div>
	
	<div class="row">
		<div class="form-group"> 
			<div class="col-md-6 col-xs-1"></div>
			    <div class="button">
			      <button type="submit" class="btn btn-primary btn-md" name="save" id="send">Register</button>
			    </div>
  		</div>
	</div>

		</fieldset>

	</form>
	</div>
	</div>
</main>
<aside class="col-md-3"></aside>
</div>
</div>
	<div class="text-center">
	<?php
		if(isset($_POST["save"])){
			if($_POST['password1'] == $_POST['password2']){
				$username = mysqli_real_escape_string($test->getCon(), $_POST["username"]); 
				$email = mysqli_real_escape_string($test->getCon(), $_POST["email"]); 
				$password= md5(mysqli_real_escape_string($test->getCon(), $_POST["password1"])); 

				mysqli_query($test->getCon(), "INSERT INTO user (user_name, password, e_mail)
				VALUES ('$username', '$password', '$email')");
				
			}
		else {echo "Passwords must have to match to register successfully!";}
		}
	
	?>
	</div>
		
	</font>
</body>
</html>