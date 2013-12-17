
<?php
include 'includes/header.php';
include 'includes/connection.php';

$id = $_GET['id'];
$sql = "SELECT books.book_title, authors.author_name, authors.author_id
FROM books
LEFT JOIN books_authors ON books.book_id = books_authors.book_id
LEFT JOIN authors ON authors.author_id = books_authors.author_id
WHERE books.book_title in (SELECT books.book_title
FROM books
LEFT JOIN books_authors ON books.book_id = books_authors.book_id
LEFT JOIN authors ON authors.author_id = books_authors.author_id
WHERE authors.author_id='".$id."')" ;

$q = mysqli_query($connection, $sql) ;
echo '<table><tr><th>Автор</th><th>Книги</th><tr>';
while($row = mysqli_fetch_assoc($q)){
	echo '<tr><td><a href ="#">'.$row['author_name'].'</a></td><td>'.$row['book_title'].'</td></tr>';
	}

echo '</table>	';
echo '<a href="index.php">'.'върни се'.'</a>';


include 'includes/footer.php';
?>