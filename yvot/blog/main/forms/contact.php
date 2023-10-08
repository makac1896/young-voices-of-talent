<?php
if(isset($_REQUEST['submit'])){
  echo "ABC";
 $to = "makac1896@gmail.com, 22makatendekac@his.ac.zw";
 $subject = htmlentities($_POST['subject']);
 $name = htmlentities($_POST['name']);
 $email = htmlentities($_POST['email']);
 $message = htmlentities($_POST['message']);

 $message .= " This message was sent by ". $name;
$headers = "MIME-Version: 1.0"."\r\n";
$headers .= "Content-type: text/html;charset=UTF-8"."\r\n";
$headers .= "From: <makac1896@gmail.com> \r\n";
$headers .= "Cc: $email". "\r\n";
  
mail($to, $subject, $message, $headers);
}
?>
