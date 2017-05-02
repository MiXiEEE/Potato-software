<?php

class DB_movie{
	protected $server = "localhost";
	protected $dbuser = "root";
	protected $dbpw = "";
	protected $db = "movies";
	protected $con;
	
	function __construct() {
    	$this->con = new mysqli($this->server,$this->dbuser,$this->dbpw, $this->db);
    	$this->con->set_charset("utf8");
   }
   
   function getCon(){
   		return $this->con;
   }

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

	function deleteUser($userID){
		$sql = "DELETE FROM user WHERE id = '{$userID}'";
		$result=$this->con->query($sql);		
	}

	function editUser($userID, $username, $password, $email){
		$sql = "UPDATE user SET user_name = '{$username}', password = '{$password}', e_mail = '{$email}' WHERE id = '{$userID}'";
		$result=$this->con->query($sql);
	}

	function showAllUsers(){
		$sql = "SELECT * FROM user";
		$result=$this->con->query($sql);
		
		if ($result->num_rows > 0) {
    	echo "<div class='table-responsive'><table class='table'><thead><tr><th>ID</th><th>Username</th><th>Password</th><th>E-mail</th></tr></thead><tbody>";
		    while($row = $result->fetch_assoc()) {
		        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["user_name"]. "</td><td>" . $row["password"]. "</td><td>" . $row["e_mail"] . "</td></tr>";
		    }
		    echo "</tbody></table></div>";
		} 
		else {
	    echo "No data";
		}	
	}

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

	function addMovie($title, $desc, $year, $director, $actors, $userID, $gendersID){
		$sql = "INSERT INTO movies(title, description, year, director, actors, user_id, genders_id) VALUES('{$title}', '{$desc}', '{$year}', '{$director}', '{$actors}', '{$userID}', '{$gendersID}')";
		$result=$this->con->query($sql);
	}

	function deleteMovie($movieID){
		$sql = "DELETE FROM movies WHERE id = '{$movieID}'";
		$result=$this->con->query($sql);		
	}
   	
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

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>