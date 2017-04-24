<?php 
include("function.php");
session_start();
if(!isset($_SESSION['username'])){ 
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		 <link rel="stylesheet" type="text/css" href="css/stylesheets.css">
 		 <script src="/js/javascript.js" charset="utf-8" async defer></script>
   		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  		 <link rel="icon" type="image/png" href="favicon.png" />
  		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		 <title>Sakums</title>
	</head>

	<body>
		<style>
			body {
				background-image: url(img/background.jpg);
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
		      <li><a href="movies.php">Movies</a></li>
		      <li><a href="#">Genres</a></li>
		    </ul>
		    <form class="navbar-form navbar-left">
		      <div class="form-group">
		        <input type="text" class="form-control" placeholder="Search">
		      </div>
		      <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
		    </form>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']?> profile</a></li>
		      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		    </ul>
		  </div>
		</nav>

		<div class="container">
		  <div class="jumbotron">
		    <h1>Welcome back, <b><?php echo $_SESSION['username']?></b>!</h1> 
		    <p>It is a nice day to check out some movies!</p> 
		  </div>
		</div>
	</body>
</html>