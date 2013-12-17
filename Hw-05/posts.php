<?php
include 'includes/header.php';
session_start();

if(isset($_SESSION['isLogged'])) {
	

$sql = "SELECT * FROM posts
ORDER BY post_date DESC  ";
$q = mysqli_query($connection, $sql) ;
while($row = mysqli_fetch_assoc($q)){
	echo '<table border="1"><tr><th>'.$row['post_title'].'</td></th>
	<tr><td>'.$row['post_context'].'</td></tr>
	<tr><td>'.$row['post_date'].' posted by: '.$row['user_post'].'</td></tr></table>';
	}
echo '<p></p>';	
echo '<a href="createpost.php">'.'Напиши пост!'.'</a>';
}


include 'includes/footer.php';
?>