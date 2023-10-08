<!-- <?php
// require('configure.php');
// echo "SERVER 489BC1 RUNNING";

// $sql = "INSERT INTO categories (title,description, pic1, pic2, pic3, pic4,article) VALUES('123', '123', '123', '123', '123', '123', '123');";

// 					if(mysqli_query($conn, $sql)) {
// 						echo "<script>alert(\"Category added zvakanaka\")</script>";
// 					}else{
// 						echo "FAILED".mysqli_error($conn);
// 					}
?> -->


<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="YVOT site" name="description">

	 <!-- Favicons -->
  <link href="icon.ico" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:300,400,700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

	<title>Young Voices of Talent | Admin Dashboard</title>
</head>
<body>
	<style>
		main {
			position: sticky;
			padding: 3px;
			opacity: 0.8;
			background-image: radial-gradient(circle, #eafd12, white);
		}

		body {
			background: no-repeat cover;
			background-image: url("images/bg.jpg");
			background-size: 100%;
			background-attachment: fixed;: 
		}

		.icho li{
			display: inline;
			padding: 5px;
		}

		div {
			background: no-repeat cover;
			background-image: url("images/bg-2.jpg");
			background-size: 100%;
			background-attachment: fixed;
		}
		@media screen and (max-width: 418px){
			.icho{
				display: flex;
			}
	</style>
	<main class="text-center">
		<h1>Admin Dashboard</h1>
		<p>This is the admin dashboard for the YVOT platform</p>
		<ul class="icho">
			<li class=""><a class="btn-small btn btn-success" href="index.php">Add Post</a></li>
			<li class=""><a class="btn-small btn btn-dark" href="author.php">Add Author</a></li>
			<li class=""><a class="btn-small btn btn-primary" href="category.php">Add Category</a></li>
		</ul>
	</main>

	<p></p>

	<section>
		<div class="container text-white">
			<h2>Add Category</h2>
			<form method="POST" action="cat-script.php">
				<h4>Title</h4>
				<input type="text" class="form-control" name="title" required>
				
				<h4>Description</h4>
				<textarea class="form-control" name="cat-description" required></textarea>
				<p>


				<div class="container mb-3">
					<h4>Please enter the links to the pictures that best represent this category.</h4>

					<input class="form-control p-3" placeholder="Picture 1" name="pic1"> <br>

					<input class="form-control" placeholder="Picture 2" name="pic2"> <br>

					<input class="form-control" placeholder="Picture 3" name="pic3"> <br>

					<input class="form-control" placeholder="Picture 4" name="pic4"> <br>

					<h4>Please enter the links to a single article that best explains this category. This link can be a wikipedia or a brittanica page etc.</h4>

					<input class="form-control" placeholder="Article" name="article"> <br>

				</div>
				<input class="btn btn-small btn-primary p-2 mt-2" type="submit" name="submit" value="Add Category">
				</form>
				<?php
					// if(isset($_POST['submit'])){
					// $title = htmlentities($_POST['title']);
					// $description = htmlentities($_POST['cat-description']);
					// $pic1 = htmlentities($_POST['pic1']);
					// $pic2 = htmlentities($_POST['pic2']);
					// $pic3 = htmlentities($_POST['pic3']);
					// $pic4 = htmlentities($_POST['pic4']);
					// $article = htmlentities($_POST['article']);

					// echo "<script>alert(\"".$title."\"";

					// $sql = "INSERT INTO categories (title,description, pic1, pic2, pic3, pic4,article) VALUES('$title', '$description', '$pic1', '$pic2', '$pic3', '$pic4', '$article');";

					

					// if(mysqli_query($conn, $sql)) {
					// 	echo "<script>alert(\"Category added zvakanaka\")</script>";
					// }else{
					// 	echo "FAILED".mysqli_error($conn);
					// }
					// }

				?>
			
		</div>
	</section>

</body>
</html>