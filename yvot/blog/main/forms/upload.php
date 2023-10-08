<?php
require('../configure.php');

if(isset($_POST['submit']))
    {
      $name = htmlentities($_POST['name']);
      $comment = htmlentities($_POST['message']);
      $email = filter_var(htmlentities($_POST['email']), FILTER_SANITIZE_EMAIL);
      $pID = htmlentities($_POST['postID']);

      $sql = "INSERT INTO comments(postID,name,comment_body,email) VALUES ('$pID','$name','$comment', '$email');";

      if(mysqli_query($conn, $sql)){
      	echo "Comment added successfully";
      	header('Location: ../blog-single.php?q='.$pID);     	
      }else{
      	echo "ERROR:" . mysqli_error($conn);
      }
}

//LIKE A POST
if(isset($_REQUEST['p'])){

	$sql = "SELECT * FROM posts WHERE postID=".$_REQUEST['p'];	
	$result = mysqli_query($conn, $sql);

	if($result){
		$post = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		$likes = $post['likes'];
		$likes++;
		$sql = "UPDATE posts SET likes=$likes WHERE postID=".$_REQUEST['p'];


		if(mysqli_query($conn, $sql)){
			echo "Thank you for liking this post.";
			header('Location: ../blog-single.php?q='.$_REQUEST['p'], 1);
		}else{
			echo "ERROR: ".mysqli_error($conn);
		}
	}
	
}

if(isset($_REQUEST['s'])){
	$authors = array();
	$sql = "SELECT CONCAT(name, ' ', surname) AS 'fullname', authorID FROM authors;";
	$result = mysqli_query($conn, $sql);
	

	if($result){
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		

		foreach($posts as $post){			
			$authors[] = array('fullname'=>$post['fullname'], 'authorID' =>$post['authorID']);
		}
		
		$s = $_REQUEST['s'];
		$suggestion = '';

		if($s!= ''){
		    $len = strlen($s);
		    $s = strtolower($s);

		  	foreach($authors as $author){
        	if(stristr($s, substr($author['fullname'], 0, $len))){
            if($suggestion===""){
            	$sql = "SELECT * FROM posts where authorID=".$author['authorID'];
            	$result = mysqli_query($conn, $sql);
            	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
            	mysqli_free_result($result);
            	$sql = "SELECT COUNT('*') as count from posts";
            	$result = mysqli_query($conn, $sql);
            	$number = mysqli_fetch_assoc($result);
            	$rand = rand(1, intval($number['count']));
            	$suggestion = "<a href=\"blog-single.php?q=".$rand."\">Lucky post</a> <br>";
            	foreach ($posts as $post) {
            		echo "<a href=\"blog-single.php?q=".$post['postID']."\"".">".$post['title']." by ". $author['fullname']."</a><br>";           
            	}
            }else{
                $suggestion .= ", " . "<a href=\"blog-single.php?q=1\">Random post</a>";            }
       		}
    		}

			echo $suggestion === "" ? "No Suggestion. <br>" : $suggestion . "<br>";

	
		    }
		}
	}

if(isset($_REQUEST['r'])){
					$titles = array();
					$sql = "SELECT title, postID FROM posts;";
					$title_result = mysqli_query($conn, $sql);
					if($title_result){
						$post_titles = mysqli_fetch_all($title_result, MYSQLI_ASSOC);
						mysqli_free_result($title_result);

						foreach($post_titles as $title){			
							$titles[] = array('title'=>$title['title'], 'postID' =>$title['postID']);
						}
						
						$r = $_REQUEST['r'];

						if($r!= ''){
						 $len = strlen($r);
						 $r = strtolower($r);
						 $title_suggestion = '';

						 foreach($titles as $post_title){
				        	if(stristr($r, substr($post_title['title'], 0, $len))){
				            if($title_suggestion===""){
				            	$sql = "SELECT * FROM posts where title LIKE '%".$r."%';";
				            	$result = mysqli_query($conn, $sql);
				            	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
				            	mysqli_free_result($result);
				            	$title_suggestion = "<a href=\"blog-single.php?q=1\">Random post</a> <br>";
				            	foreach ($posts as $post) {
				            	 echo "<a href=\"blog-single.php?q=".$post['postID']."\"".">".$post['title']."</a><br>";
				            	}
				            }else{
				            	$title_suggestion .= "<a href=\"blog-single.php?q=1\">Random post</a> <br>";
				            }
				       		}
				    	}
						    }
						}
	
}

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