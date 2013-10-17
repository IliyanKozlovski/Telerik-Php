<?php
include 'includes/header.php';
include 'includes/connection.php';
include 'includes/newAuthorForm.php';

if($_POST) {
	$myAuthor = trim($_POST['newAuthor']);
	$myAuthor = mysqli_real_escape_string($connection, $myAuthor);
	$sql = " INSERT INTO `authors` (`author_name`) VALUES ('$myAuthor') ";
	if(mysqli_query($connection, $sql)){
	echo 'Добавен '.$myAuthor;
} else
echo "Грешка";
}

echo '<table border="1"><tr><th>Автори</th></tr>';
$sqlt = "SELECT `author_name` FROM `authors` ";

$q = mysqli_query($connection, $sqlt) ;
while($row = mysqli_fetch_assoc($q)){
	echo '<tr><td>'.$row['author_name'].'</td>
	</tr>';
	}
echo '</table>	';

echo '<p></p>';	
echo '<a href="index.php">'.'Върни се!'.'</a>';
include 'includes/footer.php';
?>