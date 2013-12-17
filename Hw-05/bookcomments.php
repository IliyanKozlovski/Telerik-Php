<?php
include 'includes/header.php';
session_start();

if (isset($_GET['book_id'])) {
    $book_id = (int) $_GET['book_id'];
       $q = mysqli_query($connection, 'SELECT * FROM posts WHERE book_id='.$book_id);
	
	while($row = mysqli_fetch_assoc($q)){
		echo '<table border="1"><tr><th>'.$row['post_title'].'</td></th>
		<tr><td>'.$row['post_context'].'</td></tr>
		<tr><td>'.$row['post_date'].' posted by: '.$row['user_post'].'</td></tr></table>';
		}
	echo '<p></p>';	




}


if(isset($_SESSION['isLogged'])) {
?>
	<form method="POST">
	<div>Заглавие:<input type="text" name="title" /></div>
	<div><textarea name="postText"></textarea></div>
	<div><input type="submit" value="Постни" /></div>
</form>

<?php
if($_POST){
	$title = trim($_POST['title']);
	$title = mysqli_real_escape_string($connection, $title);
	$msg = trim($_POST['postText']);
	$msg = mysqli_real_escape_string($connection, $msg);
	$today = date("Y-m-d H:i:s");
	$userpost = $_SESSION['username'];
	$sql = "INSERT INTO `posts` (`post_title`, `book_id`, `post_context`, `post_date`, `user_post`) 
	VALUES ('$title','$book_id', '$msg', '$today', '$userpost')";
	if(mysqli_query($connection, $sql)){
		echo 'OK';
		header('Location: bookcomments.php?book_id='.$book_id.'');
	}
	else echo 'errror';
}
} //closing session


include 'includes/footer.php';
?>