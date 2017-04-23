<?php
include("function.php");
$test = new DB_movie();
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
  		 <title>Administrator dashboard</title>
</head>
<body>

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
  <div class="col-sm-3 col-md-2 sidebar">
    <nav class="nav-sidebar">
    <ul class="nav tabs">
          <li class="active"><a href="#tab1" data-toggle="tab">Administator panel</a></li>
          <li class=""><a href="#tab2" data-toggle="tab">All user data</a></li>
          <li class=""><a href="#tab3" data-toggle="tab">Users</a></li>
          <li class=""><a href="#tab4" data-toggle="tab">Movies</a></li>
          <li class=""><a href="#tab5" data-toggle="tab">Categories</a></li> 
          <li class=""><a href="#tab6" data-toggle="tab">Comments</a></li>
          <li class=""><a href="#tab7" data-toggle="tab">All movie data</a></li>  
          <li class=""><a href="#tab8" data-toggle="tab">All category data</a></li>
          <li class=""><a href="#tab9" data-toggle="tab">All comment data</a></li>                                    
    </ul>
  </nav>
</div>

<div class="tab-content col-md-10 main">
<div class="tab-pane active text-style" id="tab1">
  <h2>Administrator dashboard</h2>
  <p>Easy to use administrator dashboard!</p>  
</div>

<div class="tab-pane text-style" id="tab2">
  <h2>User data</h2>
  <?php $test->showAllUsers(); ?>   
</div>

<div class="tab-pane text-style" id="tab3">
  <h2>Users</h2>
   <form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="userid">Delete user by ID:</label>
          <input type="number" class="form-control" id="userid" name="userID" placeholder="Enter ID...">
          <br>
          <button type="submit" class="btn btn-danger" name="userIDSend" onclick="alert('User is deleted!')">Delete user</button>
        </div>
      </div>
    </form>

    <?php
    if(isset($_POST["userIDSend"])){
        $userID = mysqli_real_escape_string($test->getCon(), $_POST["userID"]); 

        $test->deleteUser($userID);
    }
    ?>

    <form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="USERId">Edit user by ID:</label>
          <input type="number" class="form-control" id="USERId" name="editUserID" placeholder="User ID...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="userN">Enter new username:</label>
          <input type="text" class="form-control" id="userN" name="editUserName" placeholder="Username...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="userP">Enter new password:</label>
          <input type="text" class="form-control" id="userP" name="editUserPass" placeholder="Password...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="userE">Enter new e-mail:</label>
          <input type="email" class="form-control" id="userE" name="editUserMail" placeholder="E-mail...">
          <br>
          <button type="submit" class="btn btn-success" name="userInput" onclick="alert('User is edited!')">Edit user</button>
        </div>
      </div>

    
    </form>

    <?php
    if(isset($_POST["userInput"])){
        $userID = mysqli_real_escape_string($test->getCon(), $_POST["editUserID"]); 
        $UserName = mysqli_real_escape_string($test->getCon(), $_POST["editUserName"]); 
        $UserPass = md5(mysqli_real_escape_string($test->getCon(), $_POST["editUserPass"])); 
        $UserMail = mysqli_real_escape_string($test->getCon(), $_POST["editUserMail"]); 
        $test->editUser($userID, $UserName, $UserPass, $UserMail);
    }
    ?>
</div>

<div class="tab-pane text-style" id="tab4">
  <h2>Movies</h2>
  <form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="movieTitle">Enter movie title:</label>
          <input type="text" class="form-control" id="movieTitle" name="movieTITLE" placeholder="Movie title...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="desc">Description:</label>
          <textarea class="form-control" rows="5" id="desc" name="movieDESC" placeholder="Enter description..."></textarea>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="movieDate">Enter movie release date:</label>
          <input type="date" class="form-control" id="movieDate" name="movieDATE" placeholder="Movie date...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="movieDirector">Enter movie director:</label>
          <input type="text" class="form-control" id="movieDirector" name="movieDIRECTOR" placeholder="Movie director...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="actors">Actors:</label>
          <textarea class="form-control" rows="5" id="actors" name="movieACTORS" placeholder="Movie actors..."></textarea>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="categoryId">Enter category by ID:</label>
          <input type="number" class="form-control" id="categoryId" name="movieCatID" placeholder="Category ID...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="mUser">Enter user by ID:</label>
          <input type="number" class="form-control" id="mUser" name="movieUser" placeholder="User ID...">
          <br>
          <button type="submit" class="btn btn-success" name="movieInput" onclick="alert('Movie is added!')">Add movie</button>
        </div>
      </div>      
    </form>

    <?php
    if(isset($_POST["movieInput"])){
        $title = mysqli_real_escape_string($test->getCon(), $_POST["movieTITLE"]); 
        $movieDesc = mysqli_real_escape_string($test->getCon(), $_POST["movieDESC"]); 
        $movieDate = mysqli_real_escape_string($test->getCon(), $_POST["movieDATE"]); 
        $movieDirector = mysqli_real_escape_string($test->getCon(), $_POST["movieDIRECTOR"]); 
        $movieActors = mysqli_real_escape_string($test->getCon(), $_POST["movieACTORS"]); 
        $movieCat = mysqli_real_escape_string($test->getCon(), $_POST["movieCatID"]); 
        $userAdded = mysqli_real_escape_string($test->getCon(), $_POST["movieUser"]); 
        $test->addMovie($title, $movieDesc, $movieDate, $movieDirector, $movieActors, $userAdded, $movieCat);
    }
    ?>

    <form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="movieid">Delete movie by ID:</label>
          <input type="number" class="form-control" id="movieid" name="MovieID" placeholder="Enter ID...">
          <br>
          <button type="submit" class="btn btn-danger" name="MovieIDSend" onclick="alert('Movie is deleted!')">Delete movie</button>
        </div>
      </div>
    </form>

    <?php
    if(isset($_POST["MovieIDSend"])){
        $MovieID = mysqli_real_escape_string($test->getCon(), $_POST["MovieID"]); 

        $test->deleteMovie($MovieID);
    }
    ?>
</div>

<div class="tab-pane text-style" id="tab5">
  <h2>Categories</h2>

   <form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="catName">Insert new category:</label>
          <input type="text" class="form-control" id="catName" name="catNAME" placeholder="Category name...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="desc">Description:</label>
          <textarea class="form-control" rows="5" id="desc" name="catDESC" placeholder="Enter description..."></textarea>
          <br>
          <button type="submit" class="btn btn-primary" name="catNameSend" onclick="alert('Category is inserted!')">Insert category</button>
        </div>
      </div>

    </form>

    <?php
    if(isset($_POST["catNameSend"])){
        $catNAME = mysqli_real_escape_string($test->getCon(), $_POST["catNAME"]); 
        $catDESC = mysqli_real_escape_string($test->getCon(), $_POST["catDESC"]); 
        $test->insertCategory($catNAME, $catDESC);
    }
    ?>

   <form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="catName">Edit category by ID:</label>
          <input type="number" class="form-control" id="catID" name="cat_Id" placeholder="Category ID...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="catName">Edit category name:</label>
          <input type="text" class="form-control" id="catName" name="cat_Name" placeholder="Category name...">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="desc">Description:</label>
          <textarea class="form-control" rows="5" id="desc" name="cat_Desc" placeholder="Enter description..."></textarea>
          <br>
          <button type="submit" class="btn btn-success" name="catEditSend" onclick="alert('Category is edited!')">Edit category</button>
        </div>
      </div>
    </form>

    <?php
    if(isset($_POST["catEditSend"])){
        $categoryId = mysqli_real_escape_string($test->getCon(), $_POST["cat_Id"]); 
        $categoryName = mysqli_real_escape_string($test->getCon(), $_POST["cat_Name"]); 
        $categoryText = mysqli_real_escape_string($test->getCon(), $_POST["cat_Desc"]); 
        $test->editCategory($categoryId, $categoryName, $categoryText);
    }
    ?>

   <form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="catid">Delete category by ID:</label>
          <input type="number" class="form-control" id="catid" name="catID" placeholder="Enter ID...">
          <br>
          <button type="submit" class="btn btn-danger" name="catIDSend" onclick="alert('Category is deleted!')">Delete catgory</button>
        </div>
      </div>
    </form>

    <?php
    if(isset($_POST["catIDSend"])){
      if(isset($_POST["catID"])){
        $catID = mysqli_real_escape_string($test->getCon(), $_POST["catID"]); 

        $test->deleteCategory($catID);
      }
    }
    ?>

</div>

<div class="tab-pane text-style" id="tab6">
  <h2>Comments</h2>
  
<form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="desc">Description:</label>
          <textarea class="form-control" rows="5" id="desc" name="commentInput" placeholder="Enter description..."></textarea>
          <br>
          <button type="submit" class="btn btn-primary" name="commentDescSend" onclick="alert('Comment is inserted!')">Insert comment</button>
        </div>
      </div>

    </form>

    <?php
    if(isset($_POST["commentDescSend"])){
        $commentText = mysqli_real_escape_string($test->getCon(), $_POST["commentInput"]); 
        $test->addComment($commentText);
    }
    ?>

   <form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="comid">Edit comment by ID:</label>
          <input type="number" class="form-control" id="comid" name="comID" placeholder="Comment ID...">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-4">
          <label for="desc">Description:</label>
          <textarea class="form-control" rows="5" id="desc" name="commentText" placeholder="Enter description..."></textarea>
          <br>
          <button type="submit" class="btn btn-success" name="comEditSend" onclick="alert('Comment is edited!')">Edit comment</button>
        </div>
      </div>

    </form>

    <?php
    if(isset($_POST["comEditSend"])){
      if (isset($_POST["comID"]) && isset($_POST["commentText"])){
        $comID = mysqli_real_escape_string($test->getCon(), $_POST["comID"]); 
        $commentTEXT = mysqli_real_escape_string($test->getCon(), $_POST["commentText"]); 
        $test->editComment($comID, $commentTEXT);
      }
    }
    ?>

   <form method = "post" action = "admin.php">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="comid">Delete comment by ID:</label>
          <input type="number" class="form-control" id="comid" name="comID" placeholder="Enter ID...">
          <br>
          <button type="submit" class="btn btn-danger" name="comIDSend" onclick="alert('Comment is deleted!')">Delete comment</button>
        </div>
      </div>
    </form>

    <?php
    if(isset($_POST["comIDSend"])){
        $comID = mysqli_real_escape_string($test->getCon(), $_POST["comID"]); 
        $test->deleteComment($comID);
    }
    ?>

</div>
<div class="tab-pane text-style" id="tab7">
  <h2>Movie data</h2>
  <?php $test->showAllMovies(); ?>   
</div>
<div class="tab-pane text-style" id="tab8">
  <h2>Category data</h2>
  <?php $test->showAllCategories(); ?>   
</div>
<div class="tab-pane text-style" id="tab9">
  <h2>Comment data</h2>
  <?php $test->showAllComments(); ?>   
</div>


</div>
      
</div>
</body>
</html>