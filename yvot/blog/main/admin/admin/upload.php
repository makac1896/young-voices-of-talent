<?php
require('configure.php');
$allowed_files = array("txt", "doc","docx", "pdf", "htm", "html", "jpg", "jpeg", "png", "gif", "mp4", "mov", "flv", "avi", "wmv");
$images = array("jpg", "jpeg", "png", "gif");
$path = 'path';

if(isset($_POST['action'])){
	$action = $_POST['action'];
	if($action == "post"){
		$authorID = htmlentities($_POST['authorID']);
		$title = htmlentities($_POST['title']);
		$category = htmlentities($_POST['category']);
		$description = htmlentities($_POST['post-description']);
		$file = $_FILES['post-file'];
		$poster = $_FILES["post-poster"];

						if(!$poster['error'] == 1){
						if($poster['size'] <= 60000){
							$posterExt = explode(".", $poster['name']);
							$posterExt = strtolower(end($posterExt));
							if(in_array($posterExt, $images)){
								$posterName = uniqid('', true);
								$posterName .= ".".$posterExt;
								$posterDestination = "uploads/posters/".$posterName;

								if (move_uploaded_file($poster['tmp_name'], $posterDestination)) {
									echo "Poster uploaded";	
									$posterDestination = "admin/admin/uploads/posters/".$posterName;
								}
							}
						}}



		if(!$file['error'] == 1){
			if($file['size'] <= 600000){
				$fileExt = explode(".", $file['name']);
				$fileExt = strtolower(end($fileExt));
				if(in_array($fileExt, $allowed_files)){
					$fileName = uniqid('', true);
					$fileName .= ".".$fileExt;
					$fileDestination = '';
					$articles = array("txt", "doc","docx", "pdf", "htm", "html");
					$images = array("jpg", "jpeg", "png", "gif");
					$videos = array("mp4", "mov", "flv", "avi", "wmv");
					// Determining storage location

					// Article check
					if(in_array($fileExt, $articles)){
						$fileDestination = "uploads/articles/".$fileName;
						move_uploaded_file($file['tmp_name'], $fileDestination);

						echo "The file has been uploaded succesfully";

						$fileDestination = "admin/admin/".$fileDestination;

						

						$sql = "INSERT INTO posts(title,categoryID,$path,authorID,media,view_number,likes,description,poster) VALUES ('$title','$category','$fileDestination','$authorID','text','0','0','$description', '$posterDestination');";

						if(mysqli_query($conn, $sql)){
							echo "Post added successfully";
							header('Location: index.php');     	
						}else{
							echo "ERROR:" . mysqli_error($conn);
						}
					}
					// Image check
					if(in_array($fileExt, $images)){
						$fileDestination = "uploads/img/".$fileName;

						if (move_uploaded_file($file['tmp_name'], $fileDestination)) {
							$sql = "INSERT INTO posts(title,categoryID,$path,authorID,media,view_number,likes,description,poster) VALUES ('$title','$category','$fileDestination','$authorID','image','0','0','$description', '$posterDestination');";

							if(mysqli_query($conn, $sql)){
								echo "Post added successfully";
								header('Location: index.php');     	
							}else{
								echo "ERROR: " . mysqli_error($conn);
							}
						} else{
							echo "ERROR: failed to upload";
						}
						
						echo "The file has been uploaded succesfully";
					}
					// Video check
					if(in_array($fileExt, $videos)){
						$fileDestination = "uploads/video/".$fileName;

						if (move_uploaded_file($file['tmp_name'], $fileDestination)) {
							$sql = "INSERT INTO posts(title,categoryID,$path,authorID,media,view_number,likes,description, poster) VALUES ('$title','$category','$fileDestination','$authorID','video','0','0','$description', '$posterDestination');";

							if(mysqli_query($conn, $sql)){
								echo "Post added successfully";
								header('Location: index.php');     	
							}else{
								echo "ERROR: " . mysqli_error($conn);
							}
						} else{
							echo "ERROR: failed to upload";
						}

						echo "The file has been uploaded succesfully";
					}
				}
			}
		}
	}
}



	// }elseif($action == "author"){
	// 	$name = filter_var(htmlentities($_POST['name']), FILTER_SANITIZE_STRING);
	// 	$surname = filter_var(htmlentities($_POST['surname']), FILTER_SANITIZE_STRING);
	// 	$school = htmlentities($_POST['school']);
	// 	$age = htmlentities($_POST['age']);
	// 	$instagram = htmlentities($_POST['instagram']);
	// 	$facebook = htmlentities($_POST['facebook']);
	// 	$other = htmlentities($_POST['other']);
	// 	$description = htmlentities($_POST['auth-description']);

	// 				if($_FILES['picture']){
	// 					$file = $_FILES['picture'];
	// 					if($file['size'] <= 600000){
	// 						$fileExt = explode(".", $file['name']);
	// 						$fileExt = strtolower(end($fileExt));
	// 						if(in_array($fileExt, $allowed_files)){
	// 							$fileName = uniqid('', true);
	// 							$fileName .= ".".$fileExt;
	// 							$fileDestination = '';
	// 							$images = array("jpg", "jpeg", "png", "gif");
	// 							// Determining storage location

	// 							// Article check

	// 							// Image check
	// 							if(in_array($fileExt, $images)){
	// 								$fileDestination = "uploads/author/".$fileName;
	// 								move_uploaded_file($file['tmp_name'], $fileDestination);

	// 								echo "The file has been uploaded succesfully";
	// 								$sql = "INSERT INTO posts(name,surname,school,age,description,instagram,facebook,other, picture) VALUES ('$name','$surname','$school','$age','$description','$instagram','$facebook','$other', '$fileDestination');";
	// 											 if(mysqli_query($conn, $sql)){
	// 										      	echo "Author added successfully";
	// 										      	header('Location: index.html');     	
	// 										      }else{
	// 										      	echo "ERROR:" . mysqli_error($conn);
	// 										      }

	// 							}
	// 						}
	// 					}
	// 				}else{
	// 					$sql = "INSERT INTO posts(name,surname,school,age,description,instagram,facebook,other) VALUES ('$name','$surname','$school','$age','$description','$instagram','$facebook','$other');";
	// 											 if(mysqli_query($conn, $sql)){
	// 										      	echo "Author added successfully";
	// 										      	header('Location: index.html');     	
	// 										      }else{
	// 										      	echo "ERROR:" . mysqli_error($conn);
	// 										      }
	// 				}

	// }else {

	// }



//FLAG AN INAPPROPRIATE COMMENT
// if(isset($_REQUEST['c'])){
// 	$to = "makac1896@gmail.com, $_REQUEST['e'], support@gmail.com";
// 	$subject = "INNAPROPRIATE COMMENT REPORTED";

// 	$message = <<<EOD 
// 	We have a received word that one of the comments posted on our site with the ID: $_REQUEST['c'] has been flagged by our community for review. We will review this comment and if it is found to be harmful it will be removed and you will not be able to add comments in future. Feel free to contact us for further information on our Community Guidelines. Please note that we keep record of these emails for further investigation. \r\n Your Talent Our Voice \r\n Makatendeka Chikumbu (YVT Developer)
// EOD;

// $headers = "MIME-Version: 1.0"."\r\n";
// $headers .= "Content-type: text/html;charset=UTF-8"."\r\n";
// $headers .= "From: <makac1896@gmail.com> \r\n";
// $headers .= "Cc: team@yvot.com". "\r\n";

// mail($to, $subject, $message, $headers);
// }