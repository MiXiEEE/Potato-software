<?php
 
//register.php
error_reporting(0);

session_start();

require 'connect.php';
include 'function.php';

if(isset($_POST['save'])){

	$ŗegErrMessage = array();
	
	if(empty($_POST['username'])){
		$ŗegErrMessage[0] = "Username field is required!";
	}
	else
	{
		$username = test_input($_POST['username']);

		$sql = "SELECT COUNT(user_name) AS num FROM user WHERE user_name = :username";
    	$stmt = $pdo->prepare($sql);
    	$stmt->bindValue(':username', $username);
   	 	$stmt->execute();
   		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!preg_match("/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/", $username)){
			$ŗegErrMessage[0] = "Username contains invalid characters!";
		}

		elseif($row['num'] > 0){
			$ŗegErrMessage[0] = "Username already taken!";
		}
	}
	if($_POST['password1'] == "" || $_POST['password2'] == ""){
		$ŗegErrMessage[1] = "Password fields ar required!";
	}
	else
	{
		if($_POST['password1'] == $_POST['password2']){
			$password= test_input($_POST["password1"]); 
		}
		else{
			$ŗegErrMessage[1] = "Passwords must have to match to register successfully!";
		}
	}
	if(empty($_POST['email'])){
		$ŗegErrMessage[2] = "Email field is required!";
	}
	else{
		$email = test_input($_POST["email"]); 
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      	$ŗegErrMessage[2] = "Invalid email format"; 
		}
	}




	if(empty($ŗegErrMessage)){ 
   
    $sql = "INSERT INTO user (user_name, password, e_mail) VALUES (:username, :password, :email)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':email', $email);
 
    $result = $stmt->execute();
		if($result){
			$message = 'You have successfully registered.';

    		echo "<SCRIPT type='text/javascript'>
        	alert('$message');
        	window.location.replace(\"index.php\");
    		</SCRIPT>";
		}
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
	<?php
            if (!empty($ŗegErrMessage)) {
            	//print_r($_POST);
            	echo '<div class="alert alert-danger">';
            	foreach ($ŗegErrMessage as $error) {
            		echo '<strong>Error: </strong> ' . $error . '</br>';
            	}
                echo '</div>';
            }
    ?>
	<form class="form-horizontal" action = "register.php" method = "post" enctype="multipart/form-data">

		<fieldset>
	<div class="row">
		<div class="form-group">
	      	<label class="control-label col-md-2" for="username" >Username:</label>
	      <div class="col-md-9">          
	        <input type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" class="form-control" id="username" name="username" placeholder="Enter your username"></br>
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
	        <input type="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control" id="mail" name="email" placeholder="Enter e-mail"><br>
	      </div>
	    </div>
	</div>
	
	<div class="row">
		<div class="form-group"> 
			<div class="col-md-5 col-xs-1"></div>
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

</body>
</html>