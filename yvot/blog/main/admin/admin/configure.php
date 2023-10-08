<?php
define("allowed_files", array("txt", "doc","docx", "pdf", "htm", "html", "jpg", "jpeg", "png", "gif", "mp4", "mov", "flv", "avi", "wmv"), true);
$conn = mysqli_connect('127.0.0.1', 'root', '', 'yvt');
if(mysqli_connect_errno($conn)){
	echo 'Could not connect to the database ' . mysqli_connect_errno();
}
?>