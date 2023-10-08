<?php
require('configure.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Favicons -->
  <link href="icon.ico" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="YVOT site" name="description">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:300,400,700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="./vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="./vendor/aos/aos.css" rel="stylesheet">
  <link href="./vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
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
		#table {
			visibility: hidden;
			display: none;
		}

		@media screen and (max-width: 418px){
			.icho li{
			display: flex;
			padding: 5px;
		}
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
		<div class="container bg-success text-white p-3">
			<h2>Add Post</h2>
			<span class="lead">Please make sure the author is registered</span>	
			<button class="btn btn-sm btn-primary m-2" onclick="showTable()" ondblclick="hideTable()">Show Authors</button>	
			<script type="text/javascript">
				function showTable(){
					document.getElementById("table").style.visibility = "visible";
					document.getElementById("table").style.display = "inline-block";
				}

				function hideTable(){
					document.getElementById("table").style.visibility = "hidden";
					document.getElementById("table").style.display = "none";
				}
			</script>
			<table id="table" class="table table-hover bg-primary text-white">
				<thead>
					<th>Author Name</th>
					<th>Author ID</th>
				<thead>
					
					<?php 
                       $sql = "SELECT * FROM authors";
                       $result = mysqli_query($conn, $sql);
                       $authors = mysqli_fetch_all($result, MYSQLI_ASSOC);
                       mysqli_free_result($result);

                       foreach ($authors as $author) {
                       ?>	
                       <tr>					
						<td><?php echo $author['name'] . " " . $author['surname']; ?></td>
						<td><?php echo $author['authorID']; ?></td>
						</tr>
						<?php
						}
						?>
			</table>

			<p></p>	
			<form enctype="multipart/form-data" method="POST" action="upload.php" class="form-group">
				<input type="hidden" class="form-control" value="post" name="action">
				<h4>Author ID</h4>
				<input class="form-control" name="authorID" required>
				<h4>Title</h4>
				<input class="form-control" name="title" required>
				<h4>Category</h4>
				<select class="form-control" name="category">
					<?php 
                       $sql = "SELECT categoryID, title FROM categories";
                       $result = mysqli_query($conn, $sql);
                       $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
                       mysqli_free_result($result);

                       foreach ($categories as $category) {
                       ?>	
					<option value="<?php echo $category['categoryID']; ?>"><?php echo $category['title'];?></option>
					<?php

				}
					?>
				</select>
				<h4>Attach the file</h4>
				<input type="file" class="form-control" name="post-file" required>
				<h4>Attach the poster</h4>
				<input type="file" class="form-control" name="post-poster" required>
				<h4>Description</h4>
				<textarea class="form-control" name="post-description" required></textarea>
				<p>
				<input class="btn btn-small btn-primary p-2 mt-2" type="submit" value="Add Post">
			</form>
		</div>
	</section>

</body>
</html>