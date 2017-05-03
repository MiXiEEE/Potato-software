<?php
require 'connect.php';

/*
function deleteCategory($categoryID){
	$sql = "DELETE FROM genders WHERE id='{$categoryID}'";
	$result=$this->con->query($sql);
}

function editCategory($categoryID, $categoryNewName, $categorydesc){
	$sql = "UPDATE genders set tag = '{$categoryNewName}', description = '{$categorydesc}' WHERE  id='{$categoryID}'";
	$result=$this->con->query($sql);
}

function insertCategory($categoryNew, $categorydesc){
	$sql = "INSERT INTO genders(tag, description) VALUES('{$categoryNew}', '{$categorydesc}')";
	$result=$this->con->query($sql);		
}
*/
function deleteUser($userID){
	global $pdo;
	$sql = "DELETE FROM user WHERE id = :user_id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':user_id', $userID);
	$stmt->execute();

	$message = 'User deleted.';
	echo "<SCRIPT type='text/javascript'>
	alert('$message');
	window.location.replace(\"admin.php\");
	</SCRIPT>";	
}

function editUser($userID, $username, $password, $email){
	global $pdo;
	$sql = "UPDATE user SET user_name = :username, password = :password, e_mail = :email' WHERE id = :user_id";
	$stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':user_id', $userID);
    $stmt->execute();

	$message = 'User updated.';
	echo "<SCRIPT type='text/javascript'>
	alert('$message');
	</SCRIPT>";
	
}

function showAllUsers(){
	global $pdo;
	$sql = "SELECT * FROM user";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll( PDO::FETCH_ASSOC );
	if (!empty($results)) {

	echo "<div class='table-responsive'><table class='table'><thead><tr><th>ID</th><th>Username</th><th>Password</th><th>E-mail</th></tr></thead><tbody>";
	    foreach( $results as $row ) {
	        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["user_name"]. "</td><td>" . $row["password"]. "</td><td>" . $row["e_mail"] . "</td></tr>";
	    }
	    echo "</tbody></table></div>";
	} 
	else {
    echo "No data";
	}	
}
/*
function showAllMovies(){
	$sql = "SELECT id, title, description, year FROM movies";
	$result=$this->con->query($sql);
	
	if ($result->num_rows > 0) {
	echo "<div class='table-responsive'><table class='table'><thead><tr><th>ID</th><th>Title</th><th>Description</th><th>Release date</th></tr></thead><tbody>";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["year"] . "</td></tr>";
	    }
	    echo "</tbody></table></div>";
	} 
	else {
    echo "No data";
	}	
}

function showAllCategories(){
	$sql = "SELECT * FROM genders";
	$result=$this->con->query($sql);
	
	if ($result->num_rows > 0) {
	echo "<div class='table-responsive'><table class='table'><thead><tr><th>ID</th><th>Name</th><th>Description</th></tr></thead><tbody>";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["tag"]. "</td><td>" . $row["description"]. "</td></tr>";
	    }
	    echo "</tbody></table></div>";
	} 
	else {
    echo "No data";
	}	
}

function showAllComments(){
	$sql = "SELECT * FROM comments";
	$result=$this->con->query($sql);
	
	if ($result->num_rows > 0) {
	echo "<div class='table-responsive'><table class='table'><thead><tr><th>ID</th><th>Comment</th></tr></thead><tbody>";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["content"]. "</td></tr>";
	    }
	    echo "</tbody></table></div>";
	} 
	else {
    echo "No data";
	}	
}
*/
function addMovie($title, $descr, $year, $director, $actors, $userID, $gendersID){
	global $pdo;
	$sql = "INSERT INTO movies(title, description, year, director, actors, user_id, genders_id) VALUES(:title, :descr, :year, :director, :actors, :userID, :gendersID)";
	$stmt = $pdo->prepare($sql);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':descr', $descr);
    $stmt->bindValue(':year', $year);
    $stmt->bindValue(':director', $director);
    $stmt->bindValue(':actors', $actors);
    $stmt->bindValue(':userID', $userID);
    $stmt->bindValue(':gendersID', $gendersID);
    $stmt->execute();

    $message = 'Movie added.';
	echo "<SCRIPT type='text/javascript'>
	alert('$message');
	</SCRIPT>";
}

function deleteMovie($movieID){
	global $pdo;
	$sql = "DELETE FROM movies WHERE id = :movieID";
	$stmt = $pdo->prepare($sql);
    $stmt->bindValue(':movieID', $movieID);
    $stmt->execute();	

    $message = 'Movie Deleted.';
	echo "<SCRIPT type='text/javascript'>
	alert('$message');
	</SCRIPT>";	
}
/*	
	function addComment($text){
		$sql = "INSERT INTO comments(content) VALUES('{$text}')";
	$result=$this->con->query($sql);
	}

	function editComment($commentID, $text){
		$sql = "UPDATE comments set content = '{$text}' WHERE  id='{$commentID}'";
	$result=$this->con->query($sql);
	}

function deleteComment($commentID){
	$sql = "DELETE FROM comments WHERE id = '{$commentID}'";
	$result=$this->con->query($sql);		
}

*/
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data, ENT_QUOTES);
return $data;
}

function e($data){
	return htmlspecialchars($data, ENT_QUOTES, 'UFT-8');
}

?>