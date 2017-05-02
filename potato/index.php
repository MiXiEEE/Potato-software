<?php
error_reporting(0);
require 'connect.php';
include 'function.php';
session_start();

		if(isset($_POST["login"])){

			$myusername = test_input($_POST["username"]);
			$mypassword = test_input($_POST["password"]);

            $sql = "SELECT COUNT(user_name) AS num FROM user WHERE user_name = :username AND password = :password";;
            $stmt = $pdo->prepare($sql);
    
            $stmt->bindValue(':username', $myusername);
            $stmt->bindValue(':password', $mypassword);
            
 
            $result = $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			
            if($row['num'] > 0){
                header("location: movies.php");
                session_start();
                $_SESSION['username'] = $myusername;
            }
			
			else {echo "Nepareizs lietotājvārds vai parole";}
			

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