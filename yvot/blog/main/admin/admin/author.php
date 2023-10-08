<?php
require('configure.php');
echo "SERVER 489BC1 RUNNING";
$allowed_files = array("txt", "doc","docx", "pdf", "htm", "html", "jpg", "jpeg", "png", "gif", "mp4", "mov", "flv", "avi", "wmv");
$path = 'path';
?>

<!DOCTYPE html>
<html>
<head>
 
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

	<!-- Favicons -->
	<link href="icon.ico" rel="icon">
	<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

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

		@media screen and (max-width: 418px){
			.icho{
				display: flex;
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
		<div class="container bg-light text-white mt-2 p-3">
			<h2>Add Author</h2>
			<span class="lead">Please make sure the information is verified and correct</span>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="action" value="author" required>
				<h4>Name</h4>
				<input class="form-control" name="name" required>
				<h4>Surname</h4>
				<input class="form-control" name="surname" required>
				<h4>School</h4>
				<input class="form-control" name="school" required>

				<h4>Age</h4>
				<input class="form-control" name="age" required>

				<br>
				<label class="text-bold">The social media links are optional</label>
				<h4>Instagram</h4>
				<input class="form-control" name="instagram">


				<h4>Facebook</h4>
				<input class="form-control" name="facebook">

				<h4>Other</h4>
				<input class="form-control" name="other">

				<h4>Picture</h4>
				<input type="file" class="form-control" name="auth-picture">
				
				<h4>Description</h4>
				<textarea class="form-control" name="auth-description" required></textarea>
				<p>
					<input class="btn btn-small btn-success p-2 mt-2" type="submit" value="Add Author">
					<?php
					if(isset($_POST['submit'])){
						echo var_dump($_POST);
					}

					if(isset($_POST['submit'])){
						$name = filter_var(htmlentities($_POST['name']), FILTER_SANITIZE_STRING);
						$surname = filter_var(htmlentities($_POST['surname']), FILTER_SANITIZE_STRING);
						$school = htmlentities($_POST['school']);
						$age = htmlentities($_POST['age']);
						$instagram = htmlentities($_POST['instagram']);
						$facebook = htmlentities($_POST['facebook']);
						$other = htmlentities($_POST['other']);
						$description = htmlentities($_POST['auth-description']);

						if($_FILES['auth-picture']){
							$file = $_FILES['auth-picture'];
							if($file['size'] <= 600000){
								$fileExt = explode(".", $file['name']);
								$fileExt = strtolower(end($fileExt));
								if(in_array($fileExt, $allowed_files)){
									$fileName = uniqid('', true);
									$fileName .= ".".$fileExt;
									$fileDestination = '';
									$images = array("jpg", "jpeg", "png", "gif");

									if(in_array($fileExt, $images)){
										$fileDestination = "uploads/author/".$fileName;
										move_uploaded_file($file['tmp_name'], $fileDestination);

										echo "The file has been uploaded succesfully";
										$sql = "INSERT INTO authors (name,surname,school,age,description,instagram,facebook,other, picture) VALUES ('$name','$surname','$school','$age','$description','$instagram','$facebook','$other', '$fileDestination');";
										if(mysqli_query($conn, $sql)){
											echo "Author added successfully";
											header('Location: index.php');     	
										}else{
											echo "ERROR:" . mysqli_error($conn);
										}

									}
								}
							}
						}else{
							$sql = "INSERT INTO authors(name,surname,school,age,description,instagram,facebook,other) VALUES ('$name','$surname','$school','$age','$description','$instagram','$facebook','$other');";

							if(mysqli_query($conn, $sql)){
								echo "Author added successfully";
								header('Location: index.html');
							}else{
									echo "ERROR:" . mysqli_error($conn);
								}
							}
						}
						?>
					</form>
				</div>
			</section>

		</body>
		</html>