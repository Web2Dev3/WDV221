<?php
$text= "";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $text= "File is an image - " . $check["mime"] . ". ";
    $uploadOk = 1;
  } else {
    $text= "File is not an image. ";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $text= "Sorry, file already exists. ";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $text= "Sorry, your file is too large. ";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $text= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $text= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $text= "Your file has been successfully uploaded. The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
     $text= "Sorry, there was an error uploading your file.";
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WDV321 Advanced Javascript Recipe Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="localObject.js"></script>

<link rel="stylesheet" type="text/css" href="css/recipe.css">

<link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">

</head>

<body>
<div class="container-fluid">
<div class="row">
<div class="col-lg-12" style="background-color:maroon;">
<nav class="navbar navbar-expand-md navbar-dark">
 

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
<a class="navbar-brand" href="#">
	Recipe Manager
	</a>
  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="recipe.html">Our Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="recipeInput.php">Upload A Recipe</a>
      </li>
    </ul>
  </div> 
</nav>
</div>
<div class="col-lg-12" style="background-image: url(background.jpg);height:50vh;min-height:20px; background-size:cover;background-repeat: no-repeat;"></div>  
<div class="col-lg-12">
<p style="text-align: center;">You can view your completed recipe on the <a style="color: maroon; font-weight: bold;" href="recipe.html">Our Recipes</a> page.</p>
<br>
<form action="recipeInput.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
  <input type="submit" id="submit" value="Upload Image" name="submit">
  <span style="font-weight: bold; color: maroon; font-size: 1.1em;"><?php echo $text; ?></span>
</form>
<br>
</div>

<div class="col-lg-4">
<form id="myForm">
<label for="title">Recipe name:</label><br>
  <input type="text" id="title" name="title" placeholder="ex. Cheeseburger"><br>
  <label for="image">Recipe Image URL:</label><br>
  <input type="text" id="image" name="image" placeholder="ex. myPhoto.jpg"><br>
<label for="cook">Cook Time:</label><br>
  <input type="text" id="cook" name="cook" placeholder="ex. 30 minutes"><br>
<label for="prep">Prep Time:</label><br>
  <input type="text" id="prep" name="prep" placeholder="ex. 20 minutes"><br>
<label for="difficulty">Difficulty Level:</label><br>
  <input type="text" id="difficulty" name="difficulty" placeholder="ex. Easy"><br>
  <label for="servings">Servings:</label><br>
  <input type="number" id="servings" name="servings" min="1" max="100" placeholder="ex. 10"><br><br> 
  
   <button id="btn1">Click to Add Recipe</button>
   <p id="display"></p>
   </form>
</div>
 
<div class="col-lg-4">   
 <form id="form2">
   <label for="quantity">Quantity:</label><br>
  <input type="number" id="quantity" name="quantity" min="1" max="100" placeholder="ex. 10"><br>
   <label for="ingredients">Recipe Ingredients</label><br>
   <input type="text" name="ingredients" id="ingredients" placeholder="ex. cup(s) flour"><br><br>  
  <button id="btn2">Click to Add Ingredient</button>
     <p id="display2"></p>
  </form>
  </div>
  
 <div class="col-lg-4"> 
  <form id="form3">
  <label for="directions">Directions</label><br>
   <input type="text" name="directions" id="directions"><br><br>

  <button id="btn3">Click to Add Direction</button>
     <p id="display3"></p>
  
</form>
</div>
<div class="col-sm-12" style="color:white; background-color: maroon;">
<p style="color:white;">©Copyright 2020 Recipe Manager. All rights reserved.
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-instagram"></a>
</p>
</div>  
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>