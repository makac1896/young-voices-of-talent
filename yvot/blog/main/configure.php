<?php

$conn = mysqli_connect('localhost', 'root', '', 'yvt');
if(mysqli_connect_errno($conn)){
	echo 'Could not connect to the database ' . mysqli_connect_errno();
}
?>