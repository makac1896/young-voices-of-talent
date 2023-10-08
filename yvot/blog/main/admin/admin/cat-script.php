<?php
// file with database connection
require('configure.php');
echo "SERVER 489BC1 RUNNING";

// event when form is submitted
if(isset($_REQUEST['submit'])){
	$title = $_POST['title'];
	$description = htmlentities($_POST['cat-description']);
	$pic1 = filter_var(htmlentities($_POST['pic1']), FILTER_SANITIZE_URL);
	$pic2 = filter_var(htmlentities($_POST['pic2']), FILTER_SANITIZE_URL);
	$pic3 = filter_var(htmlentities($_POST['pic3']), FILTER_SANITIZE_URL);
	$pic4 = filter_var(htmlentities($_POST['pic4']), FILTER_SANITIZE_URL);
	$article = htmlentities($_POST['article']);


	$sql = "INSERT INTO categories (title,description, pic1, pic2, pic3, pic4,article) VALUES('$title', '$description', '$pic1', '$pic2', '$pic3', '$pic4', '$article');";


	if(mysqli_query($conn, $sql)) {
		echo "<script>alert(\"Category added zvakanaka\")</script>";
	}else{
		echo "FAILED ".mysqli_error($conn);
	}	
	}


if(isset($_REQUEST['submit'])){
	var_dump($_REQUEST);
	echo "<script>alert(\"".$title."\"";

	echo "abc";
}
?>





