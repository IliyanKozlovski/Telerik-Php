<?php
include 'includes/header.php';
session_start();

if(isset($_SESSION['isLogged'])) {
	$connection = mysqli_connect('localhost','telerikninja','qwerty','homework3');
if(!$connection){
	echo 'no database';	
}
mysqli_set_charset($connection, 'utf8');

if($_POST){
	$title = trim($_POST['title']);
	$title = mysqli_real_escape_string($connection, $title);
	$msg = trim($_POST['postText']);
	$msg = mysqli_real_escape_string($connection, $msg);
	$today = date("Y-m-d H:i:s");
	$userpost = $_SESSION['username'];
	$sql = "INSERT INTO `posts` (`post_title`, `post_context`, `post_date`, `user_post`) 
	VALUES ('$title', '$msg', '$today', '$userpost')";
	if(mysqli_query($connection, $sql)){
		echo 'OK';
		header('Location: posts.php');
	}
	else echo 'errror';
}
}
include 'includes/postForm.php';
include 'includes/footer.php';
?>