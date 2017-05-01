<?php
include("function.php");
$test = new DB_movie();
if(isset($_SESSION['username'])){ 
    header("Location: movies.php");
}

if(isset($_POST["save"])){
	if($_POST['password1'] == $_POST['password2']){
		$username = mysqli_real_escape_string($test->getCon(), $_POST["username"]); 
		$email = mysqli_real_escape_string($test->getCon(), $_POST["email"]); 
		$password= md5(mysqli_real_escape_string($test->getCon(), $_POST["password1"])); 

		mysqli_query($test->getCon(), "INSERT INTO user (user_name, password, e_mail) VALUES ('$username', '$password', '$email');");
		$user_id= mysqli_insert_id($test->getCon());
		mysqli_query($test->getCon(), "INSERT INTO user_has_roles (user_id, roles_id) VALUES ('$user_id', 1);");

		header ("location: index.php");
		
	}
else {echo "Passwords must have to match to register successfully!";}
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
  		 <title>Register</title>
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
	  <h1 class="text-center well well-lg">Register to open a whole new world!</h1>

	<div class="container-fluid well well-lg">
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
			<div class="col-md-5 col-xs-1"></div>
			    <div class="button">
			      <button type="submit" class="btn btn-primary btn-md" name="save" id="send" onclick="alert('You have successfully registered!')">Register</button>
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

</body>
</html>